<?php

namespace Learn\TaskModule\Controller\Index;

use Learn\TaskModule\Model\ResourceModel\Task as TaskResource;
use Learn\TaskModule\Model\ResourceModel\Task\CollectionFactory;
use Learn\TaskModule\Model\Task;
use Learn\TaskModule\Model\TaskFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\DataObject;

class Index extends Action
{
    private $taskResource;

    private $taskFactory;

    private $taskCollectionFactory;

    public function __construct(Context $context, TaskFactory $taskFactory, TaskResource $taskResource, CollectionFactory $taskCollectionFactory)
    {
        $this->taskFactory = $taskFactory;
        $this->taskResource = $taskResource;
        $this->taskCollectionFactory = $taskCollectionFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        $task = $this->taskFactory->create();
        $taskCollectionArr = $this->taskCollectionFactory->create();
        $collection = $task->getCollection();
        echo "коллекция исходная с бд <pre>";
        print_r($collection->getData());

//        $task->addData([
//            'name' => 'Task - 0003',
//            'id'=> 1
//        ]);

//        $task->setData(['name' => 'task']);

//        $this->taskResource->save($task);
//        echo  "коллекция с новым такском </br>";
//        print_r($taskCollectionArr->getData());

//        echo "передаваемый новый таск в коллекцию </br>";
//        print_r($task->getData());
//        echo "Загружен 1 элемент с бд </br>";

        //...collection
        echo "addFieldToSelect </br>";
        $collection = $task->getCollection()
            ->addFieldToSelect('description');
        print_r($collection->getData());

        echo "addFieldToFilter </br>";
        $collection = $task->getCollection()
            ->addFieldToSelect('name')
            ->addFieldToSelect('description')
            ->addFieldToFilter('name', ['eq'=>'Task 2']);
        print_r($collection->getData());
        echo "addFieldToFilter 2 </br>";
        $collection = $task->getCollection()
            ->addFieldToSelect('name')
            ->addFieldToSelect('description')
            ->addFieldToFilter('name', ['eq'=>'New task']);
        print_r($collection->getData());

        $task->load(1);
        var_dump($task->getData());

        $task->addData(['name' => 'Victor', 'description' => '...']); //работает по загруженному таску из бд
        $task->setData(['name' => 'roman11', 'description' => '...']); //отработает в конец коллекции с созданием
        // нового индекса, если указать id явно то работать будет
        $this->taskResource->save($task);
        $task->setDescription('hard task 123');
        $this->taskResource->save($task);
        //$task->save();
        var_dump($task->getData());
//        echo "add and set </br>";
//        $task->setData('name', 'hard task 1');
//        $this->taskResource->save($task);
//        print_r($taskCollectionArr->getData());
//        echo "add and set 2 </br>";
//        $task->addData(['name' => 'hard task 4']);
//        $this->taskResource->save($task);
//        print_r($taskCollectionArr->getData());

        //var_export($task->getData());
        $dataObject = new DataObject();

        $dataObject->setTitle('dataObject1');
        $dataObject->setSubtitle('childData');
        //$dataObject->setData(['type' => 'first', 'type2' => 'second']);
        print_r($dataObject->getData());
        //$task = $this->taskFactory->create();

        /*$task->setData([
            'name' => 'New task'
        ]);*/
        /*$this->taskResource->save($task);
        $this->taskResource->load($task, 2);
        var_export($task->getData());*/
        exit();
    }
}
