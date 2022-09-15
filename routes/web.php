<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

/**
 * Customers Web Routes
 */
$router->get('/customers', 'CustomerController@index');
$router->get('/customer/{id}', 'CustomerController@show');
$router->post('/customer', 'CustomerController@store');
$router->put('/customer/{id}', 'CustomerController@update');
$router->delete('/customer/{id}', 'CustomerController@destroy');

/**
 * Predios Web Routes
 */
$router->get('/predios', 'PredioController@index');
$router->get('/predio/{id}', 'PredioController@show');
$router->post('/predio', 'PredioController@store');
$router->put('/predio/{id}', 'PredioController@update');
$router->delete('/predio/{id}', 'PredioController@destroy');

/**
 * Sala Web Routes
 */
$router->get('/salas', 'SalaController@index');
$router->get('/sala/{id}', 'SalaController@show');
$router->post('/sala', 'SalaController@store');
$router->put('/sala/{id}', 'SalaController@update');
$router->delete('/sala/{id}', 'SalaController@destroy');

/**
 * Type Sala Web Routes
 */
$router->get('/types-salas', 'TypeSalaController@index');
$router->get('/type-sala/{id}', 'TypeSalaController@show');
$router->post('/type-sala', 'TypeSalaController@store');
$router->put('/type-sala/{id}', 'TypeSalaController@update');
$router->delete('/type-sala/{id}', 'TypeSalaController@destroy');

/**
 * PhotoGallery Web Routes
 */
$router->get('/photo-galleries', 'PhotoGalleryController@index');
$router->get('/photo-gallery/{id}', 'PhotoGalleryController@show');
$router->get('/photo-gallery/{id}/collection', 'PhotoGalleryController@getImagesCollection');
$router->post('/photo-gallery', 'PhotoGalleryController@store');
$router->put('/photo-gallery/{id}', 'PhotoGalleryController@update');
$router->delete('/photo-gallery/{id}', 'PhotoGalleryController@destroy');

/**
 * Images Collection Routes
 */
$router->get('/image/{id}', 'ImageController@show');
$router->post('/image', 'ImageController@store');
$router->put('/image/{id}', 'ImageController@update');
$router->delete('/image/{id}', 'ImageController@destroy');
