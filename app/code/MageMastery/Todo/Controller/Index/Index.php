<?php

namespace Magemastery\Todo\Controller\Index;

use MageMastery\Todo\Api\TaskManagementInterface;
use MageMastery\Todo\Model\ResourceModel\Task as TaskResource;
use MageMastery\Todo\Model\TaskFactory;
use MageMastery\Todo\Service\TaskRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    private $taskResource;

    private $taskFactory;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    private $searchCriteriaBuilder;

    private $taskManagement;
    /**
     * Index constructor.
     * @param Context $context
     * @param TaskFactory $taskFactory
     * @param TaskResource $taskResource
     */
    public function __construct(
        Context $context,
        TaskFactory $taskFactory,
        TaskResource $taskResource,
        TaskRepository $taskRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        TaskManagementInterface $taskManagment
    ) {
        $this->taskFactory = $taskFactory;
        $this->taskResource = $taskResource;
        $this->taskRepository = $taskRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->taskManagement = $taskManagment;
        parent::__construct($context);
    }

    public function execute()
    {
        /*$task = $this->taskRepository->get(1);
        $task->setData('status', 'complete');

        $this->taskManagement->save($task);*/

        //реализация способом Стаса (не диплекейтет)
        /*                $task= $this->taskFactory->create();

                        $this->taskResource->load($task, 1);*/
        /*var_dump($task = $this->taskRepository->getList($this->searchCriteriaBuilder->create())->getItems());
        return;*/
        /*$task = $this->taskFactory->create();

         $task->setData([
             'label' => 'New Task 22',
             'status' => 'Open',
             'customer_id' => 1
         ]);
         $this->taskResource->save($task);*/

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
