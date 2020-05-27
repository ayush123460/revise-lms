# Revise Learning Management System

This server is the core Learning Management System. It is dependent on the [authentication service](https://github.com/team-xforce/revise-authentication), without which it will not function.

## Requirements

- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Installation

**Warning: This software is not suitable for production use.**

Laravel utilizes [Composer](https://getcomposer.org) to manage its dependencies. Consult with your operating system's manual for installing it.

1. Clone this repository into a folder of your choice.

2. Execute in a terminal open in the same folder,
	- `composer install`

3. Setup the environment variables
	- Copy the file .env.example into a new file .env
	- Make sure you have entered the correct database details.
    - Fill in the Authentication service URI, client ID, and client secret generated from the authentication service.
	- Run `php artisan key:generate --ansi` to set up the application's keys.

4. Set up Database
	- `php artisan migrate --seed`

## Running

There are two ways to run the application

1. Web server

We recommend running the server under Nginx. More information can be found [here](https://laravel.com/docs/7.x).

2. Local dev environment

This server can be run locally with the help of the following command:
`php artisan serve`

Create a teacher account from the authentication service to start.

## Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.