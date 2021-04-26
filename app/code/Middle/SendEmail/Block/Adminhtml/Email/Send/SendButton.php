<?php

namespace Middle\SendEmail\Block\Adminhtml\Email\Send;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SendButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
      return [
            'label' => __('Send'),
            'class' => 'save primary',
            'sort_order' => 10
        ];
    }
}
