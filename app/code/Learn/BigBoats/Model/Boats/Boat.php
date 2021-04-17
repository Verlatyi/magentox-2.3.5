<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 15.03.21
 * Time: 23:17
 */

namespace Learn\BigBoats\Model\Boats;

use Learn\BigBoats\Api\BoatInterface;
use Learn\BigBoats\Api\Color;
use Learn\BigBoats\Api\Type;

class Boat implements BoatInterface
{
    protected $color;
    protected $type;
    protected $name;
    protected $vin;

    public function __construct(Color $color, Type $type, $name = null, $vin = null)
    {
        $this->color = $color;
        $this->type = $type;
        $this->name = $name;
        $this->vin = $vin;
    }

    public function getBoatType(): string
    {
        return $this->type->getType();
    }

    public function getBoatColor(): string
    {
        return $this->color->getColor();
    }
}
