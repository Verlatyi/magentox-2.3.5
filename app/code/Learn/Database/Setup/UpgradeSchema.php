<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19.03.21
 * Time: 23:10
 */

namespace Learn\Database\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Db\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '0.0.2', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('learn_database_table'),
                'phone_number',
                ['nullable'=>false, 'type'=>Table::TYPE_TEXT, 'comment'=>'PHONE NUMBER']
            );
        }

        $setup->endSetup();
    }
}
