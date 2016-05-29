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
     * @return array
     */
    public function dataListOfLocales()
    {
        $locales = array();

        foreach (\ResourceBundle::getLocales('') as $locale) {
            $locales[] = array($locale);
        }

        return $locales;
    }
}
