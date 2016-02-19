<?php

namespace BnetTest\Warcraft;

use BnetTest\TestClient;
use Bnet\Warcraft\Zones\ZoneRequest;

class ZonesRequestTest extends \PHPUnit_Framework_TestCase {

    public function testFind() {
        $request = new ZoneRequest(new TestClient('wow'));
        $response = $request->find(4131);

        $this->assertInstanceOf('\Bnet\Warcraft\Zones\ZoneEntity', $response);
        $this->assertSame(4131, $response->id);
    }

    public function testFindInvalidId() {
        $request = new ZoneRequest(new TestClient('wow'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }

//    public function testAll() {
//        $request = new ZoneRequest(new TestClient('wow'));
//        $response = $request->all();
//
//        $this->assertInstanceOf('\Bnet\Warcraft\Zones\ZoneEntity', $response[0]);
//    }
}
