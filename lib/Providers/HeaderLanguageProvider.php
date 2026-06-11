<?php

namespace PHPNomad\Translations\Providers;

class HeaderLanguageProvider
{
    /**
     * Attempts to get the language from the header.
     *
     * @return ?string
     */
    public function getLanguage(): ?string
    {
        if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) || !is_string($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            return null;
        }

        // The header is attacker-controlled: validate the primary entry
        // against the language-tag shape instead of trusting raw bytes.
        $primary = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];

        if (!preg_match('/^\s*([a-zA-Z]{2})(?:[-_][a-zA-Z0-9]{2,8})*\s*(?:;.*)?$/', $primary, $matches)) {
            return null;
        }

        return strtolower($matches[1]);
    }
}
