# Thesis
Von mir bearbeitete befinden sich in auf der Hauptebene und folgenden Unterordnern:
-app
-database
-docker
-resources
-routes

## OpenBnBib Projekt starten
Das Programm Docker muss installiert sein. (Download unter https://www.docker.com/)
Auf der Kommandozeile müssen folgende Befehle ausgeführt werden:
docker-compose build ...


## Testdaten
Testdaten wurden mit folgendem Befehl exportiert:
docker exec openbnbib_db pg_dump -U openbnbib homestead --no-owner | gzip -9  > db-backup-$(date +%d-%m-%y).sql.gz
(siehe https://diegoquintanav.github.io/dumping-postgres-db-with-docker.html)

Zum Importieren bitte folgenden Befehl eingeben:
docker exec openbnbib_db psql dbname < db-backup-20211113.sql

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

