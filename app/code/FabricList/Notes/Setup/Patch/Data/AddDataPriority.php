<?php

namespace FabricList\Notes\Setup\Patch\Data;


use Magento\Framework\Setup\Patch\PatchInterface;
use FabricList\Notes\Model\ResourceModel\Note as NoteResource;
use FabricList\Notes\Model\NoteFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddDataPriority implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    private $moduleDataSetup;
    private $NoteFactory;
    private $NoteResource;

    public function __construct(NoteFactory $NoteFactory, NoteResource $NoteResource, ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->NoteFactory = $NoteFactory;
        $this->NoteResource = $NoteResource;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $notes = $this->NoteFactory->create();
        $notes->setData([
            'label' => 'data patch note',
            'status' => 'open',
            'priority' => 1,
            'customer_id' => 1
        ]);
        $this->NoteResource->save($notes);
        $this->moduleDataSetup->endSetup();
    }
}
