<?php

declare(strict_types=1);

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class DisplayRegionTest extends TestCase
{
    #[DataProvider('dataDisplayRegions')]
    public function testGetDisplayRegion(string $locale, string $inLocale, string $expectedRegion): void
    {
        self::assertSame(
            $expectedRegion,
            Locale::getDisplayRegion($locale, $inLocale),
            "getDisplayRegion with $locale and $inLocale"
        );
    }

    /**
     * @see testGetDisplayRegion
     * @return array<array{string, string,string}>
     */
    public static function dataDisplayRegions(): array
    {
        return array_merge(
            self::dataForUnitedKingdom(),
            self::dataForGermany(),
            self::dataForMissingEntries(),
            self::dataForInvalidRegions()
        );
    }
    /**
     * @return array<array{string, string,string}>
     */
    protected static function dataForUnitedKingdom(): array
    {
        return [
            ['en-GB', 'en-GB', 'United Kingdom'],
            ['en_GB', 'en-GB', 'United Kingdom'],
            ['en-GB', 'en_GB', 'United Kingdom'],
            ['en_GB', 'en_GB', 'United Kingdom'],
            ['fake-GB', 'en-GB', 'United Kingdom'],
            ['en-GB', 'en-US', 'United Kingdom'],
            ['en-GB', 'fr-FR', 'Royaume-Uni'],
            ['en-GB', 'fr-CH', 'Royaume-Uni'],
            ['en-GB', 'de-DE', 'Vereinigtes Königreich'],
            ['en-GB', 'de-CH', 'Vereinigtes Königreich'],
            ['en-GB', 'dz', 'ཡུ་ནཱའི་ཊེཌ་ ཀིང་ཌམ'],
            ['en-GB', 'ro', 'Regatul Unit'],
            ['en-GB', 'ru', 'Великобритания'],
            ['en-GB', 'ru-UA', 'Великобритания'],
            ['en-GB', 'zh', '英国'],
            ['en-GB', 'zh-Hans-HK', '英国'],
            ['en-GB', 'zh-Hant-HK', '英國'],
            ['EN-gb', 'EN-gb', 'United Kingdom'],
        ];
    }
    /**
     * @return array<array{string, string,string}>
     */
    protected static function dataForGermany(): array
    {
        return [
            ['-de', 'en-GB', 'Germany'],
            ['de-DE', 'en', 'Germany'],
            ['de-DE', 'en-GB', 'Germany'],
            ['de-DE', 'en-US', 'Germany'],
            ['de-DE', 'de', 'Deutschland'],
            ['de-DE', 'de-DE', 'Deutschland'],
            ['de-DE', 'ru', 'Германия'],
            ['de-DE', 'fr', 'Allemagne'],
        ];
    }
    /**
     * @return array<array{string, string,string}>
     */
    protected static function dataForMissingEntries(): array
    {
        return [
            ['-rs', 'en', 'Serbia'],
            ['-rs', 'ee', ''], // PHP returns 'RS' here, which I think is wrong...
        ];
    }

    /**
     * @return array<array{string, string,string}>
     */
    protected static function dataForInvalidRegions(): array
    {
        return [
            ['fake-too', 'en', ''],
            ['en', 'en-GB', ''],
            ['en-GB', 'fake-GB', ''],
        ];
    }
}
