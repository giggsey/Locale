<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Build\DataBuilder;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Filesystem\Filesystem;

class DataBuilderTest extends TestCase
{
    protected static $outputDir;

    public static function setUpBeforeClass(): void
    {
        static::$outputDir = self::createTempDirectory();
    }

    public static function tearDownAfterClass(): void
    {
        if (static::$outputDir) {
            $fileSystem = new Filesystem();
            $fileSystem->remove(static::$outputDir);
        }
    }

    public function testGeneratingData(): string
    {
        $dataBuilder = new DataBuilder();

        $outputDir = static::$outputDir;

        $dataBuilder->generate('1', __DIR__ . '/testData/', $outputDir, new NullOutput());

        $listFile = $outputDir . '_list.php';
        $this->assertFileExists($listFile);
        $list = require $listFile;

        $this->assertArrayHasKey('en', $list);
        $this->assertArrayHasKey('en-gb', $list);
        $this->assertArrayNotHasKey('en-150', $list, 'en-150 is part of the ignored locale list, so should be ignored');
        $this->assertArrayNotHasKey('empty', $list, 'empty has no territories defined, so should be ignored');

        $versionFile = $outputDir . '_version.php';
        $this->assertFileExists($versionFile);
        $version = require $versionFile;

        $this->assertSame('1', $version);

        return $outputDir;
    }

    /**
     * @param string $outputDir Output directory
     * @depends testGeneratingData
     */
    public function testEnglishData(string $outputDir): void
    {
        $englishFile = $outputDir . 'en.php';

        $this->assertFileExists($englishFile);

        $data = require $englishFile;

        $this->assertArrayHasKey('MFC', $data);
        $this->assertSame('My First Country', $data['MFC']);

        $this->assertArrayHasKey('MSC', $data);
        $this->assertSame('My Second Country', $data['MSC']);

        $this->assertArrayNotHasKey('EU', $data, 'EU is part of the ignored region list, so should be ignored');
        $this->assertArrayNotHasKey('GB-alt-short', $data, 'GB-alt-short is an alternative name, so should be ignored');
        $this->assertArrayNotHasKey('001', $data, '001 is a numerical territory name, so should be ignored');
        $this->assertArrayNotHasKey('CH', $data, 'CH has the same name as the key, so should be ignored');
    }

    /**
     * @param string $outputDir Output directory
     * @depends testGeneratingData
     */
    public function testGBData(string $outputDir): void
    {
        $englishFile = $outputDir . 'en-gb.php';

        $this->assertFileExists($englishFile);

        $data = require $englishFile;

        $this->assertArrayNotHasKey('MFC', $data);

        $this->assertArrayHasKey('MSC', $data);
        $this->assertSame('My Second Country is different here', $data['MSC']);
    }

    /**
     * Create a temp directory
     * @link http://stackoverflow.com/a/1707859
     */
    private static function createTempDirectory(): string
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'LocaleTest');

        if (file_exists($tempFile)) {
            unlink($tempFile);
        }

        mkdir($tempFile);
        if (is_dir($tempFile)) {
            return $tempFile . DIRECTORY_SEPARATOR;
        }

        throw new \RuntimeException('Unable to create temp directory');
    }
}
