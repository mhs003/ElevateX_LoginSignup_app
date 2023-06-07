<?php
$route = new Route();

// route for home page
$route->get('/', "HomeController@main");

// routes for login page 
$route->get('/login', "LoginController@_get");
$route->post('/login', "LoginController@_post");

// routes for signup page
$route->get('/signup', "SignupController@_get");
$route->post('/signup', "SignupController@_post");

// route for logout
$route->get('/logout', function($req, $res) {
    Cookie::delete('token');
    redirect('/login');
});


$route->onError(404, function ($msg, $res) {
    $res->send(render('errors.404'));
});
$route->onError(405, function ($msg, $res) {
    $res->send($msg);
});

$route->handleRoutes();