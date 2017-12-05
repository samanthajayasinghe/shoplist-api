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

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }


}
