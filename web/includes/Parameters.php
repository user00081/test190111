<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 22.01.19
 * Time: 10:23
 */

class Parameters
{
    protected $params;
    public function __construct()
    {
        $this->params = new StdClass();
    }
    public function getParams() {
        return $this->params;
    }
    public function getParamByProperty( $name ) {
        return $this->params->{"$name"};
    }
    public function savePostParam( $name ) {
        if ( isset( $_POST[$name]) )
            $this->params->{ "$name" } = $_POST[$name];
    }
    public function saveAllPostVars() {
        foreach ( $_POST as $key=>$val ) {
            $this->savePostParam( $key );
        }
    }
}