<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 11.03.21
 * Time: 0:11
 */

namespace Learn\Interactive\Api\Data;

/**
 * @api
 */
interface ColorInterface
{
    /**
     * @return int
     */
    public function getColorId(): int;

    /**
     * @return string
     */
    public function getColor(): string;

    /**
     * @param int $colorId
     * @return \Learn\Interactive\Api\Data\ColorInterface
     */
    public function setColorId(int $colorId);

    /**
     * @param string $color
     * @return \Learn\Interactive\Api\Data\ColorInterface
     */
    public function setColor(string $color);
}
