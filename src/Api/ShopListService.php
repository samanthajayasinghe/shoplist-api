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
    public function createList($date, $items) {
        try{
            $shopList = new ShopList($date);

            foreach (json_decode($items) as $item){
              $shopList->addItem($item->name, $item->quantity);
            }
            $this->getMapper()->saveShopList($shopList);
        }catch (\Exception $e){
            print($e->getMessage());
        }

    }

    /**
     * Get the List
     */
    public function getList() {

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
