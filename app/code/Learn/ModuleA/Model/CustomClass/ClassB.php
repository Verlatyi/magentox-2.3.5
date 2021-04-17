<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 23.03.21
 * Time: 20:47
 */

namespace Learn\ModuleA\Model\CustomClass;

use Learn\ModuleA\Api\BoatInterface;

class ClassB
{
    protected $type;

    public function __construct(BoatInterface $type)
    {
        $this->type = $type;
    }
}
