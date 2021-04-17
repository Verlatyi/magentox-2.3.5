<?php

namespace Learn\Backend\Controller\Index;

use Learn\Backend\Api\BoatInterface;
use Learn\Backend\Model\BoatFactory;
use Learn\Backend\Model\HeavyService;
use Learn\Interactive\Api\ColorRepositoryInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Event\ManagerInterface;

class Index extends Action
{
    protected $boatInterface;
    protected $productRepository;
    protected $boatFactory;
    protected $productFactory;
    protected $_eventManager;
    protected $http;
    protected $heavyService;
    protected $colorRepository;

    public function __construct(
        Http $http,
        ManagerInterface $_eventManager,
        Context $context,
        ProductFactory $productFactory,
        BoatInterface $boatInterface,
        BoatFactory $boatFactory,
        ProductRepositoryInterface $productRepository,
        HeavyService $heavyService,
        ColorRepositoryInterface $colorRepository
    ) {
        $this->colorRepository = $colorRepository;
        $this->heavyService = $heavyService;
        $this->http = $http;
        $this->_eventManager = $_eventManager;
        $this->productFactory = $productFactory;
        $this->boatFactory = $boatFactory;
        $this->productRepository = $productRepository;
        $this->boatInterface = $boatInterface;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        /*        echo $this->boatInterface->getBoatType();
                echo $this->boatInterface->getBoatColor();*/
        //echo get_class($this->productRepository);

        /*        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                $boat = $objectManager->create('Learn\Backend\Model\Boat');

                echo "<pre>";
                var_dump($boat);

                $book = $objectManager->create('Learn\Backend\Model\Car');
                var_dump($book);*/

        /*   $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
           $car = $objectManager->create('Learn\Backend\Model\Car');
           echo "<pre>";
           var_dump($car);*/
        /*echo "<pre>";
        $boat = $this->boatFactory->create(["name" => "Katya", "command" => "sea wolfaddg"]);
        var_dump($boat);*/

//        $product = $this->productFactory->create()->load(1);
//        $product->setName("Iphone 6s");
//        $productName = $product->getIdBySku("S-UE55-7100-UA");
//        //echo $productName;
//        echo "Main function" . "</br>";
//
//        echo "<pre>";
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $boat = $objectManager->create('Learn\Backend\Model\Boat'); //создание обьекта через диспетчер обьектов M2
//                                    //под капотом создается для нас экземпляр Learn\Backend\Model\Boat
//        var_dump($boat);

//        $message = new \Magento\Framework\DataObject(["greeting"=>"Good afternoon"]);
//        $this->_eventManager->dispatch('custom_event', ['greeting'=>$message]);
//        echo "<h1>" . $message->getGreeting() . "</h1>" . "</br>";

        $id = $this->http->getParam('id', 0);
        if ($id == 1) {
            $this->heavyService->printHeavyServiceMessage();
        } else {
            echo "Heavy Service not used";
        }

        /*MODULE B*/

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $ship = $objectManager->create('Learn\Backend\Model\Ship');

        echo "<pre>";
        var_dump($ship);
    }
}
