<?php

namespace Tests\Unit;

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
}
