<?php
namespace API\V1\Rest\Hello;

class HelloResourceFactory
{
    public function __invoke($services)
    {
        return new HelloResource();
    }
}
