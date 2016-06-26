<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;

class LocaleComparisonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $locale
     * @dataProvider dataListOfLocales
     */
    public function testGetPrimaryLanguage($locale)
    {
        $localLanguage = Locale::getPrimaryLanguage($locale);

        $intlLanguage = \Locale::getPrimaryLanguage($locale);

        $this->assertEquals($intlLanguage, $localLanguage);
    }

    /**
     * @param $locale
     * @dataProvider dataListOfLocales
     */
    public function testGetRegion($locale)
    {
        $localLanguage = Locale::getRegion($locale);

        $intlLanguage = \Locale::getRegion($locale);

        $this->assertEquals($intlLanguage, $localLanguage, "checking region {$locale}");
    }

    /**
     * @param $locale
     * @param $locale_in
     * @dataProvider dataDisplayRegion
     */
    public function testGetDisplayRegion($locale, $locale_in)
    {
        $localLanguage = Locale::getDisplayRegion($locale, $locale_in);

        $intlLanguage = \Locale::getDisplayRegion($locale, $locale_in);

        $this->assertEquals($intlLanguage, $localLanguage, "region {$locale} with {$locale_in}");
    }

    public function dataDisplayRegion()
    {
        $locales = [];

        foreach ($this->getLocaleList() as $locale) {
            foreach ($this->getLocaleList() as $innerLocale) {
                $locales[] = [$locale, $innerLocale];
            }
        }

        return $locales;
    }

    /**
     * @return array
     */
    public function dataListOfLocales()
    {
        $locales = [];

        foreach ($this->getLocaleList() as $locale) {
            $locales[] = [$locale];
        }

        return $locales;
    }

    private function getLocaleList()
    {
        $locales = \ResourceBundle::getLocales('');

        $ignoreList = [
            'ar_001',
            'en_001',
            'en_150',
            'es_419',
            'yi_001',
        ];

        $returnArray = [];

        foreach ($locales as $locale) {
            if (in_array($locale, $ignoreList)) {
                continue;
            }

            $returnArray[] = $locale;
        }

        return $returnArray;
    }
}
