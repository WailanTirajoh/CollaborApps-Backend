## Init

- Clone this repo
```
git clone git@github.com:WailanTirajoh/MyFirsAppNuxtBackend.git
or
git clone https://github.com/WailanTirajoh/MyFirsAppNuxtBackend.git
```
- Copy .env.example to .env
```
cp .env.example .env
```
- create database, choose pgsql or mysql
```
mysql -u <username> -p
create database my_first_app;
```
- migrate
```
php artisan migrate
```
- serve
```
php artisan serv
```
