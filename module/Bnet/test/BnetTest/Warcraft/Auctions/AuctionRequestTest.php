<?php
namespace BnetTest\Warcraft;

use BnetTest\TestClient;
use Bnet\Warcraft\Auctions\AuctionRequest;
use Bnet\Warcraft\Auctions\IndexEntity;

class AuctionRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testDownload()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->download(new IndexEntity(['url' => 'auctions']));

        $this->assertInternalType('array', $response);
        $this->assertSame(955294802, $response[0]->auc);
    }

    public function testDownloadInvalidUrl()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->download(new IndexEntity(['url' => 'invalid']));

        $this->assertNull($response);
    }

    public function testIndex()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->index('Auchindoun');

        $this->assertInstanceOf('\Bnet\Warcraft\Auctions\IndexEntity', $response);
        $this->assertSame('http://eu.battle.net/auction-data/55fa8d36ecd391f92848bef9fd085137/auctions.json', $response->url);
    }

    public function testIndexInvalidRealm()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->index('Invalid');

        $this->assertNull($response);
    }
}
