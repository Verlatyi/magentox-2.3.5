<?php

namespace Learn\TaskModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('learn_taskmodule_item'),
            [
                'name' => 'Task 1'
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('learn_taskmodule_item'),
            [
                'name' => 'Task 2'
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('learn_taskmodule_item'),
            [
                'name' => 'Task 3'
            ]
        );

        $setup->endSetup();
    }
}
