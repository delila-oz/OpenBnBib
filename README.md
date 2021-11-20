# Thesis
Von mir bearbeitete befinden sich in auf der Hauptebene und folgenden Unterordnern:
- app
- database
- docker
- resources
- routes

## OpenBnBib Projekt starten
Das Programm Docker muss installiert sein. (Download für Windows, Mac oder Linux unter https://www.docker.com/). 

Anschließend in das Stammverzeichnis des Projekts (OpenBnBib) wechseln.
Auf der Kommandozeile müssen dann folgende Befehle ausgeführt werden:
```
docker-compose -f docker-compose.yml up -d
```

## Testdaten
Testdaten wurden mit folgendem Befehl exportiert:
```
docker exec openbnbib_db pg_dump -U openbnbib homestead --no-owner | > db-backup-20211113db.sql
```
(siehe https://diegoquintanav.github.io/dumping-postgres-db-with-docker.html)

Zum **Importieren der Daten** bitte folgenden Befehl eingeben:
```
docker exec -i openbnbib_db psql -U openbnbib homestead < db-backup-20211113db.sql
```

Es sind bereits einige Nutzer, Kommentare und Nachrichten angelegt. Als Test-Daten für den Login kann man folgende nutzen: 

`E-Mail: metzger.barbel@example.net`
`Passwort: password`

## Berechtigung
Sollte es zu Fehlermeldungen wegen Dateiberechtigungen kommen, ist es nötig, dem Webserver die nötige Berechtigung zu geben:

sudo chown -R www-data:www-data OpenBnBib
## Hinweis
Der Abspeichern von Bildern (bei Änderung des Nutzerprofils) ist nicht möglich.
