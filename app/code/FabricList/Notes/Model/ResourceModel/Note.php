<?php

namespace FabricList\Notes\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Note extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('fabriclist_notes_note', 'note_id');
    }
}
