<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 11.03.21
 * Time: 0:16
 */

namespace Learn\Interactive\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */
interface ColorResultInterface extends SearchResultsInterface
{

    /**
     * @return \Learn\Interactive\Api\Data\ColorInterface[]
     */
    public function getItems();

    /**
     * @param \Learn\Interactive\Api\Data\ColorInterface[] $items
     * @return SearchResultsInterface
     */
    public function setItems(array $items);
}
