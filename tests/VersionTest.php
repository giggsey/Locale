<?php
/**
 *
 * @author giggsey
 * @package Locale
 */

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;
use PHPUnit\Framework\TestCase;

class VersionTest extends TestCase
{
    public function testGetVersion(): void
    {
        $version = null;

        $currentVersionContents = file(__DIR__ . '/../CLDR-VERSION.txt');

        foreach ($currentVersionContents as $line) {
            if (trim($line) !== '' && strpos($line, '#') !== 0) {
                $version = trim($line);
                break;
            }
        }

        $this->assertNotNull($version);
        $this->assertSame($version, Locale::getVersion());
    }
}
