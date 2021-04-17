<?php

namespace Emipro\Blog\Block\Adminhtml\Grid;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
   // protected $_template = 'grid/view2.phtml';

    protected $_coreRegistry = null;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'emipro_blog';
        $this->_controller = 'adminhtml_grid';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save Grid'));

        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                    ],
                ]
            ],
            -100
        );

        $this->buttonList->update('delete', 'label', __('Delete'));
    }

    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('emipro_form_data')->getId()) {
            return __("Edit Post '%1'", $this->escapeHtml($this->_coreRegistry->registry('emipro_form_data')->getTitle()));
        } else {
            return __('New Blog');
        }
    }

    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('blog/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '{{tab_id}}']);
    }

//    protected function _prepareLayout()
//    {
//        $this->buttonList->add(
//            'save_new',
//            [
//                'label' => __('Save'),
//                'onclick' => "setLocation('" . $this->_getCreateUrl() . "')"
//            ]
//        );
//
//        $this->setChild(
//            'gridformsecond',
//            $this->getLayout()->createBlock('Emipro\Blog\Block\Adminhtml\Grid\Edit\Tab\Main', 'grid.view.form.second')
//        );
//        return parent::_prepareLayout();
//    }

    protected function _getCreateUrl()
    {
        return $this->getUrl(
            'blog/*/save',
            ['_current' => true, 'back' => 'edit', 'active_tab' => '1']
        );
    }

//    public function getGridHtml()
//    {
//        return $this->getChildHtml('gridformsecond');
//    }
}
