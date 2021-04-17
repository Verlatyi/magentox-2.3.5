<?php


namespace Learn\ModuleA\Model;


class CarsModuleA implements \Learn\ModuleB\Api\CarInterface
{

    public function getCarName()
    {
        return "Cars from Module A";
    }
}
