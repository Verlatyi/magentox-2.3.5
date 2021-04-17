<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 06.03.21
 * Time: 19:51
 */

namespace Learn\Backend\Model;

use Learn\Backend\Api\Brightness;
use Learn\Backend\Api\ColorInterface;

class Yellow implements ColorInterface
{
    protected $brightness;

    public function __construct(Brightness $brightness)
    {
        $this->brightness = $brightness;
    }

    public function getColor()
    {
        return "Yellow";
    }
}
