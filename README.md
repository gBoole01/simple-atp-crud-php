# Simple ATP Crud PHP

## Usage

Before installing this project on your local machine, you need to have Docker and Docker-compose installed.

1. Clone this repository using `git clone`.
1. Go into `cd simple-atp-crud-php`.
1. Build the custom docker image `docker build -t php-8-apache`.
1. Launch the containers using `docker-compose up`.
1. Once the containers are up, you can go to these urls:
   1. `localhost:8000`: Apache 2 Server
   1. `localhost:8080`: phpmyadmin
   1. `localhost:1080`: mailcatcher

The `src` code is binded with docker volume so any change on these files are synced with the container.

## Seed Data

On the first installation, you can access the mysql container via docker or go to phpmyadmin and run the `initDb.sql` script. This will create the players table and add the top 30 players.
