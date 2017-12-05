<?php

namespace ShopList\Mapper;

use ShopList\Entity\ShopList;

class ShopListMapper extends DBMapper {

    public function saveShopList(ShopList $shopList) {
        $this->beginTransaction();

        $query = "INSERT INTO shop_list('name','shop_date','created_at') VALUES(?,?,?)";
        $this->executeQuery($query, array($shopList->getName(), $shopList->getShopDate(), date('now')));

        $this->commit();
    }
}
