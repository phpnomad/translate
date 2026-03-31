<?php

namespace PHPNomad\Translations\Interfaces;

/**
 * Platform-agnostic translation strategy.
 *
 * Domain and locale are implementation concerns — resolved by the concrete
 * strategy from its injected providers, not passed per call.
 */
interface TranslationStrategy
{
    /**
     * Translate a string, optionally with disambiguation context.
     *
     * @param string      $text    The source string to translate.
     * @param string|null $context Optional disambiguation context (e.g. 'noun' vs 'verb').
     * @return string The translated string, or the original if no translation exists.
     */
    public function translate(string $text, ?string $context = null): string;

    /**
     * Translate a plural string, optionally with disambiguation context.
     *
     * @param string      $singular The singular form.
     * @param string      $plural   The plural form.
     * @param int         $count    The number used to determine which form to use.
     * @param string|null $context  Optional disambiguation context.
     * @return string The translated string with the correct plural form.
     */
    public function translatePlural(string $singular, string $plural, int $count, ?string $context = null): string;
}
