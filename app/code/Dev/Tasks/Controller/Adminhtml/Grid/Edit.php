<?php

namespace Dev\Tasks\Controller\Adminhtml\Grid;

use Dev\Tasks\Model\TasksFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;

/**
 * Edit form controller
 */
class Edit extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Dev_Tasks::view';

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Backend\Model\Session
     */
    protected $dataTitle;

    /**
     * @var TasksFactory
     */
    protected $tasksFactory;

    /**
     * @param Context      $context
     * @param Registry    $registry
     * @param TasksFactory $tasksFactory
     */
    public function __construct(
        Context $context,
        Registry $registry,
        \Magento\Backend\Model\Session $dataTitle,
        TasksFactory  $tasksFactory
    ) {
        $this->_coreRegistry = $registry;
        $this->dataTitle = $dataTitle;
        $this->tasksFactory = $tasksFactory;
        parent::__construct($context);
    }

    /**
     * @return Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->tasksFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This task record no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->dataTitle->getFormData(true);

        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('dev_tasks_form', $model);

        $resultPage = $this->_initAction();

        return $resultPage;
    }

    /**
     * @return $this
     */
    protected function _initAction()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('DEV_Tasks::grid');
        return $resultPage;
    }


}
