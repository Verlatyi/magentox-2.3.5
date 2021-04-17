<?php

namespace FabricList\Notes\Model;

use Magento\Framework\Model\AbstractModel;
use FabricList\Notes\Model\ResourceModel\Note as NoteResource;

class Note extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(NoteResource::class);
    }
}
