<?php

namespace Learn\Backend\Model;

use Learn\Backend\Api\TypeInterface;

class BasicType implements TypeInterface
{
    public function getType()
    {
        return "Basic";
    }
}
