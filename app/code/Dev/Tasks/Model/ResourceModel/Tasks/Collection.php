<?php


namespace Dev\Tasks\Model\ResourceModel\Tasks;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Initialize collection model
     */
    protected function _construct()
    {
        $this->_init('Dev\Tasks\Model\Tasks', 'Dev\Tasks\Model\ResourceModel\Tasks');
    }
}
