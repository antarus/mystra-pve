<?php

namespace Bnet\Warcraft\Bosses;

use Bnet\Core\AbstractRequest;

class BossRequest extends AbstractRequest {

    public function find($iBossId) {
        $data = $this->client->get('boss/' . $iBossId);

        if ($data === null) {
            return null;
        }

        return new BossEntity($data);
    }

    /**
     * @return array
     */
    public function all() {
        $data = $this->client->get('boss/');
        $aZonez = [];

        foreach ($data['bosses'] as $aZone) {
            $aZonez[] = new BossEntity($aZone);
        }

        return $aZonez;
    }

}
