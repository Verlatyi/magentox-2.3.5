<?php

namespace Learn\ModuleB\Model;

use Learn\ModuleA\Api\BoatInterface;

class Ship implements BoatInterface
{
    public function getBoatType()
    {
        return "Ship";
    }
}