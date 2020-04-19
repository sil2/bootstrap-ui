# Boostrap extension for laravel-admin

## Requirements

* laravel-admin >= 1.6.1

## Installation

```bash
composer require xa/boostrap
php artisan vendor:publish --tag=laravel-admin-bootstrap-ui
```

## Update

```bash
composer update xa/boostrap-ui
php artisan vendor:publish --tag=laravel-admin-boostrap-ui --force
```

## Configurations

Add `extensions` option in your `config/admin.php` configuration file:

```php
'extensions' => [
    'boostrap-ui' => [
        // If the value is set to false, this extension will be disabled
        'enable' => true
    ]
]
```

## Use

Just **Refresh** your browser.

## More resources

[Awesome Laravel-admin](https://github.com/jxlwqq/awesome-laravel-admin)

## License

Licensed under [The MIT License (MIT)](LICENSE).

