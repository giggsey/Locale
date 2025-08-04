<?php

declare(strict_types=1);

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;
use PHPUnit\Framework\TestCase;

class CountryListTest extends TestCase
{
    public function testCountryListForEn(): void
    {
        $countryList = Locale::getAllCountriesForLocale('en');

        self::assertIsArray($countryList);

        self::assertArrayHasKey('GB', $countryList);
        self::assertSame('United Kingdom', $countryList['GB']);
    }

    public function testCountryListInheriting(): void
    {
        $countryList = Locale::getAllCountriesForLocale('es-bz');

        self::assertIsArray($countryList);

        self::assertArrayHasKey('TA', $countryList);
        self::assertSame('Tristán de Acuña', $countryList['TA']);

        self::assertArrayHasKey('GB', $countryList);
        self::assertSame('Reino Unido', $countryList['GB']);
    }

    public function testCountryListForInvalidLocale(): void
    {
        $this->expectException('RuntimeException');
        $this->expectExceptionMessage('Locale is not supported');
        Locale::getAllCountriesForLocale('fake');
    }
}
