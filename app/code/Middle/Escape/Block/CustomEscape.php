<?php

namespace Middle\Escape\Block;

use Magento\Framework\View\Element\Template\Context;


class CustomEscape extends \Magento\Framework\View\Element\Template
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function sayPage()
    {
        return __('Default page');
    }

    public function getLabel()
    {
        return 'Only registered users can write reviews. <script>alert("xss2");</script>> Please <a href="%1">Sign in</a> or <a href="%2">create an account</a>';
    }

    public function getScript()
    {
        return '<script>alert("Kaput")</script>>';
    }
}

