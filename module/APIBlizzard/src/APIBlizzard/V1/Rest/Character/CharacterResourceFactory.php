<?php

namespace APIBlizzard\V1\Rest\Character;

class CharacterResourceFactory {

    public function __invoke($services) {
        return new CharacterResource($services);
    }

}
