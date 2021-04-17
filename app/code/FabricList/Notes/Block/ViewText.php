<?php

namespace FabricList\Notes\Block;

use Magento\Framework\Escaper;
use Magento\Framework\View\Element\Template\Context;


class ViewText extends \Magento\Framework\View\Element\AbstractBlock
{
    protected $_escaper;

    public function __construct(Context $context, Escaper $_escaper)
    {
        $this->_escaper = $_escaper;
        parent::__construct($context);
    }


    public function _toHtml()
    {
        return $this->getData('text');
    }

    public function customSetText($custom)
    {
        $value = $this->_escaper->escapeCss($custom);

        $this->setData('text', $value);

        return $this;
    }

}
