<?php

namespace FabricList\Notes\Block;

use Magento\Framework\View\Element\Template\Context;
use FabricList\Notes\Model\ResourceModel\Note\CollectionFactory;
use FabricList\Notes\Model\NoteFactory;

class Display extends \Magento\Framework\View\Element\Template
{
    protected $_noteFactory;

    protected $_noteCollectionFactory;

    public function __construct(Context $context, NoteFactory $noteFactory, CollectionFactory $noteCollectionFactory)
    {
        $this->_noteFactory = $noteFactory;

        $this->_noteCollectionFactory = $noteCollectionFactory;

        parent::__construct($context);
    }

    public function sayPage()
    {
        return __('Default page');
    }

    public function getNoteCollection()
    {
//        $note = $this->_noteFactory->create();
//        return $note->getCollection();
        $notesCollection = $this->_noteCollectionFactory->create();
        return $notesCollection;
    }
}

