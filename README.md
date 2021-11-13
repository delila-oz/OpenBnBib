<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## OpenBnBib
Von mir bearbeitete befinden sich in auf der Hauptebene und folgenden Unterordnern:
-app
-database
-docker
-resources
-routes

# OpenBnBib Projekt starten
1. Das Programm Docker muss installiert sein. (Download unter https://www.docker.com/)
2. auf der Kommandozeile müssen folgende Befehle ausgeführt werden:


## Testdaten
Testdaten wurden mit folgendem Befehl exportiert:
docker exec openbnbib_db pg_dump -U openbnbib homestead --no-owner | gzip -9  > db-backup-$(date +%d-%m-%y).sql.gz
(siehe https://diegoquintanav.github.io/dumping-postgres-db-with-docker.html)

Zum Importieren bitte folgenden Befehl eingeben:

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

