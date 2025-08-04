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

        self::assertNotFalse($currentVersionContents);

        foreach ($currentVersionContents as $line) {
            if (trim($line) !== '' && !str_starts_with($line, '#')) {
                $version = trim($line);
                break;
            }
        }

        self::assertNotNull($version);
        self::assertSame($version, Locale::getVersion());
    }
}
