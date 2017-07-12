
## Description

Test project for lun.ua. CRUD for residential complexes, buildings and flats. Simple search and filters for items above.


## Goals

- try postgreSQL
- try React or VueJS
- implement repository pattern in Laravel and check its usefulness


## Installation guide

For more information check [Laravel docs](https://laravel.com/docs/5.4/installation).

1. Clone repository
2. Setup php 5.6+, SQLite/MySQL/postgreSQL server, create DB
3. Rename .env.example to .env
4. Configure .env file
5. Run **php composer install**
5. Run **php artisan key:generate**
6. Run **php artisan migrate**
7. Run **php artisan db:seed**
8. Permissions  
    **sudo chmod -R ug+rwx storage bootstrap/cache**
    \+ **sudo chgrp -R www-data storage bootstrap/cache**

## Useful commands

- Refresh migrations **php artisan migrate:refresh --seed**

## TODOs for future
- Write seeders for all models
- API doc
- process errors during CRUD - repositories should throw own errors
- Write tests for repositories and API




Notes:
- Model binding becomes useless with repositories
- Better init models in repositories as SomeModel::class
- Probably I'll need to reproduce all Eloquent functions