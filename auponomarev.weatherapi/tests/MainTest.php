<?php

namespace Tests;
use PHPUnit\Framework\TestCase;
class MainTest extends TestCase
{
    public function testSay(){
        $this->assertStringContainsString('ok', 'ok');
    }
    
}