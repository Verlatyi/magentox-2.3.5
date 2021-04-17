<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 23.03.21
 * Time: 22:29
 */

namespace Learn\BigBoats\Logger\Handler;

use Magento\Framework\Filesystem\DriverInterface;

class Customer extends \Magento\Framework\Logger\Handler\Base
{
    protected $loggerType = \Monolog\Logger::INFO;

    /**
     * Customer constructor.
     * @param DriverInterface $filesystem
     * @param string $filePath
     * @param string $fileName
     * @throws \Exception
     */
    public function __construct(DriverInterface $filesystem, $filePath = null, $fileName = null)
    {
        $fileName = '/var/log/customer-' . date('Y-m-d') . '.log';
        parent::__construct($filesystem, $filePath, $fileName);
    }
}
