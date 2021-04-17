<?php

namespace Dev\Tasks\Block\Adminhtml;

/*use Magento\Backend\Block\Widget\Container;*/
use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Block\Widget\Grid\Container;

class Grid extends Container
{
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    protected function _prepareLayout()
    {
        $this->_blockGroup = 'Dev_Tasks';
        $this->_controller = 'adminhtml_grid';

        /*        $addButton = [
                    'id' => 'add_new_grid',
                    'label' => __('Add New Task'),
                    'class' => 'primary',
                    'class_name' => 'Magento\Backend\Block\Widget\Button',
                    'onclick' => "setLocation('" . $this->_getCreateUrl() . "')"
                ];*/

        /*        $this->buttonList->add('add_new', $addButton);*/

        return parent::_prepareLayout();
    }

    protected function _getCreateUrl()
    {
        return $this->getUrl('tasks/*/new');
    }
}
