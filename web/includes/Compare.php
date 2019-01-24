<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 22.01.19
 * Time: 09:23
 */

include_once 'FindHref.php';

class Compare extends FindHref
{
    private $array_url1;
    private $array_url2;
    public function __construct( $url1, $url2 ) {
        parent::__construct();
        $this->array_url1 = parent::attributeExtractor( $url1 );
        $this->array_url2 = parent::attributeExtractor( $url2 );
    }
    public function printArray() {

    }
}