<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 22.01.19
 * Time: 09:24
 */

include_once 'FetchContent.php';

class FindAttribute extends FetchContent
{
    private $tag;
    private $attribute;
    public function __construct()
    {
        parent::__construct();
    }
    public function setTag( $tag ) {
        $this->tag = $tag;
    }
    public function setAttribute( $attribute ) {
        $this->attribute = $attribute;
    }
    public function attributeExtractor( $url )
    {
        if ( $this->getHeaderInformations( $url ) !== false ) {
            $html = parent::fetch($url);
            $attributes_list = array();

            $dom = new DOMDocument();
            @$dom->loadHTML($html, LIBXML_NOWARNING); //https://stackoverflow.com/questions/6090667/php-domdocument-errors-warnings-on-html5-tags/6090728

            $tags = $dom->getElementsByTagName( $this->tag );
            foreach ($tags as $tag) {
                $attributes_list[] = $tag->getAttribute( $this->attribute );
            }
        } else {
            $attributes_list = array("Hmm. We’re having trouble finding ".$url.". Please check input and try again.");
        }
        return $attributes_list;
    }
}