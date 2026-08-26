<?php

declare(strict_types=1);

namespace Wijzijnweb\LaravelBsnValidator;

class LaravelBsnValidator
{
    /**
     * Determine whether the given value is a valid Dutch BSN (burgerservicenummer).
     *
     * Applies the "11-proef": the value must be exactly 9 numeric digits, must
     * not be all zeros, and the weighted sum of its digits (weights 9 down to
     * 2 for the first eight digits, and -1 for the ninth) must be divisible by 11.
     */
    public function isValid(string $bsn): bool
    {
        if (! preg_match('/^\d{9}$/', $bsn)) {
            return false;
        }

        if ($bsn === str_repeat('0', 9)) {
            return false;
        }

        $digits = array_map('intval', str_split($bsn));
        $weights = [9, 8, 7, 6, 5, 4, 3, 2, -1];

        $sum = 0;

        foreach ($digits as $index => $digit) {
            $sum += $digit * $weights[$index];
        }

        return $sum % 11 === 0;
    }
}
