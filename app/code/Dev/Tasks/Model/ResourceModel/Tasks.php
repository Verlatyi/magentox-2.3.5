<?php

namespace Dev\Tasks\Model\ResourceModel;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;

class Tasks extends AbstractDb
{
    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('dev_tasks', 'id');
    }

    protected function _beforeSave(AbstractModel $object)
    {
        $content = $object->getContent();

        if (empty($content)) {
            throw new LocalizedException(__('Content should not be empty'));
        }

        return $this;
    }
}
