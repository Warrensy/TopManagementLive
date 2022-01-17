Wichtig!

Um den Prototyp testen zu können müssen folgende Schritte umgesetzt werden.
XAMPP Control Panel starten. 
Die Module Apache und MySQL müssen gestartet werden.

Datenbank
Im Browser die URL localhost/phpmyadmin aufrufen. In der Dateistruktur des Prototyp findet sich unter im Ordner TopManagementLive die Datei innolab1.sql. 
In dieser befinden sich alle SQL Befehle für die Erstellung unserer Datenbank inklusive Test-Datensätze. Neue Datenbank mit dem Namen “innolab1” ertstellen. 
Dann auf “Import” gehen und die SQL-Datei importieren.

Datenbankzugriff

In phpMyAdmin muss noch der entsprechende User erstellt werden der auf die Datenbank zugreifen kann.
In die Datenbank "innolab1" gehen und dann oben auf "Rechte" Benutzerkonto hinzufügen und Daten einfügen
Name: inno1admin
Host: localhost
Password: fuVRcy6suu5VjcOx

Bei "Datenbank für Benutzerkonto" ==> "Gewähre alle Rechte auf die Datenbank
“innolab1"

Nichts bei Globalen Rechten auswählen.