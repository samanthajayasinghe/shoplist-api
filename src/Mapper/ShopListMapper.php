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

        foreach ($shopList->getItems() as $item){
            $itemSql .= "(?,?,?)";
            $itemParam[] = $shopList->getId();
            $itemParam[] = $item->getName();
            $itemParam[] = $item->getQuantity();
        }

        $this->executeQuery($itemSql, $itemParam);
    }
}
