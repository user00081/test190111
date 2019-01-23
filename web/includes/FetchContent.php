<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 22.01.19
 * Time: 09:24
 */

include_once 'Parameters.php';

class FetchContent extends Parameters
{
    protected $parameters;
    public function __construct()
    {
        $this->parameters = new Parameters();
        $this->parameters->saveAllPostVars();
    }

    public function fetch( $path ) {
        $handle = fopen( $path, "r" );
        $contents = fread( $handle, filesize( $path ) );
        fclose($handle);
        return $contents;
    }
}