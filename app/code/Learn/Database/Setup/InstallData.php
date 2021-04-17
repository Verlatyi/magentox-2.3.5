<?php

namespace Learn\Database\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('learn_database_table'),
            [
                'name' => 'Roman', 'address' => 'No 777, New York', 'status' => true
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('learn_database_table'),
            [
                'name' => 'Egor', 'address' => 'No 778, New York'
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('learn_database_table'),
            [
                'name' => 'Artem', 'address' => 'No 776, New York'
            ]
        );

        $setup->endSetup();
    }
}
