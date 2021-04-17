<?php
namespace CustomCustomer\AttributeCustomer\Setup;

use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Model\Config as EavConfig;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute;
use Magento\Catalog\Model\Product;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
    /**
     * @var EavConfig
     */
    private $eavConfig;

    public function __construct(EavSetupFactory $eavSetupFactory, EavConfig $eavConfig)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavsetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $attributecode = 'interests';

        $eavsetup->addAttribute(CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER, $attributecode, [
            'label' => 'Interests',
            'required' => 0,
            'user_defined' => 1,
            'note' => 'Separate Multiple Intrests with comms roman',
            'system' => 0,
            'position' => 100,
        ]);

        $eavsetup->addAttributeToSet(
            CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
            CustomerMetadataInterface::ATTRIBUTE_SET_ID_CUSTOMER,
            null,
            $attributecode
        );

        $attribute = $this->eavConfig->getAttribute(CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER, $attributecode);
        $attribute->setData('used_in_forms', [
            'customer_account_create',
            'adminhtml_checkout',
            'adminhtml_customer'
        ]);

        $attribute->setData('validate_rules', [
            'input_validation' => 1,
            'min_text_length' => 3,
            'max_text_length' => 30,

        ]);
        $attribute->getResource()->save($attribute);
    }
}