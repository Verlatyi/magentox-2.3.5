<?php

namespace Emipro\Blog\Block\Adminhtml;


use Magento\Backend\Block\Widget\Container;
use Magento\Backend\Block\Widget\Context;

class Grid extends Container
{
    protected $_template = 'grid/view.phtml';

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _prepareLayout()
    {
        $this->buttonList->add(
            'add_new',
            [
            'label' => __('Add'),
            'onclick' => "setLocation('" . $this->_getCreateUrl() . "')"
            ]
        );

        $this->setChild(
            'grid',
            $this->getLayout()->createBlock('Emipro\Blog\Block\Adminhtml\Grid\Grid', 'grid.view.grid')
        );
        return parent::_prepareLayout();
    }

    protected function _getCreateUrl()
    {
        return $this->getUrl(
            'blog/*/new'
        );
    }



    public function getGridHtml()
    {
        return $this->getChildHtml('grid');
    }
}
