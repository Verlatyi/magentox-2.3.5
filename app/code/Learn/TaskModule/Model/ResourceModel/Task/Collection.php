<?php

namespace Learn\TaskModule\Model\ResourceModel\Task;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Learn\TaskModule\Model\Task;
use Learn\TaskModule\Model\ResourceModel\Task as TaskResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            Task::class,
            TaskResource::class
        );
    }
}
