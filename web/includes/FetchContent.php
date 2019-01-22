<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 22.01.19
 * Time: 09:24
 */

class FetchContent
{
    protected $contentAsText;
    public function __construct()
    {

    }
    public function fetch( $path ) {
        $handle = fopen( $path, "r" );
        $contents = fread( $handle, filesize( $path ) );
        fclose($handle);
        return $contents;
    }
}