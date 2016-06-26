<?php

namespace Giggsey\Locale;

class Locale
{
    protected static $dataDir = '../data/';

    /**
     * Gets the primary language for the input locale.
     *
     * @param string $locale Input locale (e.g. en-GB)
     *
     * @return string Primary Language (e.g. en)
     */
    public static function getPrimaryLanguage($locale)
    {
        $parts = explode('_', $locale);

        return $parts[0];
    }

    /**
     * Get the region for the input locale.
     *
     * @param string $locale Input locale (e.g. de-CH-1991)
     *
     * @return string Region (e.g. CH)
     */
    public static function getRegion($locale)
    {
        $parts = explode('_', $locale);

        if (count($parts) === 1) {
            return '';
        }

        $region = end($parts);

        if (strlen($region) === 4) {
            return '';
        }

        if ($region === 'POSIX') {
            $region = 'US';
        }

        return $region;
    }

    public static function getDisplayRegion($locale, $in_locale)
    {
        $dataDir = __DIR__.DIRECTORY_SEPARATOR.static::$dataDir;

        // Convert $locale into a region
        $region = static::getRegion($locale);

        $regionList = require $dataDir.'_list.php';

        /*
         * Loop through each part of the $in_locale, and see if we have data for that locale
         *
         * E.g zh-Hans-HK will look for zh-Hanks-HK, zh-Hanks, then finally zh
         */
        $fallbackParts = explode('-', str_replace('_', '-', $in_locale));
        $fileToSearch = null;

        $i = count($fallbackParts);
        while ($i > 0) {
            $searchLocale = implode('-', $fallbackParts);

            if (isset($regionList[$searchLocale])) {
                $fileToSearch = $searchLocale;
                break;
            }

            array_pop($fallbackParts);
            $i--;
        }

        /*
         * Load data file, and load the region (if it exists) from it
         */

        if ($fileToSearch !== null) {
            // Load data file

            $data = require $dataDir.$fileToSearch.'.php';

            if (isset($data[$region])) {
                return $data[$region];
            }
        }

        return '';
    }
}
