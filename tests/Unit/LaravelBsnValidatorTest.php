<?php

declare(strict_types=1);

use Wijzijnweb\LaravelBsnValidator\LaravelBsnValidator;

it('accepts valid bsns', function (string $bsn) {
    expect((new LaravelBsnValidator)->isValid($bsn))->toBeTrue();
})->with([
    '123456782',
    '111222333',
]);

it('rejects a bsn that fails the 11-proef checksum', function () {
    expect((new LaravelBsnValidator)->isValid('123456780'))->toBeFalse();
});

it('rejects bsns that are not exactly 9 digits', function (string $bsn) {
    expect((new LaravelBsnValidator)->isValid($bsn))->toBeFalse();
})->with([
    '12345678',
    '1234567890',
    '',
]);

it('rejects non-numeric input', function (string $bsn) {
    expect((new LaravelBsnValidator)->isValid($bsn))->toBeFalse();
})->with([
    '12345678a',
    'abcdefghi',
]);

it('rejects an all-zero bsn', function () {
    expect((new LaravelBsnValidator)->isValid('000000000'))->toBeFalse();
});
