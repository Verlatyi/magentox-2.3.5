<?php

namespace Learn\ModuleA\Model;

use Learn\ModuleA\Api\BoatInterface;

class Boat implements BoatInterface
{
    public function getBoatType(): string
    {
        return "Boat";
    }
}