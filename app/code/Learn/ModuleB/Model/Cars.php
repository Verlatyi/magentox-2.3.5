<?php


namespace Learn\ModuleB\Model;


use Learn\ModuleB\Api\CarInterface;

class Cars implements CarInterface
{
    public function getCarName()
    {
        return "some car";
    }
}
