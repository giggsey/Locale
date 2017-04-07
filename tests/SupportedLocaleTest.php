<?php

namespace Giggsey\Locale\Tests;

use Giggsey\Locale\Locale;

class SupportedLocaleTest extends \PHPUnit_Framework_TestCase
{
    public function testGettingSupportedLocales()
    {
        $list = Locale::getSupportedLocales();

        $this->assertInternalType('array', $list);

        $this->assertContains('en', $list);
        $this->assertContains('zu', $list);
        $this->assertContains('es', $list);
        $this->assertContains('es-mx', $list);
    }
}
