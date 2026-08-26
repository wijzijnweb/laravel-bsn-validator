<div align="center">
    <h1>Laravel BSN Validator</h1>
</div>

<p align="center">
    <a href="https://packagist.org/packages/wijzijnweb/laravel-bsn-validator"><img src="https://img.shields.io/packagist/v/wijzijnweb/laravel-bsn-validator.svg?style=flat-square" alt="Packagist"></a>
    <a href="https://packagist.org/packages/wijzijnweb/laravel-bsn-validator"><img src="https://img.shields.io/packagist/php-v/wijzijnweb/laravel-bsn-validator.svg?style=flat-square" alt="PHP from Packagist"></a>
    <a href="https://packagist.org/packages/wijzijnweb/laravel-bsn-validator"><img src="https://badge.laravel.cloud/badge/wijzijnweb/laravel-bsn-validator?style=flat" alt="Laravel versions"></a>
    <a href="https://github.com/wijzijnweb/laravel-bsn-validator/actions"><img alt="GitHub Workflow Status (main)" src="https://img.shields.io/github/actions/workflow/status/wijzijnweb/laravel-bsn-validator/tests.yml?branch=main&label=Tests&style=flat-square"></a>
    <a href="https://packagist.org/packages/wijzijnweb/laravel-bsn-validator"><img src="https://img.shields.io/packagist/dt/wijzijnweb/laravel-bsn-validator.svg?style=flat-square" alt="Total Downloads"></a>
</p>

Dutch BSN validation for Laravel.

## Installation

You can install the package via Composer:

```bash
composer require wijzijnweb/laravel-bsn-validator
```

You may publish all of the package's resources at once:

```bash
php artisan vendor:publish --tag="laravel-bsn-validator"
```

Or, you may publish each resource individually:

### Publishing the Translations

```bash
php artisan vendor:publish --tag="laravel-bsn-validator-lang"
```

## Usage

Validate a BSN directly:

```php
use Wijzijnweb\LaravelBsnValidator\LaravelBsnValidator;

app(LaravelBsnValidator::class)->isValid('123456782'); // true
```

Or use the validation rule with Laravel's validator:

```php
use Illuminate\Validation\Rule;

$request->validate([
    'bsn' => ['required', Rule::bsn()],
]);
```

The `Wijzijnweb\LaravelBsnValidator\Rules\Bsn` rule class can be used directly as an alternative to `Rule::bsn()`.

### Generating BSNs with Faker

This package ships a Faker provider for generating valid BSNs in your app's seeders and factories. It requires `fakerphp/faker`, which this package does not depend on directly, so make sure it's installed in your app:

```php
use Wijzijnweb\LaravelBsnValidator\Faker\BsnProvider;

$faker->addProvider(new BsnProvider($faker));

$faker->bsn(); // e.g. '123456782'
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Thank you for considering contributing to Laravel BSN Validator! Please review our [contributing guide](.github/CONTRIBUTING.md) to get started.

## Credits

- [DannyHageman](https://github.com/wijzijnweb)
- [All Contributors](../../contributors)

## License

Laravel BSN Validator is open-sourced software licensed under the [MIT license](LICENSE.md).
