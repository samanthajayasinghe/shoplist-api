<?php

namespace ShopList\Entity;

class ShopList {

    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var int
     */
    private $deviceId = 0;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $shopDate = '';

    /**
     * @var string
     */
    private $status = '';

    /**
     * @var array
     */
    private $items = [];

    /**
     * ShopList constructor.
     *
     * @param $shopDate
     */
    public function __construct($shopDate) {
        $this->shopDate = $shopDate;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getShopDate() {
        return $this->shopDate;
    }

    /**
     * @param string $shopDate
     */
    public function setShopDate($shopDate) {
        $this->shopDate = $shopDate;
    }

    /**
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getDeviceId() {
        return $this->deviceId;
    }

    /**
     * @param int $deviceId
     */
    public function setDeviceId($deviceId) {
        $this->deviceId = $deviceId;
    }


    /**
     * @param string $name
     * @param int $quantity
     */
    public function addItem($name, $quantity) {
        $this->items[] = new Item($name, $quantity);
    }

    public function toArray() {
        $itemList = array();
        foreach ($this->getItems() as $item) {
            $itemList[] = $item->toArray();
        }

        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'shopDate' => $this->getShopDate(),
            'items' => $itemList
        ] ;
    }
}
