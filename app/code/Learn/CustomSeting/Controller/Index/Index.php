<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 19.02.21
 * Time: 13:21
 */

namespace Learn\CustomSeting\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $pageFactory;
    private $scopeConfigInterface;

    public function __construct(PageFactory $pageFactory, ScopeConfigInterface $scopeConfigInterface, Context $context)
    {
        $this->pageFactory = $pageFactory;
        $this->scopeConfigInterface = $scopeConfigInterface;
        parent::__construct($context);
    }

    public function execute()
    {
        //echo $this->scopeConfigInterface->getValue('Firstsection/Firstgroup/Firstfield');
        return $this->pageFactory->create();
    }
}
