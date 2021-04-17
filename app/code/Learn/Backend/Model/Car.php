<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 05.03.21
 * Time: 0:51
 */

namespace Learn\Backend\Model;

use Learn\Backend\Api\ColorInterface as Color;
use Learn\Backend\Api\TypeInterface as Type;

class Car
{
    protected $color;

    protected $type;

    public function __construct(Color $color, Type $type)
    {
        $this->color = $color;
        $this->type = $type;
    }


}