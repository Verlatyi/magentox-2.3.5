<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19.03.21
 * Time: 23:17
 */

namespace Learn\Database\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData  implements UpgradeDataInterface
{

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '0.0.3', '<')) {
            $setup->getConnection()->update(
                $setup->getTable('learn_database_table'),
                [
                    'phone_number' => '+38-(095)-020-44-03'
                ],
                $setup->getConnection()->quoteInto('entity_id = ?', 1)
            );
        }

        $setup->endSetup();
    }
}