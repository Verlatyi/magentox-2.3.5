<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Created By : Rohan Hapani
 */
namespace Rh\Blog\Model\ResourceModel;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;

class Blog extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('rh_blog', 'id');
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
