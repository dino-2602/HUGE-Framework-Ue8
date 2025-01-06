# Huge Framework – Messenger

## Übersicht
Dieses Projekt erweitert das Huge Framework um eine Messenger-Anwendung:
- Nachrichtenversand zwischen Benutzern.
- Archivierung von Nachrichten in der Datenbank.

## Features
- **Nachrichtenversand:** Benutzer können Nachrichten in Echtzeit oder über das Archiv senden.
- **Nachrichtenarchiv:** Alle Nachrichten werden in der Datenbank gespeichert und können eingesehen werden.

## Technologien
![PHP](https://img.shields.io/badge/PHP-8.1%2B-blue?logo=php&logoColor=white)
![Huge Framework](https://img.shields.io/badge/Huge_Framework-1.0-brightgreen)
![HTML](https://img.shields.io/badge/HTML-5-orange?logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-3-blue?logo=css3&logoColor=white)
![PHPStorm](https://img.shields.io/badge/IDE-PHPStorm-purple?logo=phpstorm&logoColor=white)
![MySQL](https://img.shields.io/badge/Database-MySQL-lightblue?logo=mysql&logoColor=white)

⚠️**Hinweis:** In diesem Repository wurde ausschließlich der `application`-Ordner hochgeladen. Dies geschieht, um den Datenschutz zu gewährleisten und keine sensiblen Daten wie Serverkonfigurationen oder Zugangsdaten öffentlich bereitzustellen. Dateien wie `config.php` und andere Konfigurationsdateien, die möglicherweise sensible Informationen enthalten, wurden absichtlich nicht hochgeladen.

## Schritte zur Implementierung

1. **Datenbankanpassungen:**
   - Erstellung einer messages-Tabelle zur Speicherung der Nachrichten.
   - Hinzufügen von Feldern wie sender_id, receiver_id, message_text und timestamp.

2. **Backend-Logik:**
   - Entwicklung einer API für das Senden und Empfangen von Nachrichten.
   - Implementierung von Validierungen und Sicherheitsfunktionen.

3. **Frontend-Integration:**
   - Erstellung eines einfachen UI für den Nachrichtenversand.
   - Optional: Einbindung von WebSockets für Echtzeit-Nachrichten.

## Screenshots

**Nachrichtenarchiv mit Benutzerübersicht**

![Nachrichtenarchiv](https://github.com/dino-2602/HUGE-Framework-Ue7/blob/main/screenshots/message_archive.png)
- Das Nachrichtenarchiv zeigt eine Liste aller Nachrichten zwischen Benutzern, sortiert nach Datum. Benutzer können vergangene Nachrichten einsehen und durchsuchen.

**Nachrichtensenden-Ansicht**

![Nachrichtensenden-Ansicht](https://github.com/dino-2602/HUGE-Framework-Ue7/blob/main/screenshots/message_send.png)
- Die Nachrichtensenden-Ansicht ermöglicht es, eine Nachricht an einen anderen registrierten Benutzer zu senden. Das Formular bietet Echtzeit-Validierung und Feedback.

**HTML-Code für das Nachrichtenformular**

![HTML-Code für das Nachrichtenformular](https://github.com/dino-2602/HUGE-Framework-Ue7/blob/main/screenshots/message_form.png)
- Das Nachrichtenformular wird mit PHP generiert und bietet Sicherheitsfunktionen wie CSRF-Token. Hier ist ein Ausschnitt aus dem Code, der das Formular erstellt und die Benutzerauswahl dynamisch aus der Datenbank lädt.

## Installation
1. Klone dieses Repository:
   ```bash
   git clone https://github.com/dino-2602/HUGE-Framework-Ue7.git
   ```

2. Installiere die Abhängigkeiten mit Composer:
   ```bash
   composer install
   ```

3. Richte die Datenbank ein:
   - Erstelle eine Datenbank und importiere die migrations.sql-Datei aus dem Repository.

4. Konfiguriere die `.env`-Datei:
   - Passe die Datenbankzugangsdaten und andere Einstellungen an.

5. Starte die Anwendung:
   ```bash
   php artisan serve
   ```
   Die Anwendung ist jetzt unter `http://localhost:8000` verfügbar.

## ToDo
- Verbesserte Benutzeroberfläche
- Integration von WebSockets
- Erweiterte Fehlerbehandlung
