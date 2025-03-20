<?php

declare(strict_types=1);

/**
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
            if (trim($line) !== '' && !str_starts_with($line, '#')) {
                $version = trim($line);
                break;
            }
        }

        $this->assertNotNull($version);
        $this->assertSame($version, Locale::getVersion());
    }
}
