<?php

/**
 * MessengerModel
 * This is a simple CRUD (Create/Read/Update/Delete) demonstration for handling messages.
 */
class MessengerModel {

    /**
     * Retrieves all messages between the current user and a specific user in the conversation.
     *
     * @param int $user_id The ID of the current user.
     * @param int $conversation_id The ID of the user in the conversation.
     * @return array List of messages sorted by the scent time in ascending order.
     */
    public static function getMessagesByUser(int $user_id, int $conversation_id): array
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        // SQL query to select messages and join with user data for sender and recipient names
        $sql = "SELECT m.id, m.sender_id, m.recipient_id, m.message, m.sent_at, m.is_read,
                   u1.user_name AS sender_name, u2.user_name AS recipient_name
            FROM messages m
            JOIN users u1 ON m.sender_id = u1.user_id
            JOIN users u2 ON m.recipient_id = u2.user_id
            WHERE 
                (m.sender_id = :user_id AND m.recipient_id = :conversation_id) 
                OR 
                (m.sender_id = :conversation_id AND m.recipient_id = :user_id)
            ORDER BY m.sent_at ASC";

        $query = $database->prepare($sql);
        $query->execute([
            ':user_id' => $user_id,
            ':conversation_id' => $conversation_id
        ]);

        // Fetch and return all matching messages
        return $query->fetchAll();
    }

    /**
     * Sends a new message from one user to another.
     *
     * @param int $sender_id The ID of the user sending the message.
     * @param int $recipient_id The ID of the user receiving the message.
     * @param string $message The content of the message.
     * @return bool True if the message was successfully sent, false otherwise.
     */
    public static function sendMessage(int $sender_id, int $recipient_id, string $message): bool
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        // SQL query to insert a new message into the messages table
        $sql = "INSERT INTO messages (sender_id, recipient_id, message, sent_at, is_read) 
                VALUES (:sender_id, :recipient_id, :message, NOW(), 0)";

        $query = $database->prepare($sql);
        return $query->execute([
            ':sender_id' => $sender_id,
            ':recipient_id' => $recipient_id,
            ':message' => $message
        ]);
    }

    /**
     * Retrieves the count of unread messages for a specific user.
     *
     * @param int $user_id The ID of the user.
     * @return int The number of unread messages.
     */
    public static function getUnreadMessagesCount(int $user_id): int
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        // SQL query to count unread messages for the user
        $sql = "SELECT COUNT(*) AS unread_count 
                FROM messages
                WHERE sender_id = :user_id AND is_read = 0";

        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // Return the unread message count
        return $query->fetch()->unread_count;
    }

    /**
     * Marks all unread messages in a conversation as read.
     *
     * @param int $user_id The ID of the current user (recipient).
     * @param int $conversation_id The ID of the user who sent the messages.
     */
    public static function markMessagesAsRead(int $user_id, int $conversation_id): void
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        // SQL query to update the is_read status for unread messages
        $sql = "UPDATE messages 
            SET is_read = 1 
            WHERE recipient_id = :user_id 
              AND sender_id = :conversation_id 
              AND is_read = 0";

        $query = $database->prepare($sql);
        $query->execute([
            ':user_id' => $user_id,
            ':conversation_id' => $conversation_id
        ]);
    }
}
