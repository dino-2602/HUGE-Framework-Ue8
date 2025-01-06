<div class="messenger-container-page">
    <div class="container">
        <!-- Page title -->
        <h1>Messenger</h1>
        <div class="messenger-container">

            <!-- Left side: User list -->
            <div class="user-list">
                <h3>Chats</h3>
                <ul>
                    <?php foreach (UserModel::getAllUsers() as $user): ?>
                        <?php if ($user->user_id != Session::get('user_id')): ?>
                            <li>
                                <!-- Link to open a conversation with a specific user -->
                                <a href="<?= Config::get('URL') . 'messenger/index?conversation_id=' . htmlentities($user->user_id) ?>">
                                    <?= htmlentities($user->user_name) ?>
                                    <?php if (MessengerModel::getUnreadMessagesCount($user->user_id) > 0): ?>
                                        <!-- Display the count of unread messages for this user -->
                                        <span class="unread-count"><?= htmlentities(MessengerModel::getUnreadMessagesCount($user->user_id)) ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Right side: Chat frame -->
            <div class="chat-frame">
                <div class="discussion">
                    <?php foreach ($this->messages as $message): ?>
                        <?php
                        // Determine if the message is unread and wasn't sent by the current user
                        $isUnread = !$message->is_read && $message->sender_id != Session::get('user_id') ? 'unread' : '';
                        ?>
                        <div class="bubble <?= ($message->sender_id == Session::get('user_id') ? 'recipient' : 'sender') . ' ' . $isUnread ?>">
                            <!-- Display the message text -->
                            <p><?= htmlentities($message->message) ?></p>
                            <!-- Display the timestamp of the message -->
                            <p class="timestamp"><?= htmlentities($message->sent_at) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Display a message input form only if a conversation is selected -->
                <?php if ($this->currentConversation): ?>
                    <form action="<?= Config::get('URL') . 'messenger/sendMessage' ?>" method="post" class="message-form" id="message-form">
                        <!-- Hidden input for recipient ID -->
                        <input type="hidden" name="recipient_id" value="<?= htmlentities($this->currentConversation) ?>">
                        <!-- Textarea for message input -->
                        <label for="message_text"></label><textarea name="message_text" id="message_text" required placeholder="Type your message..."></textarea>
                        <!-- Submit button -->
                        <button type="submit">Send</button>
                    </form>
                <?php endif; ?>

                <script>
                    // Submit the form when Enter is pressed (without Shift)
                    document.getElementById('message_text').addEventListener('keydown', function (event) {
                        if (event.key === 'Enter' && !event.shiftKey) {
                            event.preventDefault();
                            document.getElementById('message-form').submit();
                            document.getElementById('message_text').focus();
                        }
                    });

                    // Focus on the textarea after submitting the message
                    document.getElementById('message_text').focus();

                    // Scroll to the bottom of the discussion to show the latest messages
                    document.querySelector('.discussion').scrollTop = document.querySelector('.discussion').scrollHeight;
                </script>
            </div>
        </div>
    </div>
</div>
