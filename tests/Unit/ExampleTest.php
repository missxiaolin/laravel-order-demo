<?php

namespace Tests\Unit;

use App\Exceptions\CodeException;
use App\Support\Encrypt\Aes;
use App\Support\Enums\ErrorCode;
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
        $this->assertEquals(14, strlen($id));
    }

    /**
     * Id生成最大测试
     * @throws \Exception
     */
    public function testMax()
    {
        $id = idClient::getInstance()->id(1, 1, intval(strtotime('9999-01-01')));
        $this->assertEquals('1056492899794948097', $id);
        $this->assertEquals(19, strlen($id));
    }

    /**
     * @throws \Exception
     */
    public function testUserId()
    {
        $id = get_order_id(1024);
        $this->assertEquals(14, strlen($id));
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

    /**
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function testError()
    {
        $this->assertEquals(400, ErrorCode::$ENUM_SYSTEM_ERROR);
        $this->assertEquals('系统错误', ErrorCode::getMessage(ErrorCode::$ENUM_SYSTEM_ERROR));
    }
}
