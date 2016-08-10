<?php

namespace APIRtK\V1\Rest\Loot;

class LootResourceFactory {

    public function __invoke($services) {
        return new LootResource($services);
    }

}
