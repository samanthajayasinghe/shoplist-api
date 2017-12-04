<?php

namespace ShopList\Entity;

class ShopList {

    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string
     */
    private $name = '';

    /**
     * ShopList constructor.
     *
     * @param int    $id
     * @param string $name
     */
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}
