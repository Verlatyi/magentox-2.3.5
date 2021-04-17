<?php


namespace Learn\Backend\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomObserver implements ObserverInterface
{

    public function execute(Observer $observer)
    {
        $message = $observer->getData('greeting');
        $message->setGreeting('Good evening');
    }
}
