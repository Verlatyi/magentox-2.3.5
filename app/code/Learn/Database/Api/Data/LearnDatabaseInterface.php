<?php

namespace Learn\Database\Api\Data;

interface LearnDatabaseInterface
{
    const NAME = "name";
    const ID = "entity_id";
    const STATUS = "status";
    const ADDRESS = "address";
    const PHONE_NUMBER = "phone_number";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "udpated_at";
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return boolean
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @return string
     */
    public function getPhoneNumber();

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return string
     */
    public function getUpdatedAd();

    /*set*/
    /**
     * @param int $id
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setId($id);

    /**
     * @param string $name
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setName($name);

    /**
     * @param boolean $status
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setStatus($status);

    /**
     * @param string $phoneNumber
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setPhoneNumber($phoneNumber);

    /**
     * @param string $address
     * @return \Learn\Database\Api\Data\LearnDatabaseInterface
     */
    public function setAddress($address);
}
