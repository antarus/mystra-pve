<?php
namespace BnetTest\Warcraft;

use BnetTest\TestClient;
use Bnet\Warcraft\BattlePets\BattlePetRequest;

class BattlePetRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testAbility()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->ability(640);

        $this->assertInstanceOf('\Bnet\Warcraft\BattlePets\AbilityEntity', $response);
        $this->assertSame(640, $response->id);
    }

    public function testAbilityInvalidId()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->ability('invalid');

        $this->assertNull($response);
    }

    public function testSpecies()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->species(258);

        $this->assertInstanceOf('\Bnet\Warcraft\BattlePets\SpeciesEntity', $response);
        $this->assertSame(258, $response->speciesId);
    }

    public function testSpeciesInvalidId()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->species('invalid');

        $this->assertNull($response);
    }

    public function testStats()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->stats(258);

        $this->assertInstanceOf('\Bnet\Warcraft\BattlePets\StatsEntity', $response);
        $this->assertSame(258, $response->speciesId);
        $this->assertSame(1, $response->level);
        $this->assertSame(3, $response->breedId);
        $this->assertSame(1, $response->petQualityId);
    }

    public function testStatsInvalidId()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->stats('invalid');

        $this->assertNull($response);
    }

    public function testStatsNotDefault()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->stats(258, 25, 5, 4);

        $this->assertInstanceOf('\Bnet\Warcraft\BattlePets\StatsEntity', $response);
        $this->assertSame(258, $response->speciesId);
        $this->assertSame(25, $response->level);
        $this->assertSame(5, $response->breedId);
        $this->assertSame(4, $response->petQualityId);
    }

    public function testType()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->types();

        $this->assertInstanceOf('\Bnet\Warcraft\BattlePets\TypeEntity', $response[0]);
    }
}
