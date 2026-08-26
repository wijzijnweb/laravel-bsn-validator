<?php

declare(strict_types=1);

use Faker\Factory;
use Wijzijnweb\LaravelBsnValidator\Faker\BsnProvider;
use Wijzijnweb\LaravelBsnValidator\LaravelBsnValidator;

it('generates a valid bsn', function () {
    $faker = Factory::create();
    $faker->addProvider(new BsnProvider($faker));

    expect((new LaravelBsnValidator)->isValid($faker->bsn()))->toBeTrue();
});

it('generates only valid bsns across a large sample', function () {
    $faker = Factory::create();
    $faker->addProvider(new BsnProvider($faker));
    $validator = new LaravelBsnValidator;

    $bsns = array_map(fn () => $faker->bsn(), range(1, 100));
    $invalid = array_filter($bsns, fn (string $bsn) => ! $validator->isValid($bsn));

    expect($invalid)->toBeEmpty();
});
