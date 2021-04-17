<?php

namespace Learn\Say\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ChangeDisplayText implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $displayT = $observer->getData('ls_text');
        echo $displayT->getText() . " - Event </br>";
        $displayT->setText('Execute event successfully.');

        return $this;
    }
}
