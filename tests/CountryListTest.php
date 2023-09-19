<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;
use PHPUnit\Framework\TestCase;

class CountryListTest extends TestCase
{
    public function testCountryListForEn(): void
    {
        $countryList = Locale::getAllCountriesForLocale('en');

        $this->assertIsArray($countryList);

        $this->assertArrayHasKey('GB', $countryList);
        $this->assertSame('United Kingdom', $countryList['GB']);
    }

    public function testCountryListInheriting(): void
    {
        $countryList = Locale::getAllCountriesForLocale('es-bz');

        $this->assertIsArray($countryList);

        $this->assertArrayHasKey('TA', $countryList);
        $this->assertSame('Tristán da Cunha', $countryList['TA']);

        $this->assertArrayHasKey('GB', $countryList);
        $this->assertSame('Reino Unido', $countryList['GB']);
    }

    public function testCountryListForInvalidLocale(): void
    {
        $this->expectException('RuntimeException');
        $this->expectExceptionMessage('Locale is not supported');
        Locale::getAllCountriesForLocale('fake');
    }
}
