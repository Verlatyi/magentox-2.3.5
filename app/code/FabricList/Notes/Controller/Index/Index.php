<?php

namespace FabricList\Notes\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use FabricList\Notes\Model\Note;
use FabricList\Notes\Model\ResourceModel\Note as NoteResource;
use FabricList\Notes\Model\NoteFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    private $noteResource;

    private $noteFactory;

    public function __construct(Context $context, NoteFactory $noteFactory, NoteResource $noteResource)
    {
        $this->noteFactory = $noteFactory;
        $this->noteResource = $noteResource;

        parent::__construct($context);
    }

    public function execute()
    {
        $note = $this->noteFactory->create();

        $note->setData([
            'label' => 'new note',
            'status' => 'open',
            'customer_id' => 1
        ]);

        //$this->noteResource->save($note);

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        exit();
    }
}
