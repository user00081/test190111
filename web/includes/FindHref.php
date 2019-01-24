<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 22.01.19
 * Time: 09:24
 */

include_once 'FetchContent.php';

class FindHref extends FetchContent
{
    public function __construct()
    {
        parent::__construct();
    }
    public function attributeExtractor($url)
    {

        $html = parent::fetch($url);
        $hrefs = array();

        $dom = new DOMDocument();
        @$dom->loadHTML($html, LIBXML_NOWARNING); //https://stackoverflow.com/questions/6090667/php-domdocument-errors-warnings-on-html5-tags/6090728

        $tags = $dom->getElementsByTagName('a');
        foreach ($tags as $tag) {
            $hrefs[] = $tag->getAttribute('href');
        }
        return $hrefs;
    }
}