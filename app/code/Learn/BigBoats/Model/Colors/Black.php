<?php

namespace Learn\BigBoats\Model\Colors;

use Learn\BigBoats\Api\Covering;
use Learn\BigBoats\Api\Color;

class Black implements Color
{
    protected $covering;

    public function __construct(Covering $covering)
    {
        $this->covering = $covering;
    }

    public function getColor()
    {
        return "Black";
    }
}
