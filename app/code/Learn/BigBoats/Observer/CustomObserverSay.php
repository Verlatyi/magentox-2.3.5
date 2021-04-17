<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 18.03.21
 * Time: 0:01
 */

namespace Learn\BigBoats\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomObserverSay implements ObserverInterface
{

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $message = $observer->getData('say');
        echo $message->getSay() . "<br>";
        $message->setSay('Hello User');
    }
}