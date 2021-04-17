<?php

namespace Learn\BigBoats\Model\Bikes;

use Learn\BigBoats\Api\Color;
use Learn\BigBoats\Api\Type;

class WaterBike
{
    protected $color;
    protected $type;

    public function __construct(Color $color, Type $type)
    {
        $this->color = $color;
        $this->type = $type;
    }
}
