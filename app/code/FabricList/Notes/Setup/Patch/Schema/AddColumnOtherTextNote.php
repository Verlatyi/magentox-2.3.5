<?php


namespace FabricList\Notes\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddColumnOtherTextNote implements \Magento\Framework\Setup\Patch\SchemaPatchInterface
{
    private $_moduleSetup;

    public function __construct(ModuleDataSetupInterface $moduleSetup)
    {
        $this->_moduleSetup = $moduleSetup;
    }

    public static function getDependencies()
    {
        return [
            AddColumn::class,
        ];
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
            'other',
            [
                'type' => Table::TYPE_TEXT,
                'length' => 255,
                'nullable' => true,
                'comment' => 'Note other text',
            ]
        );
    }
}
