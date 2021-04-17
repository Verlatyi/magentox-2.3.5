<?php

namespace Learn\BigBoats\Model\Colors;

use Learn\BigBoats\Api\Color;
use Learn\BigBoats\Api\Covering;

class White implements Color
{
    protected $covering;

    public function __construct(Covering $covering)
    {
        $this->covering = $covering;
    }

    public function getColor()
    {
        return "White";
    }
}
