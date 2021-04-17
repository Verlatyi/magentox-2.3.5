<?php

namespace Devchannel\CustomAttribute\Plugin\Customer;

use Magento\Framework\View\LayoutInterface;

class AddressEditPlugin
{
    /**
     * @var LayoutInterface
     */
    private $layout;

    /**
     * AddressEditPlugin constructor.
     * @param LayoutInterface $layout
     */
    public function __construct(
        LayoutInterface $layout
    ) {
        $this->layout = $layout;
    }

    /**
     * @param \Magento\Customer\Block\Address\Edit $edit
     * @param string $result
     * @return string
     */
    public function afterGetNameBlockHtml(
        \Magento\Customer\Block\Address\Edit $edit,
        $result
    ) {
        $customBlock = $this->layout->createBlock(
            'Devchannel\CustomAttribute\Block\Customer\Address\Form\Edit\Custom',
            'devchannel_custom_attribute'
        );

        return $result . $customBlock->toHtml();
    }
}
