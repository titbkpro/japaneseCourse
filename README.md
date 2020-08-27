# JAPANESE COURSE
## Clone source code:
```bash
$ git clone https://github.com/titbkpro/japaneseCourse.git
```
## Generate .env file
```bash
cp .env.example .env
```
## Generate APP_KEY
```bash
php artisan key:generate
```
## Migrate DB
```bash
$ composer install
$ php artisan db:create
$ php artisan migrate
```