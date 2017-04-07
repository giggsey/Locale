<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;

class CountryListTest extends \PHPUnit_Framework_TestCase
{
    public function testCountryListForEn()
    {
        $countryList = Locale::getAllCountriesForLocale('en');

        $this->assertInternalType('array', $countryList);

        $this->assertArrayHasKey('GB', $countryList);
        $this->assertEquals('United Kingdom', $countryList['GB']);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Locale is not supported
     */
    public function testCountryListForInvalidLocale()
    {
        Locale::getAllCountriesForLocale('fake');
    }
}
