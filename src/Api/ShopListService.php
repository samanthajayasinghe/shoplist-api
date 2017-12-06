<?php


namespace ShopList\Api;

use ShopList\Entity\ShopList;
use ShopList\Mapper\ShopListMapper;

class ShopListService extends RestApi
{

    /**
     * @var ShopListMapper
     */
    private $mapper = null;
    /**
     * @param $date
     * @param $items
     */
    public function createList($deviceId, $date, $items) {
        $shopList = new ShopList($date);
        $shopList->setDeviceId($deviceId);
        foreach (json_decode($items) as $item){
          $shopList->addItem($item->name, $item->quantity);
        }
        $this->getMapper()->saveShopList($shopList);
    }

    /**
     * @param $deviceId
     */
    public function getList($deviceId) {
        $searchParam = array($deviceId);
        $result = $this->getMapper()->findShopList($searchParam);
        $data = array();
        foreach ($result as $shopList) {
            $data[] = $shopList->toArray();
        }
        return $data;
    }

    /**
     * @return null
     */
    public function getMapper() {
        return $this->mapper;
    }

    /**
     * @param ShopListMapper $mapper
     */
    public function setMapper(ShopListMapper $mapper) {
        $this->mapper = $mapper;
    }


}
