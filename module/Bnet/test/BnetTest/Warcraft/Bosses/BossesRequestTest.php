<?php

namespace BnetTest\Warcraft;

use BnetTest\TestClient;
use Bnet\Warcraft\Bosses\BossRequest;

class BossesRequestTest extends \PHPUnit_Framework_TestCase {

    public function testFind() {
        $request = new BossRequest(new TestClient('wow'));
        $response = $request->find(24723);

        $this->assertInstanceOf('\Bnet\Warcraft\Bosses\BossEntity', $response);
        $this->assertSame(24723, $response->id);
    }

    public function testFindInvalidId() {
        $request = new BossRequest(new TestClient('wow'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }

//
//    public function testAll() {
//        $request = new BossRequest(new TestClient('wow'));
//        $response = $request->all();
//
//        $this->assertInstanceOf('\Bnet\Warcraft\Bosses\BossEntity', $response[0]);
//    }
}
