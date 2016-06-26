<?php
/**
 *
 * @author giggsey
 * @package Locale
 */

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;

class VersionTest extends \PHPUnit_Framework_TestCase
{
    public function testGetVersion()
    {
        $version = null;

        $currentVersionContents = file(__DIR__ . '/../CLDR-VERSION.txt');

        foreach ($currentVersionContents as $line) {
            if (trim($line) !== '' && substr($line, 0, 1) !== '#') {
                $version = trim($line);
                break;
            }
        }

        $this->assertNotNull($version);
        $this->assertEquals($version, Locale::getVersion());
    }
}
