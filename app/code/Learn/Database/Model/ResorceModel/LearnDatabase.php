<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20.03.21
 * Time: 0:32
 */

namespace Learn\Database\Model\ResorceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class LearnDatabase extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('learn_database_table','entity_id');
    }
}