<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 23.03.21
 * Time: 22:38
 */

namespace Learn\BigBoats\Observer;

use Magento\Framework\Event\Observer;

class CustomerLoginSuccess implements \Magento\Framework\Event\ObserverInterface
{
    protected $loggerCustomer;

    public function __construct(\Learn\BigBoats\Logger\Customer $loggerCustomer)
    {
        $this->loggerCustomer = $loggerCustomer;
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $this->loggerCustomer->info('Customer ID: '.$customer->getId().' has been logged');
    }
}
