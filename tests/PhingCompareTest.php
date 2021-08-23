<?php

namespace Giggsey\Locale\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Process\Process;

class PhingCompareTest extends TestCase
{
    protected static $outputDir;
    protected static $backupDir;

    public static function setUpBeforeClass(): void
    {
        static::$outputDir = __DIR__ . '/../data/';
        static::$backupDir = __DIR__ . '/../data-backup/';

        // Copy data directory to somewhere else
        $filesystem = new Filesystem();
        $filesystem->rename(static::$outputDir, static::$backupDir);
    }

    public static function tearDownAfterClass(): void
    {
        if (static::$outputDir && static::$backupDir) {
            // Copy data directory to somewhere else
            $filesystem = new Filesystem();
            $filesystem->remove(static::$outputDir);
            $filesystem->rename(static::$backupDir, static::$outputDir);
        }
    }

    public function testRunningPhing(): void
    {
        // Run phing compile
        $process = new Process([__DIR__ . '/../vendor/bin/phing', 'compile']);
        $process->setWorkingDirectory(__DIR__ . '/../');
        $process->run();

        // Print this for keepsakes
        echo PHP_EOL;
        echo $process->getOutput();
        echo PHP_EOL;
        echo $process->getErrorOutput();
        echo PHP_EOL;


        $this->assertTrue($process->isSuccessful());
    }

    /**
     * @depends testRunningPhing
     */
    public function testComparingDirectories(): void
    {
        /*
         * Load all files in both directories, and compare
         */

        $outputFinder = new Finder();
        $outputFinder->files()->in(static::$outputDir)->sortByName();

        $outputFiles = [];
        foreach ($outputFinder as $file) {
            /** @var $file SplFileInfo */
            $outputFiles[] = $file->getFilename();
        }

        $backupFinder = new Finder();
        $backupFinder->files()->in(static::$backupDir)->sortByName();

        $backupFiles = [];
        foreach ($backupFinder as $file) {
            /** @var $file SplFileInfo */
            $backupFiles[] = $file->getFilename();
        }

        $this->assertEquals($outputFiles, $backupFiles, "File names should match exactly");

        foreach ($backupFinder as $file) {
            /** @var $file SplFileInfo */
            $this->assertFileExists(static::$outputDir . $file->getFilename());

            $this->assertEquals(
                md5_file($file->getRealPath()),
                md5_file(static::$outputDir . '/' . $file->getFilename()),
                $file->getFilename() . ' md5 should match'
            );
        }
    }
}
