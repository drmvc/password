<?php

namespace DrMVC\Password\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\Password;

class PasswordTest extends TestCase
{

    private $password;
    private $salt;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->password = 'dummy_password';
        $this->salt = '75fef76a02ec8914f83f3d3d30298eef118eb98b';
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
        $hash = $obj->make($this->password, PASSWORD_DEFAULT, ['salt' => $this->salt]);
        $len = \strlen($hash);

        $this->assertEquals(60, $len);
    }

    public function testVerify()
    {
        $obj = new Password();
        $hash = $obj->make($this->password, PASSWORD_DEFAULT, ['salt' => $this->salt]);
        $valid = $obj->verify($this->password, $hash);
        $not_valid = $obj->verify($this->password . 'asd', $hash);

        $this->assertTrue($valid);
        $this->assertFalse($not_valid);
    }

    public function testInfo()
    {
        $obj = new Password();
        $hash = $obj->make($this->password, PASSWORD_DEFAULT, ['salt' => $this->salt]);
        $info = $obj->info($hash);

        $this->assertCount(3, $info);
        $this->assertEquals(1, $info['algo']);
    }

    public function testRehash()
    {
        $obj = new Password();
        $hash = $obj->make($this->password, PASSWORD_DEFAULT, ['salt' => $this->salt]);
        $rehash1 = $obj->rehash($hash, PASSWORD_ARGON2I, ['salt' => $this->salt]);
        $rehash2 = $obj->rehash($hash, PASSWORD_DEFAULT, ['salt' => $this->salt]);

        $this->assertTrue($rehash1);
        $this->assertFalse($rehash2);
    }

}
