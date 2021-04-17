<?php

namespace FabricList\Notes\Model\ResourceModel\Note;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use FabricList\Notes\Model\Note as Note;
use FabricList\Notes\Model\ResourceModel\Note as NoteResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Note::class, NoteResource::class);
    }
}
