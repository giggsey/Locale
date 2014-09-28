<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;

class PrimaryLanguageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $locale
     * @dataProvider dataCompareToLocale
     */
    public function testCompareToLocale($locale)
    {
        $localLanguage = Locale::getPrimaryLanguage($locale);

        $intlLanguage = \Locale::getPrimaryLanguage($locale);

        $this->assertEquals($intlLanguage, $localLanguage);
    }

    public function dataCompareToLocale()
    {
        return array(
            array("en"),
        );
    }
}
