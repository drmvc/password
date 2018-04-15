<?php

namespace DrMVC\Password\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Password;

class PasswordTest extends TestCase
{

    private $password;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->password = 'dummy_password';
    }

    public function test__construct()
    {
        try {
            $obj = new Password();
            $this->assertInternalType('object', $obj);
            $this->assertInstanceOf(Password::class, $obj);
        } catch (\Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }
    }

    public function testMake()
    {
        $obj = new Password();
        $hash = $obj->make($this->password, PASSWORD_DEFAULT);
        $len = \strlen($hash);

        $this->assertEquals(60, $len);
    }

    public function testVerify()
    {
        $obj = new Password();
        $hash = $obj->make($this->password, PASSWORD_DEFAULT);
        $valid = $obj->verify($this->password, $hash);
        $not_valid = $obj->verify($this->password . 'asd', $hash);

        $this->assertTrue($valid);
        $this->assertFalse($not_valid);
    }

    public function testInfo()
    {
        $obj = new Password();
        $hash = $obj->make($this->password, PASSWORD_DEFAULT);
        $info = $obj->info($hash);

        $this->assertCount(3, $info);
        $this->assertEquals(1, $info['algo']);
    }

    public function testRehash()
    {
        $obj = new Password();
        $hash = $obj->make($this->password, PASSWORD_DEFAULT);
        $rehash = $obj->rehash($hash, PASSWORD_DEFAULT);

        $this->assertFalse($rehash);
    }

}
