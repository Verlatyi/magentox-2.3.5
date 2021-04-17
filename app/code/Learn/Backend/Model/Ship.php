<?php

namespace Learn\Backend\Model;

use Learn\Backend\Api\BoatInterface;
use Learn\Backend\Api\ColorInterface as Color;
use Learn\Backend\Api\TypeInterface as Type;

class Ship implements BoatInterface
{
    protected $color;

    protected $type;

    protected $name;

    protected $command;

    /**
     * Boat constructor.
     * @param Color $color
     * @param Type $type
     * @param null $name
     * @param null $command
     */
    public function __construct(Color $color, Type $type, $name = null, $command = null)
    {

        $this->color = $color;
        $this->type = $type;
        $this->name = $name;
        $this->command = $command;
    }

    /**
     * @return string
     */
    public function getBoatType() : string
    {
        return "Your choose Ship has " . $this->type->getType() . " type!";
    }

    public function getBoatColor(): string
    {
        return "Your choose Ship has " . $this->color->getColor() . " color!";
    }
}
