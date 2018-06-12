<?php
require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/', "Home#index" );
$router->get('/en', "Home#index" );

$router->get('/admin', "Authentication#login" );
$router->post('/admin', "Authentication#login" );

$router->get('/admin/menu', "AdminMenu#index" );
$router->post('/admin/menu', "AdminMenu#index" );

$router->get('/admin/image', "AdminImage#index" );
$router->post('/admin/image', "AdminImage#index" );





$router->get('/article/:slug-:id', "Post#show")->with('id', '[0-9]+')->with('slug', '([a-z\-0-9]+)');

$router->get('/posts/:id', "Post#show" );
$router->get('/test', "Post#test" );
$router->get('/twig', "Post#twig" );
$router->post('/twig', "Post#twig" );
/*$router->get('/:en', "Post#english" );*/


/*$router->post('/posts/:id', function ($id) {echo 'tous les articles'. $id; print_r($_POST, true);});*/


$router->run();
