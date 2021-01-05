
## About Task

A simple todo list CRUD application built with Laravel

No authentication is required to test the endpoints

## How to set up

```sh
## Minimum Server Requiremnt "php": 7.3,
1. Clone repository
2. CD into project and run `composer install` to install dependencies
3. Create .env file in project root and paste .env.example content into .env
4. Add Database credentials to .env
5, Run the following commands
    `php artisan key:generate`
    `php artisan migrate`
    `php artisan db:seed`
    'php artisan serve`
```
6. Test API with postman (URL should be structured like `localhost:port/api/v1/todos`)