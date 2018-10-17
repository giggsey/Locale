<?php

namespace Giggsey\Locale\Tests;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Process\Process;

class PhingCompareTest extends \PHPUnit_Framework_TestCase
{
    protected static $outputDir;
    protected static $backupDir;

    public static function setUpBeforeClass()
    {
        static::$outputDir = __DIR__ . '/../data/';
        static::$backupDir = __DIR__ . '/../data-backup/';

        // Copy data directory to somewhere else
        $filesystem = new Filesystem();
        $filesystem->rename(static::$outputDir, static::$backupDir);
    }

    public static function tearDownAfterClass()
    {
        if (static::$outputDir && static::$backupDir) {
            // Copy data directory to somewhere else
            $filesystem = new Filesystem();
            $filesystem->remove(static::$outputDir);
            $filesystem->rename(static::$backupDir, static::$outputDir);
        }
    }

    public function testRunningPhing()
    {
        // Run phing compile
        $process = new Process(__DIR__ . '/../vendor/bin/phing compile');
        $process->setWorkingDirectory(__DIR__ . '/../');
        $process->run();

        // Print this for keepsakes
        echo $process->getOutput();

        $this->assertTrue($process->isSuccessful());
    }

    /**
     * @depends testRunningPhing
     */
    public function testComparingDirectories()
    {
        /*
         * Load all files in both directories, and compare
         */

        $outputFinder = new Finder();
        $outputFinder->files()->in(static::$outputDir)->sortByName();

        $outputFiles = array();
        foreach ($outputFinder as $file) {
            /** @var $file SplFileInfo */
            $outputFiles[] = $file->getFilename();
        }

        $backupFinder = new Finder();
        $backupFinder->files()->in(static::$backupDir)->sortByName();

        $backupFiles = array();
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
