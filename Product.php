<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 21/06/15
 * Time: 20:40
 */

class Product {
    private $_title;
    private $_imageUrl;
    private $_price;
    private $_description;

    public function __construct($title, $imageUrl, $price, $description)
    {
        $this->_title = $title;
        $this->_imageUrl = $imageUrl;
        $this->_price = $price;
        $this->_description = $description;
    }
    public function setTitle($title){
        $this->_title = $title;
    }
    public function setImageUrl($imageUrl){
        $this->_imageUrl = $imageUrl;
    }
    public function setPrice($price){
        $this->_price = $price;
    }
    public function setDescription($description){
        $this->_description = $description;
    }
    public function toString(){
        return "<b>Title:</b> ".$this->_title." <b>Image:</b> ".$this->_imageUrl." <b>Price:</b> ".$this->_price." <b>Description:</b> ".$this->_description;
    }
}

?>