<?php

namespace Learn\Backend\Model;

use Learn\Backend\Api\TypeInterface;

class SportType implements TypeInterface
{
    public function getType()
    {
        return "Sport Type";
    }
}
