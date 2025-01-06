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

![Nachrichten1](https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/screenshots/nachricht%20zwischen%20nutzern.png)
![Nachrichten2](https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/screenshots/nachricht%20zwischen%20nutzern2.png)
- Die Nachrichtentabelle zeigt eine Liste aller Nachrichten zwischen Benutzern, sortiert nach Datum. Benutzer können vergangene Nachrichten einsehen und durchsuchen. Zudem wird auch festgestellt ob ein Nutzer die Nachricht gelesen hat

**Nachrichtensenden-Ansicht**

<div>
  <img src="https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/screenshots/message%20von%20demo%20zu%20dino.png" alt="Nachrichtensenden-Ansicht1" width="500" />
  <img src="https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/screenshots/message%20von%20dino%20zu%20demo.png" alt="Nachrichtensenden-Ansicht2" width="500" />
</div>

![Nachrichtensenden-Ansicht3](https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/screenshots/ungelesen%20von%20demo.png)
![Nachrichtensenden-Ansicht4](https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/screenshots/ungelesen%20von%20dino.png)
- Die Nachrichtensenden-Ansicht ermöglicht es, eine Nachricht an einen anderen registrierten Benutzer zu senden. Das Formular bietet Feedback, indem die Anzahl der ungelesenen Nachrichten vom Absender angezeigt werden.

**Code für das Nachrichtenformular**

- [Messenger Controller](https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/application/controller/MessengerController.php)
- [Model](https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/application/model/MessengerModel.php)
- [Core View](https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/application/core/View.php)
- [View Messenger Index](https://github.com/dino-2602/HUGE-Framework-Ue8/blob/main/huge/application/view/messenger/index.php)

- Das Nachrichtenformular wird mit PHP generiert. Die Ausschnitte aus dem Code, die das Formular erstellen und die Benutzer dynamisch aus der Datenbank lädt.

## Installation
Klone dieses Repository:
   ```bash
   git clone https://github.com/dino-2602/HUGE-Framework-Ue8.git
   ```
