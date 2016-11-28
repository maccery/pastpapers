
# Meagle
> Meagle is a transparent software review website. 

[![Stories in Progress](https://badge.waffle.io/maccery/meagle-php.png?label=In Progress&title=In Progress)](https://waffle.io/maccery/meagle-php)
[![CircleCI](https://circleci.com/gh/maccery/meagle-php.svg?style=svg)](https://circleci.com/gh/maccery/meagle-php)

## Installation
### Requirements
- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer
- NPM

### 1) Dependencies
```sh
composer install
```

Then, for production:
```
npm start
```

Or, for development:
```
npm run-script dev
```
### 2) Database
You'll need a MySQL database for the application to work.

### 3) Environmental variables
You'll then need to set the following environment variables:
```
APP_ENV=
APP_KEY=
APP_DEBUG=
APP_LOG_LEVEL=
APP_URL=
APP_NAME=
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### 4) Then run the migrations:
```
php artisan migrate
```

### 5) You're ready!

## Builds
When building the application, you just need to run these commands:
```
composer install
npm start
php artisan migrate
phpunit
```

This will install all dependencies, run the database migrations and run the unit tests. 

## Deploying
When deploying, simply release the build on a server with the given requirements above. Environment variables need to be set and a database ready. The `document_root` is the `public` folder.
