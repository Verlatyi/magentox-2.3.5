<?php

namespace Learn\Backend\Model;

use Learn\Backend\Api\TypeInterface;

class FamilyType implements TypeInterface
{
    public function getType()
    {
        return "Family Type";
    }
}
