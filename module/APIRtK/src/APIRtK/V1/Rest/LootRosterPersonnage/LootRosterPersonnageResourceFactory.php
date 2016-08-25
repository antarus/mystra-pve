<?php

namespace APIRtK\V1\Rest\LootRosterPersonnage;

class LootRosterPersonnageResourceFactory {

    public function __invoke($services) {
        return new LootRosterPersonnageResource($services);
    }

}
