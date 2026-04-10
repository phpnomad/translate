# phpnomad/translate

[![Latest Version](https://img.shields.io/packagist/v/phpnomad/translate.svg)](https://packagist.org/packages/phpnomad/translate)
[![Total Downloads](https://img.shields.io/packagist/dt/phpnomad/translate.svg)](https://packagist.org/packages/phpnomad/translate)
[![PHP Version](https://img.shields.io/packagist/php-v/phpnomad/translate.svg)](https://packagist.org/packages/phpnomad/translate)
[![License](https://img.shields.io/packagist/l/phpnomad/translate.svg)](https://packagist.org/packages/phpnomad/translate)

`phpnomad/translate` is the abstract translation contract PHPNomad applications use to localize strings. It defines a `TranslationStrategy` interface with methods for singular and plural translation, each accepting an optional disambiguation context, plus a few small supporting interfaces for text domain and language signals. Domain and locale resolution lives inside the concrete strategy, so application code can call `translate()` without knowing which backend is wired in behind it.

## Installation

```bash
composer require phpnomad/translate
```

## Overview

- `TranslationStrategy` defines `translate()` and `translatePlural()`. Both accept an optional disambiguation context (for example, distinguishing a noun from a verb with the same spelling).
- `HasTextDomain` and `HasLanguage` are thin interfaces for strategies that need a text domain or a language code from their environment.
- `HeaderLanguageProvider` reads `HTTP_ACCEPT_LANGUAGE` and returns a two-character language code, or null when no header is present.
- Concrete backends live in integration packages. `phpnomad/symfony-translation-integration` wires the strategy to Symfony Translation, and `phpnomad/gettext-integration` wires it to gettext.
- When no translation exists for a given string, the contract is to return the original text unchanged, so missing translations never break call sites.

## Documentation

Full documentation lives at [phpnomad.com](https://phpnomad.com).

## License

MIT. See [LICENSE.txt](LICENSE.txt).
