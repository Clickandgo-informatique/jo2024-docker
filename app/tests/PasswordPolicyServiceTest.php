<?php

namespace App\Tests\Service;

use App\Service\PasswordPolicyService;
use PHPUnit\Framework\TestCase;

class PasswordPolicyServiceTest extends TestCase
{
    private PasswordPolicyService $service;

    protected function setUp(): void
    {
        $this->service = new PasswordPolicyService(10, ['123456', 'password','azerty']);
    }

    public function testValidPassword(): void
    {
        $pw = 'Aa1!567890';
        $res = $this->service->evaluate($pw);

        $this->assertTrue($res['lengthOk']);
        $this->assertTrue($res['upperOk']);
        $this->assertTrue($res['digitOk']);
        $this->assertTrue($res['specialOk']);
        $this->assertFalse($res['isCommon']);
        $this->assertEquals(100, $res['scorePercent']);
        $this->assertTrue($this->service->isValid($pw));
    }

    public function testTooShortPassword(): void
    {
        $pw = 'Aa1!567';
        $res = $this->service->evaluate($pw);

        $this->assertFalse($res['lengthOk']);
        $this->assertTrue($res['upperOk']);
        $this->assertTrue($res['digitOk']);
        $this->assertTrue($res['specialOk']);
        $this->assertEquals(75, $res['scorePercent']);
        $this->assertTrue($this->service->isValid($pw) === false);
    }

    public function testCommonPassword(): void
    {
        $pw = '123456';
        $res = $this->service->evaluate($pw);

        $this->assertTrue($res['lengthOk'] === false); // moins de 10
        $this->assertTrue($res['isCommon']);
        $this->assertFalse($this->service->isValid($pw));
    }

    public function testMissingUppercase(): void
    {
        $pw = 'aa1!567890';
        $res = $this->service->evaluate($pw);

        $this->assertFalse($res['upperOk']);
        $this->assertFalse($this->service->isValid($pw));
    }

    public function testMissingDigit(): void
    {
        $pw = 'Aa!abcdefgh';
        $res = $this->service->evaluate($pw);

        $this->assertFalse($res['digitOk']);
        $this->assertFalse($this->service->isValid($pw));
    }

    public function testMissingSpecial(): void
    {
        $pw = 'Aa12345678';
        $res = $this->service->evaluate($pw);

        $this->assertFalse($res['specialOk']);
        $this->assertFalse($this->service->isValid($pw));
    }
}
