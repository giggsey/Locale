<?php

namespace Giggsey\Locale\Build;

use InvalidArgumentException;
use RuntimeException;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

class DataBuilder
{
    protected const GENERATION_HEADER = <<<EOT
        /**
         * Locale @generated from CLDR version {{ version }}
         * See README.md for more information.
         *
         * @internal
         *
         * Do not modify or use this file directly!
         */


        EOT;

    /**
     * Ignore these locales
     * @var array
     */
    private $ignoredLocales = [
        'en-US-POSIX',
        'en-001',
        'en-150',
        'es-419',
    ];

    /**
     * Ignore these regions
     * @var array
     */
    private $ignoredRegions = [
        'ZZ', // Unknown region
        'QO', // Outlying Ocean Region
        'EU', // European Union
        'AN', // Antilles (no longer exists)
        'BV', // Bouvet Island (Uninhabited)
        'HM', // Heard & McDonald Islands (Uninhabited)
        'CP', // Clipperton Island (uninhabited)
        'EZ', // Eurozone
        'UN', // United Nations
        'XA', // Pseudo-Accents
        'XB', // Pseudo-Bidi
    ];

    /**
     * @param string $version Version of the CLDR data
     * @param string $inputDir Input directory to load CLDR data from
     * @param string $outputDir Output directory to write data
     */
    public function generate(string $version, string $inputDir, string $outputDir, OutputInterface $output): void
    {
        // Check Directories exist
        $this->checkDirectories($inputDir, $outputDir);

        // Load Locales from source directory
        $localeList = $this->loadLocales($inputDir);

        // Load list of Territories
        $countries = $this->loadTerritories($inputDir, $localeList);

        $progress = new ProgressBar($output, count($countries));

        // Write each file
        $writtenCountries = [];

        foreach ($countries as $locale => $countryData) {
            /*
             * Compress file (if possible)
             *
             *  - Split up the locale into the sections
             *  - Loop through each row in $countryData
             *  - If the record exists, and is the same as a higher level, remove from this level
             */

            $fallbackParts = explode('-', str_replace('_', '-', $locale));
            if (count($fallbackParts) > 1) {
                array_pop($fallbackParts);

                $newLocale = implode('-', $fallbackParts);

                if (array_key_exists($newLocale, $countries)) {
                    foreach ($countryData as $key => $value) {
                        if (array_key_exists($key, $countries[$newLocale]) && $countries[$newLocale][$key] === $value) {
                            unset($countryData[$key]);
                        }
                    }
                }
            }

            if (count($countryData) === 0) {
                // Skip empty countries
                continue;
            }

            $this->writeTerritoryFile($outputDir, $version, $locale, $countryData);

            $writtenCountries[strtolower($locale)] = '';

            $progress->advance();
        }

        ksort($writtenCountries);

        $this->writeMappingFile($outputDir, $version, $writtenCountries);

        $this->writeVersionFile($outputDir, $version);

        $progress->finish();
    }

    /**
     * Check and create directories
     *
     * @codeCoverageIgnore
     */
    private function checkDirectories(string $inputDir, string $outputDir): void
    {
        if (!is_dir($inputDir)) {
            throw new InvalidArgumentException(sprintf('Unable to find input directory: %s', $inputDir));
        }

        // Try to create output directory
        if (!is_dir($outputDir) && !mkdir($outputDir) && !is_dir($outputDir)) {
            throw new RuntimeException(sprintf('Unable to create output directory: %s', $outputDir));
        }
    }

    /**
     * Load Locale list from the source data
     *
     * @param string $inputDir Input Directory
     * @return array List of Locales
     */
    private function loadLocales(string $inputDir): array
    {
        $localeList = [];

        foreach (scandir($inputDir) as $item) {
            if (strpos($item, '.') !== 0 && is_dir($inputDir . $item)) {
                if (in_array($item, $this->ignoredLocales, true)) {
                    // Skip over any ignored locales
                    continue;
                }

                $localeList[] = $item;
            }
        }

        return $localeList;
    }

    /**
     *
     */
    protected function loadTerritories(string $inputDir, array $localeList): array
    {
        $countries = [];

        foreach ($localeList as $locale) {
            $path = $inputDir . $locale . '/territories.json';

            if (!file_exists($path)) {
                // Skip this locale
                continue;
            }

            $data = json_decode(file_get_contents($path), true);
            $territoryList = $data['main'][$locale]['localeDisplayNames']['territories'];

            $countries[$locale] = [];

            foreach ($territoryList as $territory => $name) {
                if (is_numeric($territory)) {
                    // Ignore numeric values (continents, and other special regions)
                    continue;
                }

                if (stripos($territory, '-alt-') !== false) {
                    // Ignore alternative names
                    continue;
                }

                if (in_array($territory, $this->ignoredRegions, true)) {
                    // Ignore certain regions
                    continue;
                }

                if ($territory === $name) {
                    // Ignore the data if it's the same as the territory name
                    continue;
                }

                $countries[$locale][$territory] = $name;
            }
        }

        return $countries;
    }

    /**
     * @param string $version CLDR Version
     */
    private function writeTerritoryFile(string $outputDir, string $version, string $locale, array $data): void
    {
        $phpSource = '<?php'
            . PHP_EOL
            . $this->generateFileHeader($version)
            . 'return ' . var_export($data, true) . ';'
            . PHP_EOL;

        file_put_contents($outputDir . strtolower($locale) . '.php', $phpSource);
    }

    private function writeMappingFile(string $outputDir, string $version, array $countryList): void
    {
        $phpSource = '<?php'
            . PHP_EOL
            . $this->generateFileHeader($version)
            . 'return ' . var_export($countryList, true) . ';'
            . PHP_EOL;

        file_put_contents($outputDir . '_list.php', $phpSource);
    }

    private function writeVersionFile(string $outputDir, string $version): void
    {
        $phpSource = '<?php'
            . PHP_EOL
            . $this->generateFileHeader($version)
            . 'return ' . var_export($version, true) . ';'
            . PHP_EOL;

        file_put_contents($outputDir . '_version.php', $phpSource);
    }

    private function generateFileHeader($version): string
    {
        return str_replace('{{ version }}', $version, static::GENERATION_HEADER);
    }
}
