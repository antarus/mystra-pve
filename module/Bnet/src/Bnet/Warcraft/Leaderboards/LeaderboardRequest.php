<?php
namespace Bnet\Warcraft\Leaderboards;

use Bnet\Core\AbstractRequest;
use Bnet\Utils;

class LeaderboardRequest extends AbstractRequest
{
    public function challengeMode($realm = null)
    {
        if ($realm !== null) {
            $data = $this->client->get('challenge/'.Utils::realmNameToSlug($realm));

            if ($data === null) {
                return null;
            }

            return new ChallengeModeEntity($data);
        }

        $data = $this->client->get('challenge/region');

        return new ChallengeModeEntity($data);
    }

    public function pvp($bracket)
    {
        if (in_array($bracket, ['2v2', '3v3', '5v5', 'rbg']) === false) {
            throw new \RuntimeException('Invalid bracket type');
        }

        $data = $this->client->get('leaderboard/'.$bracket);

        return new BracketEntity($data);
    }
}
