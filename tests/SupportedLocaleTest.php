<?php

declare(strict_types=1);

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;
use PHPUnit\Framework\TestCase;

class SupportedLocaleTest extends TestCase
{
    public function testGettingSupportedLocales(): void
    {
        $list = Locale::getSupportedLocales();

        self::assertIsArray($list);

        self::assertContains('en', $list);
        self::assertContains('zu', $list);
        self::assertContains('es', $list);
        self::assertContains('es-mx', $list);
    }
}
