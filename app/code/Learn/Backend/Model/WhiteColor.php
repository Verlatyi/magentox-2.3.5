<?php


namespace Learn\Backend\Model;

use Learn\Backend\Api\Brightness;
use Learn\Backend\Api\ColorInterface;

class WhiteColor implements ColorInterface
{
    protected $brightness;

    public function __construct(Brightness $brightness)
    {
        $this->brightness = $brightness;
    }

    public function getColor()
    {
        return "White";
    }
}
