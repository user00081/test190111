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
    public function __construct()
    {
        parent::__construct();
        parent::saveAllPostVars();
    }
    public function getHeaderInformations( $path ) {
        return ( @get_headers($path, TRUE) !== false )?get_headers($path, TRUE):false;
    }
    public function fetch( $path ) {
        return file_get_contents( $path );
    }
}