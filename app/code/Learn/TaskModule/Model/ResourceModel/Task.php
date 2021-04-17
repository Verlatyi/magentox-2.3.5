<?php

namespace Learn\TaskModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Task extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('learn_taskmodule_item', 'id');
    }
}
