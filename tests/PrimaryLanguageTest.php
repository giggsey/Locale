<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;
use PHPUnit\Framework\TestCase;

class PrimaryLanguageTest extends TestCase
{
    /**
     * @param string $locale Input locale
     * @param string $language Expected output language
     * @dataProvider dataListOfPrimaryLanguages
     */
    public function testGetPrimaryLanguage(string $locale, string $language): void
    {
        $this->assertEquals($language, Locale::getPrimaryLanguage($locale));
    }

    /**
     * @see testGetPrimaryLanguage
     * @return array
     */
    public function dataListOfPrimaryLanguages(): array
    {
        return [
            ['af-ZA', 'af'],
            ['am-ET', 'am'],
            ['ar-AE', 'ar'],
            ['ar-BH', 'ar'],
            ['ar-DZ', 'ar'],
            ['ar-EG', 'ar'],
            ['ar-IQ', 'ar'],
            ['ar-JO', 'ar'],
            ['ar-KW', 'ar'],
            ['ar-LB', 'ar'],
            ['ar-LY', 'ar'],
            ['ar-MA', 'ar'],
            ['arn-CL', 'arn'],
            ['ar-OM', 'ar'],
            ['ar-QA', 'ar'],
            ['ar-SA', 'ar'],
            ['ar-SY', 'ar'],
            ['ar-TN', 'ar'],
            ['ar-YE', 'ar'],
            ['as-IN', 'as'],
            ['az-Cyrl-AZ', 'az'],
            ['az-Latn-AZ', 'az'],
            ['ba-RU', 'ba'],
            ['be-BY', 'be'],
            ['bg-BG', 'bg'],
            ['bn-BD', 'bn'],
            ['bn-IN', 'bn'],
            ['bo-CN', 'bo'],
            ['br-FR', 'br'],
            ['bs-Cyrl-BA', 'bs'],
            ['bs-Latn-BA', 'bs'],
            ['ca-ES', 'ca'],
            ['co-FR', 'co'],
            ['cs-CZ', 'cs'],
            ['cy-GB', 'cy'],
            ['da-DK', 'da'],
            ['de-AT', 'de'],
            ['de-CH', 'de'],
            ['de-DE', 'de'],
            ['de-LI', 'de'],
            ['de-LU', 'de'],
            ['dsb-DE', 'dsb'],
            ['dv-MV', 'dv'],
            ['el-GR', 'el'],
            ['en-029', 'en'],
            ['en-AU', 'en'],
            ['en-BZ', 'en'],
            ['en-CA', 'en'],
            ['en-GB', 'en'],
            ['en-IE', 'en'],
            ['en-IN', 'en'],
            ['en-JM', 'en'],
            ['en-MY', 'en'],
            ['en-NZ', 'en'],
            ['en-PH', 'en'],
            ['en-SG', 'en'],
            ['en-TT', 'en'],
            ['en-US', 'en'],
            ['en-ZA', 'en'],
            ['en-ZW', 'en'],
            ['es-AR', 'es'],
            ['es-BO', 'es'],
            ['es-CL', 'es'],
            ['es-CO', 'es'],
            ['es-CR', 'es'],
            ['es-DO', 'es'],
            ['es-EC', 'es'],
            ['es-ES', 'es'],
            ['es-GT', 'es'],
            ['es-HN', 'es'],
            ['es-MX', 'es'],
            ['es-NI', 'es'],
            ['es-PA', 'es'],
            ['es-PE', 'es'],
            ['es-PR', 'es'],
            ['es-PY', 'es'],
            ['es-SV', 'es'],
            ['es-US', 'es'],
            ['es-UY', 'es'],
            ['es-VE', 'es'],
            ['et-EE', 'et'],
            ['eu-ES', 'eu'],
            ['fa-IR', 'fa'],
            ['fi-FI', 'fi'],
            ['fil-PH', 'fil'],
            ['fo-FO', 'fo'],
            ['fr-BE', 'fr'],
            ['fr-CA', 'fr'],
            ['fr-CH', 'fr'],
            ['fr-FR', 'fr'],
            ['fr-LU', 'fr'],
            ['fr-MC', 'fr'],
            ['fy-NL', 'fy'],
            ['ga-IE', 'ga'],
            ['gd-GB', 'gd'],
            ['gl-ES', 'gl'],
            ['gsw-FR', 'gsw'],
            ['gu-IN', 'gu'],
            ['ha-Latn-NG', 'ha'],
            ['he-IL', 'he'],
            ['hi-IN', 'hi'],
            ['hr-BA', 'hr'],
            ['hr-HR', 'hr'],
            ['hsb-DE', 'hsb'],
            ['hu-HU', 'hu'],
            ['hy-AM', 'hy'],
            ['id-ID', 'id'],
            ['ig-NG', 'ig'],
            ['ii-CN', 'ii'],
            ['is-IS', 'is'],
            ['it-CH', 'it'],
            ['it-IT', 'it'],
            ['iu-Cans-CA', 'iu'],
            ['iu-Latn-CA', 'iu'],
            ['ja-JP', 'ja'],
            ['ka-GE', 'ka'],
            ['kk-KZ', 'kk'],
            ['kl-GL', 'kl'],
            ['km-KH', 'km'],
            ['kn-IN', 'kn'],
            ['kok-IN', 'kok'],
            ['ko-KR', 'ko'],
            ['ky-KG', 'ky'],
            ['lb-LU', 'lb'],
            ['lo-LA', 'lo'],
            ['lt-LT', 'lt'],
            ['lv-LV', 'lv'],
            ['mi-NZ', 'mi'],
            ['mk-MK', 'mk'],
            ['ml-IN', 'ml'],
            ['mn-MN', 'mn'],
            ['mn-Mong-CN', 'mn'],
            ['moh-CA', 'moh'],
            ['mr-IN', 'mr'],
            ['ms-BN', 'ms'],
            ['ms-MY', 'ms'],
            ['mt-MT', 'mt'],
            ['nb-NO', 'nb'],
            ['ne-NP', 'ne'],
            ['nl-BE', 'nl'],
            ['nl-NL', 'nl'],
            ['nn-NO', 'nn'],
            ['nso-ZA', 'nso'],
            ['oc-FR', 'oc'],
            ['or-IN', 'or'],
            ['pa-IN', 'pa'],
            ['pl-PL', 'pl'],
            ['prs-AF', 'prs'],
            ['ps-AF', 'ps'],
            ['pt-BR', 'pt'],
            ['pt-PT', 'pt'],
            ['qut-GT', 'qut'],
            ['quz-BO', 'quz'],
            ['quz-EC', 'quz'],
            ['quz-PE', 'quz'],
            ['rm-CH', 'rm'],
            ['ro-RO', 'ro'],
            ['ru-RU', 'ru'],
            ['rw-RW', 'rw'],
            ['sah-RU', 'sah'],
            ['sa-IN', 'sa'],
            ['se-FI', 'se'],
            ['se-NO', 'se'],
            ['se-SE', 'se'],
            ['si-LK', 'si'],
            ['sk-SK', 'sk'],
            ['sl-SI', 'sl'],
            ['sma-NO', 'sma'],
            ['sma-SE', 'sma'],
            ['smj-NO', 'smj'],
            ['smj-SE', 'smj'],
            ['smn-FI', 'smn'],
            ['sms-FI', 'sms'],
            ['sq-AL', 'sq'],
            ['sr-Cyrl-BA', 'sr'],
            ['sr-Cyrl-CS', 'sr'],
            ['sr-Cyrl-ME', 'sr'],
            ['sr-Cyrl-RS', 'sr'],
            ['sr-Latn-BA', 'sr'],
            ['sr-Latn-CS', 'sr'],
            ['sr-Latn-ME', 'sr'],
            ['sr-Latn-RS', 'sr'],
            ['sv-FI', 'sv'],
            ['sv-SE', 'sv'],
            ['sw-KE', 'sw'],
            ['syr-SY', 'syr'],
            ['ta-IN', 'ta'],
            ['te-IN', 'te'],
            ['tg-Cyrl-TJ', 'tg'],
            ['th-TH', 'th'],
            ['tk-TM', 'tk'],
            ['tn-ZA', 'tn'],
            ['tr-TR', 'tr'],
            ['tt-RU', 'tt'],
            ['tzm-Latn-DZ', 'tzm'],
            ['ug-CN', 'ug'],
            ['uk-UA', 'uk'],
            ['ur-PK', 'ur'],
            ['uz-Cyrl-UZ', 'uz'],
            ['uz-Latn-UZ', 'uz'],
            ['vi-VN', 'vi'],
            ['wo-SN', 'wo'],
            ['xh-ZA', 'xh'],
            ['yo-NG', 'yo'],
            ['zh-CN', 'zh'],
            ['zh-HK', 'zh'],
            ['zh-MO', 'zh'],
            ['zh-SG', 'zh'],
            ['zh-TW', 'zh'],
            ['zu-ZA', 'zu'],

            /*
             * Edge cases
             */
            ['EN-gb', 'en'],
        ];
    }

    /**
     * @param string $locale Input locale
     * @param string $language Expected output language
     * @dataProvider dataUnderscoreOrDash
     */
    public function testUnderscoreOrDash(string $locale, string $language): void
    {
        $this->assertEquals($language, Locale::getPrimaryLanguage($locale));
    }

    /**
     * @see testUnderscoreOrDash
     * @return array
     */
    public function dataUnderscoreOrDash(): array
    {
        return [
            ['en-GB', 'en'],
            ['en_GB', 'en'],
        ];
    }
}
