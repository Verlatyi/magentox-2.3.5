<?php

namespace Learn\BigBoats\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class LogAtCheckout implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $writer = new \Zend\Log\Writer\Stream(BP.'/var/log/testlog.log');
        $logger = new \Zend\Log\Logger;
        $logger->addWriter($writer);
        $logger->info('Your text message');
    }
}
