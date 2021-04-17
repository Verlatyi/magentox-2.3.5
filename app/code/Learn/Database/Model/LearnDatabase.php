<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 20.03.21
 * Time: 0:35
 */

namespace Learn\Database\Model;

use Learn\Database\Model\ResorceModel\LearnDatabase as ResourceModel;
use Magento\Framework\Model\AbstractModel;
use Learn\Database\Api\Data\LearnDatabaseInterface;

class LearnDatabase extends AbstractModel implements LearnDatabaseInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(LearnDatabaseInterface::ID);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData(LearnDatabaseInterface::NAME);
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->getData(LearnDatabaseInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->getData(LearnDatabaseInterface::ADDRESS);
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getData(LearnDatabaseInterface::PHONE_NUMBER);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(LearnDatabaseInterface::CREATED_AT);
    }

    /**
     * @return string
     */
    public function getUpdatedAd()
    {
        return $this->getData(LearnDatabaseInterface::UPDATED_AT);
    }

    /**
     * @param string $name
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setName($name)
    {
        $this->setData(LearnDatabaseInterface::NAME, $name);
    }

    /**
     * @param boolean $status
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setStatus($status)
    {
        $this->setData(LearnDatabaseInterface::STATUS, $status);
    }

    /**
     * @param string $phoneNumber
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->setData(LearnDatabaseInterface::PHONE_NUMBER, $phoneNumber);
    }

    /**
     * @param string $address
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setAddress($address)
    {
        $this->setData(LearnDatabaseInterface::ADDRESS, $address);
    }

    /**
     * @param int $address
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setId($id)
    {
        $this->setData(LearnDatabaseInterface::ID, $id);
    }
}
