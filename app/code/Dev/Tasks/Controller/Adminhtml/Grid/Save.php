<?php

namespace Dev\Tasks\Controller\Adminhtml\Grid;

use Dev\Tasks\Model\TasksFactory;
use Dev\Tasks\Validation\check;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Exception;

class Save extends Action
{
    /**
     * @var TasksFactory
     */
    protected $tasksFactory;

    /**
     * @var check
     */
    private $_check;

    /**
     * @param Context      $context
     * @param TasksFactory $tasksFactory
     */
    public function __construct(
        Context $context,
        TasksFactory $tasksFactory,
        check $check
    ) {
        parent::__construct($context);
        $this->tasksFactory = $tasksFactory;
        $this->_check = $check;
    }

    /**
     * Save record action
     *
     * @return Redirect
     */
    public function execute()
    {
        $postObj = $this->getRequest()->getPostValue();
        $name = $postObj["name"];
        $date = date("Y-m-d");

        $userDetail = ["name" => $name, "created_date" => $date];
        $data = array_merge($postObj, $userDetail);

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $model = $this->tasksFactory->create();
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);

            try {
                $this->_check->check_field($name);
                $model->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('tasks/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
