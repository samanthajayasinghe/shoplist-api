<?php

namespace ShopList\Mapper;

use ShopList\Entity\ShopList;

class ShopListMapper extends DBMapper {

    public function saveShopList(ShopList $shopList) {

        $query = "INSERT INTO shop_list(name,shop_date,created_at) VALUES(?,?,?)";
        $this->executeQuery($query, array($shopList->getName(), $shopList->getShopDate(), date("Y.m.d")));

        $itemSql = "INSERT INTO shop_list_item(shop_list_id,name,quantity) VALUES";
        $itemParam = [];

        $shopList->setId($this->getLastInsertId());
        $items = $shopList->getItems();
        foreach ($items as $item){
            $itemSql .= "(?,?,?)";
            $itemParam[] = $shopList->getId();
            $itemParam[] = $item->getName();
            $itemParam[] = $item->getQuantity();

            if (next($items)==true){
                $itemSql .= ",";
            }
        }
        $this->executeQuery($itemSql, $itemParam);
    }

    public function findShopList($searchParam = array()) {
        $query = "SELECT  *
                  FROM  shop_list sl , shop_list_item sli 
                  WHERE sl.id=sli.shop_list_id AND sl.device_id=?
                  ORDER By sli.shop_list_id";

        $result = $this->fetchAll($query, $searchParam);
        $shopListId = 0;
        $data = array();
        foreach ($result as $item) {
            if($shopListId != $item->shop_list_id) {
                $shopList = new ShopList($item->shop_date);
                $shopList->setId($item->shop_list_id);
                $data[$item->shop_list_id] = $shopList;
                $shopListId = $item->shop_list_id;
            }
            $data[$item->shop_list_id]->addItem($item->name, $item->quantity);
        }

        return $data;
    }
}
