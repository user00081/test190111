<?php

/*include_once 'includes/Parameters.php';

$params = new Parameters();
$params->saveAllPostVars();

echo "url1 from Listen class: ".$params->getParamByProperty( 'url1' );
echo "url2 from Listen class: ".$params->getParamByProperty( 'url2' );*/

/*include_once 'includes/FetchContent.php';

$fc = new FetchContent();
$url1 = $fc->getParamByProperty( 'url1');
//var_dump($url1);
$content = $fc->fetch( $url1 );

var_dump(substr($content, 100, 100));*/

/*include_once 'includes/FindHref.php';

$fh = new FindHref();
$url = $fh->getParamByProperty('url1');
$href_list = $fh->attributeExtractor( $url );

var_dump( $href_list );*/

include_once 'includes/Compare.php';
$comp = new Compare( 'url1', 'url2' );
var_dump($comp->getArray1());
var_dump($comp->getArray2());

include_once 'includes/LevenshteinDistance.php';
$source = $comp->getElementsInArrays( 1 );
var_dump( $source );
$ld = new LevenshteinDistance( $source[0], $source[1] );
var_dump( $ld );
