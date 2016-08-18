<?php

namespace APIRtK\V1\Rest\Roster;

class RosterResourceFactory {

    public function __invoke($services) {
        return new RosterResource($services);
    }

}
