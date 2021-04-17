<?php

namespace Learn\ModuleA\Controller\Index;

use Learn\ModuleB\Api\CarInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Learn\ModuleA\Api\BoatInterface;

class Index extends Action
{
    protected $boatInterface;
    protected $carInterface;
    public function __construct(
        Context $context,
        BoatInterface $boatInterface,
        CarInterface $carInterface
    ) {
        $this->boatInterface = $boatInterface;
        $this->carInterface = $carInterface;
        parent::__construct($context);
    }

    public function execute()
    {
        echo "<pre>";
/*        echo $this->boatInterface->getBoatType();
        echo "<br>";
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $boat = $objectManager->create('Learn\ModuleA\Model\CustomClass\ClassA');
        var_dump($boat);
        echo "<br>";
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $boat2 = $objectManager->create('Learn\ModuleA\Model\CustomClass\ClassB');
        var_dump($boat2);
        echo "<br>";
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $boat3 = $objectManager->create('Learn\ModuleA\Model\CustomClass\ClassC');
        var_dump($boat3);*/
        echo "<br>";
        echo $this->carInterface->getCarName();
    }
}
