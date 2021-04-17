<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 10.03.21
 * Time: 23:13
 */

namespace Learn\Interactive\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Color extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('learn_interactive_color', 'color_id');
    }
}