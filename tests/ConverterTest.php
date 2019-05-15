<?php

use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    public function testCodeToNameForCountry()
    {
        $c = new \Zhangbingliang\CountryCodeConverter\CountryCodeConverter();

        $this->assertSame('United States', $c->getName('US'));
    }

    public function testNameToCodeForCountry()
    {
        $c = new \Zhangbingliang\CountryCodeConverter\CountryCodeConverter();

        $this->assertSame('US', $c->getCode('United States'));
    }

    public function testCodeToNameForState()
    {
        $c = new \Zhangbingliang\CountryCodeConverter\StateCodeConverter();

        $this->assertSame('British Columbia', $c->getName('BC'));
    }

    public function testNameToCodeForState()
    {
        $c = new \Zhangbingliang\CountryCodeConverter\StateCodeConverter();

        $this->assertSame('BC', $c->getCode('British Columbia'));
    }
}