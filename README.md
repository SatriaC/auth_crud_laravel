composer install
copy .env.example .env
php artisan key:generate
create database namely 'hobbies'
php artisan migrate
php artisan serve (if u want to run the app)

import file hobbies.postman_collection.json in folder /docs to Collections postman
import file Local.postman_environment.json in folder /docs to Environment postman
go to top right of postman and choose Local in select list of environtment

Have a fun !!!


this module implement one to many, so the user has many hobbies. We still be able to optimize this using Many to Many than One to Many. If we use Many to Many we can avoid the redundant of hobby's name. Thank you and enjoy my code !!!
