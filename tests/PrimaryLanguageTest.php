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
    public function testGetPrimaryLanguage($locale, $language)
    {
        $this->assertEquals($language, Locale::getPrimaryLanguage($locale));
    }

    /**
     * @see testGetPrimaryLanguage
     * @return array
     */
    public function dataListOfPrimaryLanguages()
    {
        return array(
            array('af-ZA', 'af'),
            array('am-ET', 'am'),
            array('ar-AE', 'ar'),
            array('ar-BH', 'ar'),
            array('ar-DZ', 'ar'),
            array('ar-EG', 'ar'),
            array('ar-IQ', 'ar'),
            array('ar-JO', 'ar'),
            array('ar-KW', 'ar'),
            array('ar-LB', 'ar'),
            array('ar-LY', 'ar'),
            array('ar-MA', 'ar'),
            array('arn-CL', 'arn'),
            array('ar-OM', 'ar'),
            array('ar-QA', 'ar'),
            array('ar-SA', 'ar'),
            array('ar-SY', 'ar'),
            array('ar-TN', 'ar'),
            array('ar-YE', 'ar'),
            array('as-IN', 'as'),
            array('az-Cyrl-AZ', 'az'),
            array('az-Latn-AZ', 'az'),
            array('ba-RU', 'ba'),
            array('be-BY', 'be'),
            array('bg-BG', 'bg'),
            array('bn-BD', 'bn'),
            array('bn-IN', 'bn'),
            array('bo-CN', 'bo'),
            array('br-FR', 'br'),
            array('bs-Cyrl-BA', 'bs'),
            array('bs-Latn-BA', 'bs'),
            array('ca-ES', 'ca'),
            array('co-FR', 'co'),
            array('cs-CZ', 'cs'),
            array('cy-GB', 'cy'),
            array('da-DK', 'da'),
            array('de-AT', 'de'),
            array('de-CH', 'de'),
            array('de-DE', 'de'),
            array('de-LI', 'de'),
            array('de-LU', 'de'),
            array('dsb-DE', 'dsb'),
            array('dv-MV', 'dv'),
            array('el-GR', 'el'),
            array('en-029', 'en'),
            array('en-AU', 'en'),
            array('en-BZ', 'en'),
            array('en-CA', 'en'),
            array('en-GB', 'en'),
            array('en-IE', 'en'),
            array('en-IN', 'en'),
            array('en-JM', 'en'),
            array('en-MY', 'en'),
            array('en-NZ', 'en'),
            array('en-PH', 'en'),
            array('en-SG', 'en'),
            array('en-TT', 'en'),
            array('en-US', 'en'),
            array('en-ZA', 'en'),
            array('en-ZW', 'en'),
            array('es-AR', 'es'),
            array('es-BO', 'es'),
            array('es-CL', 'es'),
            array('es-CO', 'es'),
            array('es-CR', 'es'),
            array('es-DO', 'es'),
            array('es-EC', 'es'),
            array('es-ES', 'es'),
            array('es-GT', 'es'),
            array('es-HN', 'es'),
            array('es-MX', 'es'),
            array('es-NI', 'es'),
            array('es-PA', 'es'),
            array('es-PE', 'es'),
            array('es-PR', 'es'),
            array('es-PY', 'es'),
            array('es-SV', 'es'),
            array('es-US', 'es'),
            array('es-UY', 'es'),
            array('es-VE', 'es'),
            array('et-EE', 'et'),
            array('eu-ES', 'eu'),
            array('fa-IR', 'fa'),
            array('fi-FI', 'fi'),
            array('fil-PH', 'fil'),
            array('fo-FO', 'fo'),
            array('fr-BE', 'fr'),
            array('fr-CA', 'fr'),
            array('fr-CH', 'fr'),
            array('fr-FR', 'fr'),
            array('fr-LU', 'fr'),
            array('fr-MC', 'fr'),
            array('fy-NL', 'fy'),
            array('ga-IE', 'ga'),
            array('gd-GB', 'gd'),
            array('gl-ES', 'gl'),
            array('gsw-FR', 'gsw'),
            array('gu-IN', 'gu'),
            array('ha-Latn-NG', 'ha'),
            array('he-IL', 'he'),
            array('hi-IN', 'hi'),
            array('hr-BA', 'hr'),
            array('hr-HR', 'hr'),
            array('hsb-DE', 'hsb'),
            array('hu-HU', 'hu'),
            array('hy-AM', 'hy'),
            array('id-ID', 'id'),
            array('ig-NG', 'ig'),
            array('ii-CN', 'ii'),
            array('is-IS', 'is'),
            array('it-CH', 'it'),
            array('it-IT', 'it'),
            array('iu-Cans-CA', 'iu'),
            array('iu-Latn-CA', 'iu'),
            array('ja-JP', 'ja'),
            array('ka-GE', 'ka'),
            array('kk-KZ', 'kk'),
            array('kl-GL', 'kl'),
            array('km-KH', 'km'),
            array('kn-IN', 'kn'),
            array('kok-IN', 'kok'),
            array('ko-KR', 'ko'),
            array('ky-KG', 'ky'),
            array('lb-LU', 'lb'),
            array('lo-LA', 'lo'),
            array('lt-LT', 'lt'),
            array('lv-LV', 'lv'),
            array('mi-NZ', 'mi'),
            array('mk-MK', 'mk'),
            array('ml-IN', 'ml'),
            array('mn-MN', 'mn'),
            array('mn-Mong-CN', 'mn'),
            array('moh-CA', 'moh'),
            array('mr-IN', 'mr'),
            array('ms-BN', 'ms'),
            array('ms-MY', 'ms'),
            array('mt-MT', 'mt'),
            array('nb-NO', 'nb'),
            array('ne-NP', 'ne'),
            array('nl-BE', 'nl'),
            array('nl-NL', 'nl'),
            array('nn-NO', 'nn'),
            array('nso-ZA', 'nso'),
            array('oc-FR', 'oc'),
            array('or-IN', 'or'),
            array('pa-IN', 'pa'),
            array('pl-PL', 'pl'),
            array('prs-AF', 'prs'),
            array('ps-AF', 'ps'),
            array('pt-BR', 'pt'),
            array('pt-PT', 'pt'),
            array('qut-GT', 'qut'),
            array('quz-BO', 'quz'),
            array('quz-EC', 'quz'),
            array('quz-PE', 'quz'),
            array('rm-CH', 'rm'),
            array('ro-RO', 'ro'),
            array('ru-RU', 'ru'),
            array('rw-RW', 'rw'),
            array('sah-RU', 'sah'),
            array('sa-IN', 'sa'),
            array('se-FI', 'se'),
            array('se-NO', 'se'),
            array('se-SE', 'se'),
            array('si-LK', 'si'),
            array('sk-SK', 'sk'),
            array('sl-SI', 'sl'),
            array('sma-NO', 'sma'),
            array('sma-SE', 'sma'),
            array('smj-NO', 'smj'),
            array('smj-SE', 'smj'),
            array('smn-FI', 'smn'),
            array('sms-FI', 'sms'),
            array('sq-AL', 'sq'),
            array('sr-Cyrl-BA', 'sr'),
            array('sr-Cyrl-CS', 'sr'),
            array('sr-Cyrl-ME', 'sr'),
            array('sr-Cyrl-RS', 'sr'),
            array('sr-Latn-BA', 'sr'),
            array('sr-Latn-CS', 'sr'),
            array('sr-Latn-ME', 'sr'),
            array('sr-Latn-RS', 'sr'),
            array('sv-FI', 'sv'),
            array('sv-SE', 'sv'),
            array('sw-KE', 'sw'),
            array('syr-SY', 'syr'),
            array('ta-IN', 'ta'),
            array('te-IN', 'te'),
            array('tg-Cyrl-TJ', 'tg'),
            array('th-TH', 'th'),
            array('tk-TM', 'tk'),
            array('tn-ZA', 'tn'),
            array('tr-TR', 'tr'),
            array('tt-RU', 'tt'),
            array('tzm-Latn-DZ', 'tzm'),
            array('ug-CN', 'ug'),
            array('uk-UA', 'uk'),
            array('ur-PK', 'ur'),
            array('uz-Cyrl-UZ', 'uz'),
            array('uz-Latn-UZ', 'uz'),
            array('vi-VN', 'vi'),
            array('wo-SN', 'wo'),
            array('xh-ZA', 'xh'),
            array('yo-NG', 'yo'),
            array('zh-CN', 'zh'),
            array('zh-HK', 'zh'),
            array('zh-MO', 'zh'),
            array('zh-SG', 'zh'),
            array('zh-TW', 'zh'),
            array('zu-ZA', 'zu'),

            /*
             * Edge cases
             */
            array('EN-gb', 'en'),
        );
    }

    /**
     * @param string $locale Input locale
     * @param string $language Expected output language
     * @dataProvider dataUnderscoreOrDash
     */
    public function testUnderscoreOrDash($locale, $language)
    {
        $this->assertEquals($language, Locale::getPrimaryLanguage($locale));
    }

    /**
     * @see testUnderscoreOrDash
     * @return array
     */
    public function dataUnderscoreOrDash()
    {
        return array(
            array('en-GB', 'en'),
            array('en_GB', 'en'),
        );
    }
}
