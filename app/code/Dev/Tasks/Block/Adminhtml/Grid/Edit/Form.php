<?php


namespace Dev\Tasks\Block\Adminhtml\Grid\Edit;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Framework\Registry;
use Magento\Backend\Model\Auth\Session;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\FormFactory;


class Form extends Generic
{
    /**
     * Core registry
     *
     * @var Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var Session
     */
    protected $_adminSession;

    /**
     * @param Context     $context
     * @param Registry    $registry
     * @param FormFactory $formFactory
     * @param Session     $adminSession
     * @param array       $data
     */

    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Session $adminSession,
        array $data = []
    ) {
        $this->_adminSession = $adminSession;

        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('dev_tasks_form');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id' => 'edit_form',
                    'action' => $this->getData('action'),
                    'method' => 'post'
                ],
            ]
        );

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Task')]);

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Title'),
                'title' => __('Title'),
                'required' => true,
                'class' => 'letters-only',
            ]
        );

        $fieldset->addField(
            'content',
            'textarea',
            [
                'name' => 'content',
                'label' => __('Content'),
                'title' => __('Content'),
                'required' => false,
            ]
        );

        $form->addValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
