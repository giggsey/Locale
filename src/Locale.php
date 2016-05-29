<?php

namespace Giggsey\Locale;


class Locale
{
    /**
     * Gets the primary language for the input locale
     *
     * @param string $locale Input locale (e.g. en-GB)
     * @return string Primary Language (e.g. en)
     */
    public static function getPrimaryLanguage($locale)
    {
        $parts = explode('_', $locale);

        return $parts[0];
    }

    /**
     * Get the region for the input locale
     *
     * @param string $locale Input locale (e.g. de-CH-1991)
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
}
