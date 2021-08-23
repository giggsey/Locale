<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;
use PHPUnit\Framework\TestCase;

class SupportedLocaleTest extends TestCase
{
    public function testGettingSupportedLocales()
    {
        $list = Locale::getSupportedLocales();

        $this->assertIsArray($list);

        $this->assertContains('en', $list);
        $this->assertContains('zu', $list);
        $this->assertContains('es', $list);
        $this->assertContains('es-mx', $list);
    }
}
