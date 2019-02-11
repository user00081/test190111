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
  
  require_once 'includes/Router.php';
  $vars = array(
      'isajax' => false
  );
  $content = 'index.twig';
  
  if ( Router::varExists( 'url1' ) ) {
      var_dump("url1 & url2 exists");
      $vars = array(
          'isajax' => true,
          'url1' => Router::listenPost( 'url1' ),
          'url2' => Router::listenPost( 'url2' )
      );
      echo "HHHHHHHHHHHHHHHHHHHHHHHHHHHH";
      die();
      $content = 'c2.twig';
  } 
  
  return $app['twig']->render( $content , $vars );
});

$app->run();
