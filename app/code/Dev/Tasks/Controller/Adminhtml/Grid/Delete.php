<?php

namespace Dev\Tasks\Controller\Adminhtml\Grid;

use Dev\Tasks\Model\TasksFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;

class Delete extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Dev_Tasks::view';
    /**
     *
     * @var TasksFactory
     */
    protected $tasksFactory;

    /**
     * @param Context      $context
     * @param TasksFactory $tasksFactory
     */
    public function __construct(
        Context $context,
        TasksFactory $tasksFactory
    ) {
        parent::__construct($context);
        $this->tasksFactory = $tasksFactory;
    }

    /**
     * @return Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->tasksFactory->create();
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The task has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/index', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a task to delete.'));
        return $resultRedirect->setPath('*/*/');
    }

}
