<?php

namespace Bnet\Warcraft\Zones;

use Bnet\Core\AbstractRequest;

class ZoneRequest extends AbstractRequest {

    public function find($zoneId) {
        $data = $this->client->get('zone/' . $zoneId);

        if ($data === null) {
            return null;
        }

        return new ZoneEntity($data);
    }

    /**
     * @return array
     */
    public function all() {
        $data = $this->client->get('zone/');
        $aZonez = [];

        foreach ($data['zones'] as $aZone) {
            $aZonez[] = new ZoneEntity($aZone);
        }

        return $aZonez;
    }

}
