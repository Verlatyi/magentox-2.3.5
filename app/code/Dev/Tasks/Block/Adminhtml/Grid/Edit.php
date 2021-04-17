<?php

namespace Dev\Tasks\Block\Adminhtml\Grid;

use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Block\Widget\Form\Container;
use Magento\Framework\Registry;

/**
 * Block for Edit page
 * @package Dev\Tasks\Block\Adminhtml\Grid
 */
class Edit extends Container
{
    /**
     * @var Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param Context  $context
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        Registry $registry
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * Init container
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'dev_tasks';
        $this->_controller = 'adminhtml_grid';

        parent::_construct();
    }

}
