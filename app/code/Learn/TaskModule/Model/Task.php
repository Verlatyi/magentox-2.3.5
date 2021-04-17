<?php

namespace Learn\TaskModule\Model;

use Magento\Framework\Model\AbstractModel;

class Task extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Learn\TaskModule\Model\ResourceModel\Task::class);
    }
}
