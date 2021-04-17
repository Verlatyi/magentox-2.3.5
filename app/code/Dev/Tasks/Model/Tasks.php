<?php


namespace Dev\Tasks\Model;

use Magento\Framework\Model\AbstractModel;


class Tasks extends AbstractModel
{
    /**
     * Initialize domain model
     */
    protected function _construct()
    {
        $this->_init('Dev\Tasks\Model\ResourceModel\Tasks');
    }
}
