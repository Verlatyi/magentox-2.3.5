<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 29.03.21
 * Time: 0:12
 */

namespace Devchannel\CustomAttribute\Block\Customer\Widget;

use Amazon\Core\Helper\ClientIp\Proxy;
use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Framework\View\Element\Template;
use Magento\TestFramework\Exception\NoSuchActionException;

class Custom extends Template
{
    /**
     * @var AddressMetadataInterface
     */
    private $addressMetadata;

    public function __construct(
        Template\Context $context,
        AddressMetadataInterface $addressMetadata,
        array $data = []
    ) {

        parent::__construct($context, $data);
        $this->addressMetadata = $addressMetadata;
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('widget/custom.phtml');
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
       $this->getAttribute()
        ? $this->getAttribute()->isRequired()
       : false;
    }

    /**
     * @return string
     */
    public function getFieldId()
    {
        return 'custom';
    }

    /**
     * @return \Magento\Framework\Phrase|string
     */
    public function getFieldLabel()
    {
        return $this->getAttribute()
            ? $this->getAttribute()->getFrontendLabel()
            : __('Custom');
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return 'custom';
    }

    /**
     * @return string|null
     */
    public function getValue()
    {
        /**
         * AddressInterface $address
         */
        $address = $this->getAddress();
        if($address instanceof AddressInterface) {
            return $address->getCustomAttribute('custom')
                ? $address->getCustomAttribute('custom')->getValue()
                : null;
        }
        return null;
    }

    private function getAttribute()
    {
        try {
            $attribute = $this->addressMetadata->getAttributeMetadata('custom');
        } catch (NoSuchActionException $exception) {
            return null;
        }

        return $attribute;
    }
}