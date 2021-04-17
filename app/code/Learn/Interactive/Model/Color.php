<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 10.03.21
 * Time: 23:13
 */

namespace Learn\Interactive\Model;

use Learn\Interactive\Api\Data\ColorInterface;
use Magento\Framework\Model\AbstractModel;
use Learn\Interactive\Model\ResourceModel\Color as ColorResourceModel;

class Color extends AbstractModel implements ColorInterface
{
    const COLOR_ID = 'color_id';
    const NAME_COLOR = 'color';

    protected function _construct()
    {
        $this->_init(ColorResourceModel::class);
    }

    /**
     * @return int
     */
    public function getColorId(): int
    {
        return (int) $this->getData(self::COLOR_ID);
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->getData(self::NAME_COLOR);
    }

    /**
     * @param int $colorId
     */
    public function setColorId(int $colorId)
    {
        $this->setData(self::COLOR_ID, $colorId);
    }

    /**
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->setData(self::NAME_COLOR, $color);
    }
}
