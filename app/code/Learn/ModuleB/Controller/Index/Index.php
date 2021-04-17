<?php

namespace Learn\ModuleB\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Learn\ModuleA\Api\BoatInterface;
use Learn\ModuleB\Api\CarInterface;

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
        echo $this->boatInterface->getBoatType();
        echo "<br>";
        echo $this->carInterface->getCarName();
    }
}
