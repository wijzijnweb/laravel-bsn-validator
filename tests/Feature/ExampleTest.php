<?php

declare(strict_types=1);

use Wijzijnweb\LaravelBsnValidator\LaravelBsnValidator;

it('resolves the singleton', function () {
    expect(app(LaravelBsnValidator::class))->toBeInstanceOf(LaravelBsnValidator::class);
});

it('returns the same instance from the container', function () {
    expect(app(LaravelBsnValidator::class))->toBe(app(LaravelBsnValidator::class));
});

it('loads the package translations', function () {
    expect(trans('laravel-bsn-validator::messages.placeholder'))->toBe('LaravelBsnValidator placeholder translation.');
});
