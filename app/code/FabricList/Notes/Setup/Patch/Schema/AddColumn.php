<?php

namespace FabricList\Notes\Setup\Patch\Schema;


use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddColumn implements \Magento\Framework\Setup\Patch\SchemaPatchInterface
{
    private $_moduleSetup;

    public function __construct(ModuleDataSetupInterface $moduleSetup)
    {
        $this->_moduleSetup = $moduleSetup;
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
       $this->_moduleSetup->startSetup();

        $this->_moduleSetup->getConnection()->addColumn(
            $this->_moduleSetup->getTable('fabriclist_notes_note'),
            'priority',
            [
                'type' => Table::TYPE_INTEGER,
                'length' => 2,
                'nullable' => true,
                'comment' => 'Note priority',
            ]
        );
    }
}
