<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase
{
    /**
     * @param string $locale Input locale
     * @param string $expectedRegion Expected output region
     * @dataProvider dataListOfRegions
     */
    public function testGetRegion(string $locale, string $expectedRegion): void
    {
        $this->assertSame($expectedRegion, Locale::getRegion($locale));
    }

    /**
     * @see testGetRegion
     */
    public function dataListOfRegions(): array
    {
        return [
            ['af-ZA', 'ZA'],
            ['am-ET', 'ET'],
            ['ar-AE', 'AE'],
            ['ar-BH', 'BH'],
            ['ar-DZ', 'DZ'],
            ['ar-EG', 'EG'],
            ['ar-IQ', 'IQ'],
            ['ar-JO', 'JO'],
            ['ar-KW', 'KW'],
            ['ar-LB', 'LB'],
            ['ar-LY', 'LY'],
            ['ar-MA', 'MA'],
            ['arn-CL', 'CL'],
            ['ar-OM', 'OM'],
            ['ar-QA', 'QA'],
            ['ar-SA', 'SA'],
            ['ar-SY', 'SY'],
            ['ar-TN', 'TN'],
            ['ar-YE', 'YE'],
            ['as-IN', 'IN'],
            ['az-Cyrl-AZ', 'AZ'],
            ['az-Latn-AZ', 'AZ'],
            ['ba-RU', 'RU'],
            ['be-BY', 'BY'],
            ['bg-BG', 'BG'],
            ['bn-BD', 'BD'],
            ['bn-IN', 'IN'],
            ['bo-CN', 'CN'],
            ['br-FR', 'FR'],
            ['bs-Cyrl-BA', 'BA'],
            ['bs-Latn-BA', 'BA'],
            ['ca-ES', 'ES'],
            ['co-FR', 'FR'],
            ['cs-CZ', 'CZ'],
            ['cy-GB', 'GB'],
            ['da-DK', 'DK'],
            ['de-AT', 'AT'],
            ['de-CH', 'CH'],
            ['de-DE', 'DE'],
            ['de-LI', 'LI'],
            ['de-LU', 'LU'],
            ['dsb-DE', 'DE'],
            ['dv-MV', 'MV'],
            ['el-GR', 'GR'],
            ['en-029', '029'],
            ['en-AU', 'AU'],
            ['en-BZ', 'BZ'],
            ['en-CA', 'CA'],
            ['en-GB', 'GB'],
            ['en-IE', 'IE'],
            ['en-IN', 'IN'],
            ['en-JM', 'JM'],
            ['en-MY', 'MY'],
            ['en-NZ', 'NZ'],
            ['en-PH', 'PH'],
            ['en-SG', 'SG'],
            ['en-TT', 'TT'],
            ['en-US', 'US'],
            ['en-ZA', 'ZA'],
            ['en-ZW', 'ZW'],
            ['es-AR', 'AR'],
            ['es-BO', 'BO'],
            ['es-CL', 'CL'],
            ['es-CO', 'CO'],
            ['es-CR', 'CR'],
            ['es-DO', 'DO'],
            ['es-EC', 'EC'],
            ['es-ES', 'ES'],
            ['es-GT', 'GT'],
            ['es-HN', 'HN'],
            ['es-MX', 'MX'],
            ['es-NI', 'NI'],
            ['es-PA', 'PA'],
            ['es-PE', 'PE'],
            ['es-PR', 'PR'],
            ['es-PY', 'PY'],
            ['es-SV', 'SV'],
            ['es-US', 'US'],
            ['es-UY', 'UY'],
            ['es-VE', 'VE'],
            ['et-EE', 'EE'],
            ['eu-ES', 'ES'],
            ['fa-IR', 'IR'],
            ['fi-FI', 'FI'],
            ['fil-PH', 'PH'],
            ['fo-FO', 'FO'],
            ['fr-BE', 'BE'],
            ['fr-CA', 'CA'],
            ['fr-CH', 'CH'],
            ['fr-FR', 'FR'],
            ['fr-LU', 'LU'],
            ['fr-MC', 'MC'],
            ['fy-NL', 'NL'],
            ['ga-IE', 'IE'],
            ['gd-GB', 'GB'],
            ['gl-ES', 'ES'],
            ['gsw-FR', 'FR'],
            ['gu-IN', 'IN'],
            ['ha-Latn-NG', 'NG'],
            ['he-IL', 'IL'],
            ['hi-IN', 'IN'],
            ['hr-BA', 'BA'],
            ['hr-HR', 'HR'],
            ['hsb-DE', 'DE'],
            ['hu-HU', 'HU'],
            ['hy-AM', 'AM'],
            ['id-ID', 'ID'],
            ['ig-NG', 'NG'],
            ['ii-CN', 'CN'],
            ['is-IS', 'IS'],
            ['it-CH', 'CH'],
            ['it-IT', 'IT'],
            ['iu-Cans-CA', 'CA'],
            ['iu-Latn-CA', 'CA'],
            ['ja-JP', 'JP'],
            ['ka-GE', 'GE'],
            ['kk-KZ', 'KZ'],
            ['kl-GL', 'GL'],
            ['km-KH', 'KH'],
            ['kn-IN', 'IN'],
            ['kok-IN', 'IN'],
            ['ko-KR', 'KR'],
            ['ky-KG', 'KG'],
            ['lb-LU', 'LU'],
            ['lo-LA', 'LA'],
            ['lt-LT', 'LT'],
            ['lv-LV', 'LV'],
            ['mi-NZ', 'NZ'],
            ['mk-MK', 'MK'],
            ['ml-IN', 'IN'],
            ['mn-MN', 'MN'],
            ['mn-Mong-CN', 'CN'],
            ['moh-CA', 'CA'],
            ['mr-IN', 'IN'],
            ['ms-BN', 'BN'],
            ['ms-MY', 'MY'],
            ['mt-MT', 'MT'],
            ['nb-NO', 'NO'],
            ['ne-NP', 'NP'],
            ['nl-BE', 'BE'],
            ['nl-NL', 'NL'],
            ['nn-NO', 'NO'],
            ['nso-ZA', 'ZA'],
            ['oc-FR', 'FR'],
            ['or-IN', 'IN'],
            ['pa-IN', 'IN'],
            ['pl-PL', 'PL'],
            ['prs-AF', 'AF'],
            ['ps-AF', 'AF'],
            ['pt-BR', 'BR'],
            ['pt-PT', 'PT'],
            ['qut-GT', 'GT'],
            ['quz-BO', 'BO'],
            ['quz-EC', 'EC'],
            ['quz-PE', 'PE'],
            ['rm-CH', 'CH'],
            ['ro-RO', 'RO'],
            ['ru-RU', 'RU'],
            ['rw-RW', 'RW'],
            ['sah-RU', 'RU'],
            ['sa-IN', 'IN'],
            ['se-FI', 'FI'],
            ['se-NO', 'NO'],
            ['se-SE', 'SE'],
            ['si-LK', 'LK'],
            ['sk-SK', 'SK'],
            ['sl-SI', 'SI'],
            ['sma-NO', 'NO'],
            ['sma-SE', 'SE'],
            ['smj-NO', 'NO'],
            ['smj-SE', 'SE'],
            ['smn-FI', 'FI'],
            ['sms-FI', 'FI'],
            ['sq-AL', 'AL'],
            ['sr-Cyrl-BA', 'BA'],
            ['sr-Cyrl-CS', 'CS'],
            ['sr-Cyrl-ME', 'ME'],
            ['sr-Cyrl-RS', 'RS'],
            ['sr-Latn-BA', 'BA'],
            ['sr-Latn-CS', 'CS'],
            ['sr-Latn-ME', 'ME'],
            ['sr-Latn-RS', 'RS'],
            ['sv-FI', 'FI'],
            ['sv-SE', 'SE'],
            ['sw-KE', 'KE'],
            ['syr-SY', 'SY'],
            ['ta-IN', 'IN'],
            ['te-IN', 'IN'],
            ['tg-Cyrl-TJ', 'TJ'],
            ['th-TH', 'TH'],
            ['tk-TM', 'TM'],
            ['tn-ZA', 'ZA'],
            ['tr-TR', 'TR'],
            ['tt-RU', 'RU'],
            ['tzm-Latn-DZ', 'DZ'],
            ['ug-CN', 'CN'],
            ['uk-UA', 'UA'],
            ['ur-PK', 'PK'],
            ['uz-Cyrl-UZ', 'UZ'],
            ['uz-Latn-UZ', 'UZ'],
            ['vi-VN', 'VN'],
            ['wo-SN', 'SN'],
            ['xh-ZA', 'ZA'],
            ['yo-NG', 'NG'],
            ['zh-CN', 'CN'],
            ['zh-HK', 'HK'],
            ['zh-MO', 'MO'],
            ['zh-SG', 'SG'],
            ['zh-TW', 'TW'],
            ['zu-ZA', 'ZA'],

            /*
             * Edge Cases
             */

            ['en', ''],
            ['ha-Latn', ''],
            ['en_US_POSIX', 'US'],

            ['en-gb', 'GB'],
            ['en_gb', 'GB'],
        ];
    }
}
