# Release Notes

## [Unreleased](https://github.com/wijzijnweb/laravel-bsn-validator/compare/v1.0.0...HEAD)

## [v1.0.0](https://github.com/wijzijnweb/laravel-bsn-validator/compare/v0.1.0...v1.0.0) - 2026-08-26

### Enhancements

- Dutch BSN (burgerservicenummer) validation via the 11-proef checksum, exposed as `Rule::bsn()` or the `Bsn` rule class
- Faker provider (`Wijzijnweb\LaravelBsnValidator\Faker\BsnProvider`) for generating valid BSNs in seeders/factories
- English and Dutch translations for the validation error message

**Full Changelog**: https://github.com/wijzijnweb/laravel-bsn-validator/commits/v1.0.0

## [v0.1.0](https://github.com/wijzijnweb/laravel-bsn-validator/compare/...v0.1.0) - 202x-xx-xx

Initial pre-release.
