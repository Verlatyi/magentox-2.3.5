<?php

namespace Learn\Interactive\Service;

use Learn\Interactive\Api\ColorOperationInterface;
use Learn\Interactive\Api\Data\ColorInterface;
use Learn\Interactive\Model\ResourceModel\Color;

class ColorOperation implements ColorOperationInterface
{
    private $resource;

    public function __construct(Color $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @param ColorInterface $color
     * @return bool
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(ColorInterface $color): bool
    {
        $this->resource->save($color);
        return true;
    }

    /**
     * @param ColorInterface $color
     * @return bool
     * @throws \Exception
     */
    public function delete(ColorInterface $color): bool
    {
        $this->resource->delete($color);
        return true;
    }
}
