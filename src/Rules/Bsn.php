<?php

declare(strict_types=1);

namespace Wijzijnweb\LaravelBsnValidator\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Wijzijnweb\LaravelBsnValidator\LaravelBsnValidator;

class Bsn implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value) || ! app(LaravelBsnValidator::class)->isValid($value)) {
            $fail('laravel-bsn-validator::messages.bsn')->translate();
        }
    }
}
