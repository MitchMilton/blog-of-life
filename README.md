
## About Blog of Life
This is a simple php blog built with the following
- [Laravel 8.x](https://laravel.com/docs/8.x)
- [Bootstrap 5](https://getbootstrap.com/)
- [SQLite](https://www.sqlite.org/)

## Installation

Development environment requirements :
- [Php 7.2+](https://www.php.net/)
- Either Apache/nginx server , Laradock or Docker equivalent

Setting up the environment on your local machine :
```bash
$ git clone git@github.com:MitchMilton/blog-of-life.git
$ cd blog-of-life
$ cp .env.example .env
$ composer install
$ php artisan migrate:fresh --seed
$ php artisan storage:link
```

After running these commands go to the .env file and set the value of "DB_DATABASE" to the absolute path leading to the database.sqlite

```bash
DB_DATABASE=C:\your\absolute-path\blog-of-life\database\database.sqlite
```

After that you're all set! Happy Testing. 🤓 
Default Login
Email: hello@blogoflife.com
Pass:  amazeblogs22
