<?php

namespace Tests\Unit;

use App\Support\Encrypt\Aes;
use App\Support\Id\idClient;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /**
     * Id生成测试
     * @throws \Exception
     */
    public function testId()
    {
        $id = idClient::getInstance()->id(1, 1, intval(strtotime('2017-05-27')));
        $this->assertEquals($id, 52908628381697);
    }

    public function testAes()
    {
        $mobile = '17135501104';
        $encode = Aes::encryptWithOpenssl($mobile);
        dump("openssl_encrypt加密后：" . $encode);
        $decode = Aes::decryptWithOpenssl($encode);
        dump('解密后：' . $decode);
        $this->assertEquals($decode, $mobile);
    }
}
