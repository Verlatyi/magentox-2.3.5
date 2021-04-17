<?php
namespace Learn\Database\Setup;

use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable(
                'learn_database_table'
            )
            )->addColumn(
                 'entity_id',
                 Table::TYPE_INTEGER,
                 null,
                 ['identity' => true, 'nullable' => false, 'primary' => true],
                 'ID LEARN DATABASE'
             )->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'NAME LEARN DATABASE'
            )->addColumn(
                'address',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'ADDRESS LEARN DATABASE'
            )->addColumn(
                'status',
                Table::TYPE_BOOLEAN,
                10,
                ['nullable' => false, 'default' => false],
                'STATUS LEARN DATABASE'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'CREATED AT TIME LEARN DATABASE'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                'TIME FOR UPDATE LEARN DATABASE'
            )->setComment(
                'MY LEARN MODULE with DATABASE'
            );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
