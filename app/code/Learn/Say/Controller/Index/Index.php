<?php

namespace Learn\Say\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\DataObject;

class Index extends Action
{
    public function execute()
    {
        $textDisplay = new DataObject(['text' => 'learn say']);
        $this->_eventManager->dispatch('learn_say_display_text', ['ls_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}
