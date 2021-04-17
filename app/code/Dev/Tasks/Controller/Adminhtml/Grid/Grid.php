<?php

namespace Dev\Tasks\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\View\LayoutFactory;

/**
 * Grid Controller
 */

class Grid extends Action
{
    /**
     * @var RawFactory
     */
    protected $resultRawFactory;

    /**
     * @var LayoutFactory
     */
    protected $layoutFactory;

    /**
     * @param Context       $context
     * @param RawFactory    $resultRawFactory
     * @param LayoutFactory $layoutFactory
     */
    public function __construct(
        Context $context,
        RawFactory $resultRawFactory,
        LayoutFactory $layoutFactory
    ) {
        $this->resultRawFactory = $resultRawFactory;
        $this->layoutFactory = $layoutFactory;
        parent::__construct($context);
    }

    /**
     * @return RawFactory
     */
    public function execute()
    {
        $resultRaw = $this->resultRawFactory->create();

        $tasksHtml = $this->layoutFactory->create()->createBlock(
            \Dev\Tasks\Block\Adminhtml\Grid\Grid::class,
            'grid.view.grid'
        )->toHtml();

        return $resultRaw->setContents($tasksHtml);
    }
}
