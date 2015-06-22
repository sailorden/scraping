<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 21/06/15
 * Time: 19:56
 */

class Scrapper
{
    private $_name;
    private $_url;
    private $_attributes;
    private $_item;

    public function __construct($name, $url, $attributes, $item)
    {
        $this->_name = $name; //name of the site
        $this->_url = $url; //url to search in the scrap method
        $this->_attributes = $attributes; //classes or ids to go for
        $this->_item = $item; //each item id or class
    }

    public function scrap($q, $items=5)
    {
        $html = file_get_contents($this->_url.$q);
        $doc = phpQuery::newDocument($html);
        $all = array();
        for($i = 0; $i<$items; $i++){
            $each = array();
            for($j = 0; $j< sizeof($this->_attributes); $j++){
                foreach ($doc->find($this->_item.($i+1)." ".$this->_attributes[$j]) as $item) {
                    $each[$this->_attributes[$j]] = pq($item)->html().pq($item)->attr('src'); //push the html or the src
                }
            }
            $all[$i] = $each;
        }
        return $all;
    }

}

?>