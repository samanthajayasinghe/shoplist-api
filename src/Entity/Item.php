<?php

namespace ShopList\Entity;

class Item {

    private $name = '';

    private $quantity = 1 ;

    /**
     * Item constructor.
     *
     * @param string $name
     * @param int    $quantity
     */
    public function __construct($name, $quantity) {
        $this->name = $name;
        $this->quantity = $quantity;
    }

}
