<?php

declare(strict_types=1);

namespace Wijzijnweb\LaravelBsnValidator\Faker;

use Faker\Provider\Base;
use Wijzijnweb\LaravelBsnValidator\LaravelBsnValidator;

class BsnProvider extends Base
{
    /**
     * Generate a valid Dutch BSN (burgerservicenummer).
     */
    public function bsn(): string
    {
        $validator = new LaravelBsnValidator;
        $weights = [9, 8, 7, 6, 5, 4, 3, 2];

        while (true) {
            $digits = [];

            for ($i = 0; $i < 8; $i++) {
                $digits[] = self::randomDigit();
            }

            $sum = 0;

            foreach ($digits as $index => $digit) {
                $sum += $digit * $weights[$index];
            }

            $checkDigit = $sum % 11;

            if ($checkDigit > 9) {
                continue;
            }

            $bsn = implode('', $digits).$checkDigit;

            if ($validator->isValid($bsn)) {
                return $bsn;
            }
        }
    }
}
