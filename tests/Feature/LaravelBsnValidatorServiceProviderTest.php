<?php

declare(strict_types=1);

use Illuminate\Validation\Rule;
use Wijzijnweb\LaravelBsnValidator\LaravelBsnValidator;
use Wijzijnweb\LaravelBsnValidator\Rules\Bsn;

it('resolves the singleton', function () {
    expect(app(LaravelBsnValidator::class))->toBeInstanceOf(LaravelBsnValidator::class);
});

it('returns the same instance from the container', function () {
    expect(app(LaravelBsnValidator::class))->toBe(app(LaravelBsnValidator::class));
});

it('loads the package translations', function () {
    expect(trans('laravel-bsn-validator::messages.bsn', ['attribute' => 'bsn']))
        ->toBe('The bsn is not a valid BSN (Dutch citizen service number).');
});

it('registers the Rule::bsn() macro', function () {
    expect(Rule::bsn())->toBeInstanceOf(Bsn::class);
});
