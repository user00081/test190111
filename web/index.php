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
  /*if ( isset($_POST['url1']) && isset($_POST['url2']) ) {
        $content = 'processing.twig';
  } else {*/
        $content = 'index.twig';
 // }
  return $app['twig']->render($content);
});

$app->run();
