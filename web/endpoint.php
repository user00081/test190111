<?php

/*include_once 'includes/Parameters.php';

$params = new Parameters();
$params->saveAllPostVars();*/

include_once 'includes/FetchContent.php';

$fc = new FetchContent();
$url1 = $fc->getParamByProperty( 'url1');
var_dump($url1);
$content = $fc->fetch( $url1 );

var_dump(substr($content, 0, 100));



/*
echo "url1 from Listen class: ".$params->getParamByProperty( 'url1' );
echo "url2 from Listen class: ".$params->getParamByProperty( 'url2' );
*/