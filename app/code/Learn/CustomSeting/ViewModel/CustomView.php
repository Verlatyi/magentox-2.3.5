<?php

namespace Learn\CustomSeting\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class CustomView implements ArgumentInterface
{
    protected $product;

    private $scopeConfigInterface;

    public $valueCss = "without";

    public function __construct(ScopeConfigInterface $scopeConfigInterface, ProductRepositoryInterface $productRepository)
    {
        $this->scopeConfigInterface = $scopeConfigInterface;
        $this->product = $productRepository;
    }

    public function getProductName()
    {
        $product = $this->product->get('S-UE55-7100-UA')->setName('asdasdasd')->save();

        return $product->getName();
    }

    public function getScope()
    {
        return $this->scopeConfigInterface->getValue('Firstsection/Firstgroup/Fourthfield');
    }

    public function getCustomElements()
    {
        return 'getCustomElements';
    }

    public function getClassCss()
    {
        switch ($this->scopeConfigInterface->getValue('Firstsection/Firstgroup/Fourthfield')) {
            case \Learn\CustomSeting\Model\AdminArray::FIELD_VALUE_NORMAL:
                $this->valueCss = "normal";
                break;
            case 1:
                $this->valueCss = "italic";
                break;
            case 2:
                $this->valueCss = "bold";
                break;
            case 3:
                $this->valueCss = "without";
                break;
        }

        return $this->valueCss;
    }
}
