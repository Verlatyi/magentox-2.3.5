<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 15.03.21
 * Time: 23:08
 */

namespace Learn\BigBoats\Controller\Index;

use Learn\BigBoats\Api\BoatInterface;
use Learn\BigBoats\Model\Boats\BoatFactory;
use Learn\BigBoats\Model\Proxy\HardService\Proxy;
use Learn\BigBoats\Model\Proxy\Service as ProxyService;
use Learn\Interactive\Model\ColorFactory;
use Learn\Interactive\Model\ResourceModel\Color as ResourceColor;
use Learn\Interactive\Model\ResourceModel\Color\CollectionFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Event\ManagerInterface;

class Index extends Action
{
    protected $boatInterface;
    protected $boatFactory;
    protected $colorFactory;
    protected $collectionFactory;
    protected $productFactory;
    protected $resource;
    protected $_eventManager;
    protected $http;
    protected $proxyService;
    protected $hardService;

    /**
     * Index constructor.
     * @param Context $context
     * @param BoatInterface $boatInterface
     * @param BoatFactory $boatFactory
     * @param ColorFactory $colorFactory
     * @param CollectionFactory $collectionFactory
     * @param ResourceColor $resource
     * @param ProductFactory $productFactory
     * @param ManagerInterface $_eventManager
     * @param Http $http
     * @param ProxyService $proxyService
     * @param Proxy $hardService
     */
    public function __construct(
        Context $context,
        BoatInterface $boatInterface,
        BoatFactory $boatFactory,
        ColorFactory $colorFactory,
        CollectionFactory $collectionFactory,
        ResourceColor $resource,
        ProductFactory $productFactory,
        ManagerInterface $_eventManager,
        Http $http,
        ProxyService $proxyService,
        Proxy $hardService
    ) {
        $this->boatInterface = $boatInterface;
        $this->boatFactory = $boatFactory;
        $this->colorFactory = $colorFactory;
        $this->collectionFactory = $collectionFactory;
        $this->resource = $resource;
        $this->productFactory = $productFactory;
        $this->_eventManager = $_eventManager;
        $this->http = $http;
        $this->proxyService = $proxyService;
        $this->hardService = $hardService;

        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function execute()
    {
        /*MODULE A*/
        /*ship and boat*/
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $boat = $objectManager->create('Learn\BigBoats\Model\Boats\Boat');
        echo "<pre>";
        var_dump($boat);
        echo $this->boatInterface->getBoatType();
        echo "<br>";
        echo $this->boatInterface->getBoatColor();
        /*Boat*/
        echo "<br>";
        echo $this->boatInterface->getBoatType();
        echo "</br>";
        echo $this->boatInterface->getBoatColor();
        echo "</br>";

        /*Instance object after change default values in di for boat class*/
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $boat = $objectManager->create('Learn\BigBoats\Model\Boats\Boat');
        echo "<pre>";
        var_dump($boat); //show dependency after change

        /*Instance object after change default values with argument types in di for instructor class*/
        echo "</br>";
        $objectManagerInstructor = \Magento\Framework\App\ObjectManager::getInstance();
        $instructor = $objectManagerInstructor->create('Learn\BigBoats\Model\Instructors\Instructor');
        echo "<pre>";
        var_dump($instructor); //show dependency in this object

        /*Instance object after using covering for colors on example boat*/
        echo "</br>";
        $objectManagerBoat = \Magento\Framework\App\ObjectManager::getInstance();
        $boat = $objectManagerBoat->create('Learn\BigBoats\Model\Boats\Boat');
        echo "<pre>";
        var_dump($boat); //show dependency in this object
        echo "</br>";

        /*Boat Factory*/
        $boat = $this->boatFactory->create(["name"=>"ZEVS", "vin"=>"YJ8589647236K8"]);
        var_dump($boat);
        echo "</br>";
        /* Color Factory*/
        $color = $this->colorFactory->create()->load(289);
        $color->setColor('ue');
        $color->setData(['color_id' => 291, 'color' => 'red']);
        $this->resource->save($color);
        $color->getColor();
        echo "</br>";
        /*Color Collection Factory */
        $collection = $this->collectionFactory->create();
        echo "Total count : " . $collection->getTotalCount();

        /*Magento catalog product.*/
        echo "</br>";
        $product = $this->productFactory->create()->load(1);
        $product->setName("samsung");
        echo $product->getName();
        echo "</br>";
        echo $product->getIdBySku("VC-HANDHELD-DC-1-5-L");

        /*Custom Event*/
        echo "</br>";
        $message = new \Magento\Framework\DataObject(["say"=>"Hello Magento"]);
        $this->_eventManager->dispatch('custom_say_event', ['say' => $message]);
        echo $message->getSay();
        echo "</br>";

        /*ChangeDisplayText*/
        /*$textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza'));
        $this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();*/


        /*Proxy, instant object after set ID*/
        $id = $this->http->getParam('id', 0);
        if ($id == 1) {
            $this->proxyService->showServiceMessage();
        } else {
            echo "</br>" . "Proxy Service is not used";
        }
        /*Proxy in controller without di*/
        if ($id == 1) {
            $this->hardService->showServiceMessage();
        } else {
            echo "</br>" . "Proxy Hard Service is not use d";
        }
    }
}
