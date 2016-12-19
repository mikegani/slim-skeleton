<?php

/**
 * @Author: mikegani
 * @Date:   2016-03-21 15:53:24
 * @Last Modified by:   mg5
 * @Last Modified time: 2016-12-13 18:28:46
 */

/*
Routes
controller needs to be registered in dependency.php
*/

// API ROUTES - RETURN JSON OUTPUT
$app->group('/api/v1', function () use ($app) {
    $app->group('/token', function () {
      $this->get('[/]', 'Controller\Token:generateToken')->setName('generateToken');
      $this->get('/{id:[0-9]+}', 'Controller\Home:getUser');
    });
});
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// END OF API ROUTING //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


// SERVER SIDE RENDERING ROUTES - RETURN HTML
$app->get('/', 'Controller\Home:dispatch');
