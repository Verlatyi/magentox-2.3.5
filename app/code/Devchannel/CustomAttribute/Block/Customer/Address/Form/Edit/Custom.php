<?php

namespace Devchannel\CustomAttribute\Block\Customer\Address\Form\Edit;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Api\Data\AddressInterfaceFactory;
use Magento\Customer\Model\Session;

class Custom extends Template
{
    /**
     * @var AddressInterface
     */
    private $address;

    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepository;

    /**
     * @var AddressInterfaceFactory
     */
    private $addressFactory;

    /**
     * @var Session
     */
    private $customerSession;

    /**
     * Custom constructor.
     * @param Template\Context $context
     * @param AddressInterfaceFactory $addressInterfaceFactory
     * @param AddressRepositoryInterface $addressRepository
     * @param Session $session
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        AddressInterfaceFactory $addressInterfaceFactory,
        AddressRepositoryInterface  $addressRepository,
        Session $session,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->addressRepository = $addressRepository;
        $this->addressFactory = $addressInterfaceFactory;
        $this->customerSession = $session;
    }

    protected function _prepareLayout()
    {
        $addressId = $this->getRequest()->getParam('id');

        if($addressId) {
            try {
                $this->address = $this->addressRepository->getById($addressId);
                if($this->address->getCustomerId() != $this->customerSession->getCustomerId()) {
                    $this->address = null;
                }
            } catch (NoSuchEntityException $exception) {
                $this->address = null;
            }
        }

        if ($this->address === null) {
            $this->address = $this->addressFactory->create();
        }

        return parent::_prepareLayout();
    }

    protected function _toHtml()
    {
        $customWidgetBlock = $this->getLayout()->createBlock(
           'Devchannel\CustomAttribute\Block\Customer\Widget\Custom'
       );

        $customWidgetBlock->setAddress($this->address);

        return $customWidgetBlock->toHtml();
    }
}
