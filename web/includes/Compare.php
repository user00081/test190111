<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 22.01.19
 * Time: 09:23
 */

include_once 'FindAttribute.php';

class Compare extends FindAttribute
{
    private $array_url1;
    private $array_url2;
    public function __construct( $var1, $var2 ) {
        parent::__construct();
        $url1 = parent::getParamByProperty( $var1 );
        $url2 = parent::getParamByProperty( $var2 );
        parent::setTag( 'a' );
        parent::setAttribute( 'href' );
        $this->array_url1 = parent::attributeExtractor( $url1 );
        $this->array_url2 = parent::attributeExtractor( $url2 );
    }
    public function getArray1() {
        return $this->array_url1;
    }
    public function getArray2() {
        return $this->array_url2;
    }
}