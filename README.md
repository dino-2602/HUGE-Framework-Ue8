# Huge Framework – Messenger

## Übersicht
Dieses Projekt erweitert das Huge Framework um eine Messenger-Anwendung:
- Nachrichtenversand zwischen Benutzern.
- Archivierung von Nachrichten in der Datenbank.

## Features
- **Nachrichtenversand:** Benutzer können Nachrichten über einen Messenger senden.
- **Nachrichtenarchiv:** Alle Nachrichten werden in der Datenbank gespeichert und können eingesehen werden.

## Technologien
![PHP](https://img.shields.io/badge/PHP-8.1%2B-blue?logo=php&logoColor=white)
![Huge Framework](https://img.shields.io/badge/Huge_Framework-1.0-brightgreen)
![HTML](https://img.shields.io/badge/HTML-5-orange?logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-3-blue?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6%2B-yellow?logo=javascript&logoColor=white)
![PHPStorm](https://img.shields.io/badge/IDE-PHPStorm-purple?logo=phpstorm&logoColor=white)
![MySQL](https://img.shields.io/badge/Database-MySQL-lightblue?logo=mysql&logoColor=white)

⚠️**Hinweis:** In diesem Repository wurde ausschließlich der `application`-Ordner hochgeladen. Dies geschieht, um den Datenschutz zu gewährleisten und keine sensiblen Daten wie Serverkonfigurationen oder Zugangsdaten öffentlich bereitzustellen. Dateien wie `config.php` und andere Konfigurationsdateien, die möglicherweise sensible Informationen enthalten, wurden absichtlich nicht hochgeladen.

## Schritte zur Implementierung

1. **Datenbankanpassungen:**
   - Erstellung einer messages-Tabelle zur Speicherung der Nachrichten.
   - Hinzufügen von Feldern wie sender_id, receiver_id, message, sent_at und is_read.

2. **Frontend-Integration:**
   - Erstellung eines einfachen UI für den Nachrichtenversand.

3. **Problem lösen: Cursor bleibt im Textfeld:**
   - Um zu verhindern, dass der Cursor nach dem Absenden einer Nachricht aus dem Textfeld springt, wurde folgende Methode verwendet:
     - Im JavaScript-Event-Listener für das Nachrichtenformular wurde nach dem erfolgreichen Senden der Nachricht die `focus()`-Methode auf das Textfeld angewendet:
       ```javascript
       document.getElementById('message-input').focus();
       ```
     - Dadurch bleibt der Cursor nach dem Senden der Nachricht im Eingabefeld.

4. **Problem lösen: Nachricht mit Enter senden:**
   - Um das Senden einer Nachricht mit der Enter-Taste zu ermöglichen, wurde ein Event-Listener hinzugefügt, der auf die Enter-Taste reagiert:
     ```javascript
     document.getElementById('message-input').addEventListener('keypress', function(event) {
         if (event.key === 'Enter') {
             event.preventDefault();
             document.getElementById('send-button').click();
         }
     });
     ```
     - Dadurch wird die Nachricht durch Drücken der Enter-Taste gesendet, ohne dass ein separater Klick auf den Senden-Button erforderlich ist.
    
5. **Problem lösen: Automatisches Scrollen zum neuesten Eintrag:**
   - Um sicherzustellen, dass der Nutzer immer die neuesten Nachrichten sieht, wurde ein automatisches Scrollen implementiert:
   - ```javascript
     document.querySelector('.discussion').scrollTop = document.querySelector('.discussion').scrollHeight;
     ```

## Screenshots

**Nachrichtenarchiv**

![Nachrichtenarchiv](https://github.com/dino-2602/HUGE-Framework-Ue7/blob/main/screenshots/message_archive.png)
- Das Nachrichtenarchiv zeigt eine Liste aller Nachrichten zwischen Benutzern, sortiert nach Datum. Benutzer können vergangene Nachrichten einsehen und durchsuchen.

**Nachrichtensenden-Ansicht**

![Nachrichtensenden-Ansicht](https://github.com/dino-2602/HUGE-Framework-Ue7/blob/main/screenshots/message_send.png)
- Die Nachrichtensenden-Ansicht ermöglicht es, eine Nachricht an einen anderen registrierten Benutzer zu senden. Das Formular bietet Echtzeit-Validierung und Feedback.

**HTML-Code für das Nachrichtenformular**

![HTML-Code für das Nachrichtenformular](https://github.com/dino-2602/HUGE-Framework-Ue7/blob/main/screenshots/message_form.png)
- Das Nachrichtenformular wird mit PHP generiert und bietet Sicherheitsfunktionen wie CSRF-Token. Hier ist ein Ausschnitt aus dem Code, der das Formular erstellt und die Benutzerauswahl dynamisch aus der Datenbank lädt.

## Installation
Klone dieses Repository:
   ```bash
   git clone https://github.com/dino-2602/HUGE-Framework-Ue8.git
   ```
