<?php

namespace APIRtK\V1\Rest\LootRoster;

class LootRosterResourceFactory {

    public function __invoke($services) {
        return new LootRosterResource($services);
    }

}
