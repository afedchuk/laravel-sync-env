# .env File Updater

The package syncs your `.env` file with your `.env.example`.

Keep your {source} file in sync with your {destination} file.

It reads the {destination} file and makes to fill your {source} accordingly.

## Installation via Composer

Start by requiring the package with composer

For laravel framework

```
composer require rocketroute/env-updater
```

Then add the `RocketRoute\EnvUpdater\EnvSyncServiceProvider::class` service provider to your `config/app.php` file, and that's it
and use it as an independent library

```
composer install
```

## Usage

### Sync your envs files

You can populate your .env file from the .env.example by using the `php artisan env:sync {destination file} {source file}` command for laravel framework and as an independent library php run.php {destionation file} {source file}.

The command will tell you if there's anything not in sync between your files.