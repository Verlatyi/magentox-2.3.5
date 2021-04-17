<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 11.03.21
 * Time: 0:08
 */

namespace Learn\Interactive\Api;

use Learn\Interactive\Api\Data\ColorInterface;

/**
 * @api
 */
interface ColorOperationInterface
{
    /**
     * @param ColorInterface $color
     * @return bool
     */
    public function save(ColorInterface $color): bool;

    /**
     * @param ColorInterface $color
     * @return bool
     */
    public function delete(ColorInterface $color): bool;
}
