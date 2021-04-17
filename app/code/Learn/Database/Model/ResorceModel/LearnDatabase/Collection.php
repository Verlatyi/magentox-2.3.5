<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20.03.21
 * Time: 1:17
 */

namespace Learn\Database\Model\ResorceModel\LearnDatabase;

use Learn\Database\Model\LearnDatabase as LearnDatabaseModel;
use Learn\Database\Model\ResorceModel\LearnDatabase as LearnDatabaseResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init(LearnDatabaseModel::class, LearnDatabaseResource::class);
    }
}