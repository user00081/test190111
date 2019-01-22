<?php

include_once 'includes/Parameters.php';

$params = new Parameters();
$params->saveAllPostVars();

/*
echo "url1 from Listen class: ".$params->getParamByProperty( 'url1' );
echo "url2 from Listen class: ".$params->getParamByProperty( 'url2' );
*/