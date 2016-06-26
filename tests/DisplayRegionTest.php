<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;

class DisplayRegionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $locale
     * @param string $inLocale
     * @param string $expectedRegion
     * @dataProvider dataDisplayRegions
     */
    public function testGetDisplayRegion($locale, $inLocale, $expectedRegion)
    {
        $this->assertEquals(
            $expectedRegion,
            Locale::getDisplayRegion($locale, $inLocale),
            "getDisplayRegion with $locale and $inLocale"
        );
    }

    /**
     * @see testGetDisplayRegion
     * @return array
     */
    public function dataDisplayRegions()
    {
        return array_merge(
            $this->dataForUnitedKingdom(),
            $this->dataForGermany(),
            $this->dataForMissingEntries(),
            $this->dataForInvalidRegions()
        );
    }

    protected function dataForUnitedKingdom()
    {
        return array(
            array('en-GB', 'en-GB', 'United Kingdom'),
            array('en_GB', 'en-GB', 'United Kingdom'),
            array('en-GB', 'en_GB', 'United Kingdom'),
            array('en_GB', 'en_GB', 'United Kingdom'),
            array('fake-GB', 'en-GB', 'United Kingdom'),
            array('en-GB', 'en-US', 'United Kingdom'),
            array('en-GB', 'fr-FR', 'Royaume-Uni'),
            array('en-GB', 'fr-CH', 'Royaume-Uni'),
            array('en-GB', 'de-DE', 'Vereinigtes Königreich'),
            array('en-GB', 'de-CH', 'Grossbritannien'),
            array('en-GB', 'dz', 'ཡུ་ནཱའི་ཊེཌ་ ཀིང་ཌམ'),
            array('en-GB', 'ro', 'Regatul Unit'),
            array('en-GB', 'ru', 'Великобритания'),
            array('en-GB', 'ru-UA', 'Великобритания'),
            array('en-GB', 'zh', '英国'),
            array('en-GB', 'zh-Hans-HK', '英国'),
            array('en-GB', 'zh-Hant-HK', '英國'),
            array('EN-gb', 'EN-gb', 'United Kingdom'),
        );
    }

    protected function dataForGermany()
    {
        return array(
            array('-de', 'en-GB', 'Germany'),
            array('de-DE', 'en', 'Germany'),
            array('de-DE', 'en-GB', 'Germany'),
            array('de-DE', 'en-US', 'Germany'),
            array('de-DE', 'de', 'Deutschland'),
            array('de-DE', 'de-DE', 'Deutschland'),
            array('de-DE', 'ru', 'Германия'),
            array('de-DE', 'fr', 'Allemagne'),
        );
    }

    protected function dataForMissingEntries()
    {
        return array(
            array('-rs', 'en', 'Serbia'),
            array('-rs', 'ee', ''), // PHP returns 'RS' here, which I think is wrong...
        );
    }

    protected function dataForInvalidRegions()
    {
        return array(
            array('fake-too', 'en', ''),
            array('en', 'en-GB', ''),
            array('en-GB', 'fake-GB', ''),
        );
    }
}
