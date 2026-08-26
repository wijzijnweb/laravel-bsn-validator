<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Wijzijnweb\LaravelBsnValidator\Rules\Bsn;

it('passes validation for a valid bsn using the rule class', function () {
    $validator = Validator::make(['bsn' => '123456782'], ['bsn' => [new Bsn()]]);

    expect($validator->passes())->toBeTrue();
});

it('passes validation for a valid bsn using Rule::bsn()', function () {
    $validator = Validator::make(['bsn' => '111222333'], ['bsn' => [Rule::bsn()]]);

    expect($validator->passes())->toBeTrue();
});

it('fails validation for an invalid bsn with the translated message', function () {
    $validator = Validator::make(['bsn' => '123456780'], ['bsn' => [Rule::bsn()]]);

    expect($validator->fails())->toBeTrue()
        ->and($validator->errors()->first('bsn'))
        ->toBe('The bsn is not a valid BSN (Dutch citizen service number).');
});

it('fails validation for a non-numeric value', function () {
    $validator = Validator::make(['bsn' => 'not-a-bsn'], ['bsn' => [Rule::bsn()]]);

    expect($validator->fails())->toBeTrue();
});
