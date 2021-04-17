<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20.03.21
 * Time: 0:41
 */

namespace Learn\Database\Controller\Page;

use Learn\Database\Model\LearnDatabaseFactory;
use Learn\Database\Model\ResorceModel\LearnDatabase as LearnDatabaseResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    protected $learnDatabaseFactory;
    protected $resource;

    /**
     * Index constructor.
     * @param Context $context
     * @param LearnDatabaseFactory $learnDatabaseFactory
     * @param LearnDatabaseResourceModel $resource
     */
    public function __construct(
        Context $context,
        LearnDatabaseFactory $learnDatabaseFactory,
        LearnDatabaseResourceModel $resource
    ) {
        $this->learnDatabaseFactory = $learnDatabaseFactory;
        $this->resource = $resource;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);

//        /*read*/
//        $learnDatabase = $this->learnDatabaseFactory->create();
//        $human = $learnDatabase->load(4);
//        echo "<pre>";
//        var_dump($human->getData());
//        echo "<br>";
//
//        /*update*/
//        $human->setAddress('London, No 107');
//        $human->save();
//        var_dump($human->getData());
//
//        /*create*/
//        $learnDatabase->addData(['name'=>'Marina', 'address' => 'London']);
//        $learnDatabase->save();
//
//        /*delete*/
//        $human->delete();
//        echo "<br>";
//
//        /*collection*/
//        $collection = $learnDatabase->getCollection();
//        foreach ($collection as $item) {
//            print_r($item->getData());
//            echo "<br>";
//        }
    }
}
