
# Example shop checkout

## Technologies
Project is created with:
* Laravel: 8.40.0
*  PHP 7.4
* js.vue: 2.6.12

## Database Seeding

Project provides neccesery database seeds to test project . U can populate database by runnign comand:
```
$ php artisan seed
```
or to rebuild database in develpoment env:
```
$ php artisan migrate:fresh --seed
````
## Info

Database provides 2 discount codes to test:
* 'RABAT20' - active
* 'RABAT30' - inactive

While adding order u can add new user to database or (while 'add account' checkbox is unchecked), order will be asigned to test user who's already in database
