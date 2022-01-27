
## About Blog of Life
This is a simple php blog built with the following
- [Laravel 8.x](https://laravel.com/docs/8.x)
- [Bootstrap 5](https://getbootstrap.com/)
- [SQLite](https://www.sqlite.org/)

## Installation

Development environment requirements :
- Either [Apache](https://httpd.apache.org/)/[nginx](https://www.nginx.com/) server , [Laradock](https://laradock.io/) or [Docker](https://www.docker.com/) equivalent
- [Php 7.3+](https://www.php.net/)
- [Composer](https://getcomposer.org/)

Setting up the environment on your local machine. 
Run these commands:
```bash
git clone git@github.com:MitchMilton/blog-of-life.git
cd blog-of-life
cp .env.example .env
composer install
php artisan storage:link
touch database/database.sqlite
```

After running these commands go to the .env file and set the value of "DB_DATABASE" to the absolute path leading to the database.sqlite

```bash
DB_DATABASE=C:\your\absolute-path\blog-of-life\database\database.sqlite
```

Once you have set the absolute path to the sqlite database run this command to seed the demo data.
```bash
php artisan migrate:fresh --seed
```

After that you're all set! Happy Testing. 🤓 
Default Login
Email: hello@blogoflife.com
Pass:  amazeblogs22
