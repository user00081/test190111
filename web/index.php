<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  /*if ( isAjaxRequest() ) {
      include_once 'includes/Compare.php';
        $comp = new Compare('url1', 'url2');
        $a1 = $comp->getArray1();
        $a2 = $comp->getArray2();
        //var_dump($comp->getArray1());
        //var_dump($comp->getArray2());
        $content = 'results.twig';
  } else {*/
        $content = 'index.twig';
  //}
  return $app['twig']->render($content);
});

$app->run();
