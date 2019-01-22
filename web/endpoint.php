<?php
//echo "cucu";
if (isset($_POST['url1']) )
    echo "url1 direct from POST: ".$_POST['url1'];
include_once 'includes/Listen.php';
$listen = new Listen();
$listen->savePostParam( 'url1' );

echo "url1 from Listen class: ".$listen->getParamByProperty('url1');
