<?php

namespace PHPNomad\Translations\Tests\Unit;

use PHPNomad\Translations\Providers\HeaderLanguageProvider;
use PHPNomad\Translations\Tests\TestCase;

class HeaderLanguageProviderTest extends TestCase
{
    protected function tearDown(): void
    {
        unset($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        parent::tearDown();
    }

    /**
     * @test
     */
    public function testReturnsLanguageFromAcceptLanguageHeader(): void
    {
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr';

        $provider = new HeaderLanguageProvider();

        $this->assertEquals('fr', $provider->getLanguage());
    }

    /**
     * @test
     */
    public function testReturnsNullWhenHeaderIsMissing(): void
    {
        unset($_SERVER['HTTP_ACCEPT_LANGUAGE']);

        $provider = new HeaderLanguageProvider();

        $this->assertNull($provider->getLanguage());
    }

    /**
     * @test
     */
    public function testHandlesComplexAcceptLanguageValues(): void
    {
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'en-US,en;q=0.9,fr;q=0.8';

        $provider = new HeaderLanguageProvider();

        $this->assertEquals('en', $provider->getLanguage());
    }
}
