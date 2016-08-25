<?php

namespace APIRtK\V1\Rest\RosterStat;

class RosterStatResourceFactory {

    public function __invoke($services) {
        return new RosterStatResource($services);
    }

}
