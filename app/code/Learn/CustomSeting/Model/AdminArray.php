<?php


namespace Learn\CustomSeting\Model;


use Magento\Framework\Option\ArrayInterface;

class AdminArray implements ArrayInterface
{
    const FIELD_VALUE_NORMAL = 0;

    public function toOptionArray()
    {
        return [
            ['value' => self::FIELD_VALUE_NORMAL, 'label' => __('Normal')],
            ['value' => 1, 'label' => __('Italic')],
            ['value' => 2, 'label' => __('Bold')],
            ['value' => 3, 'label' => __('Without')],
        ];
    }
}
