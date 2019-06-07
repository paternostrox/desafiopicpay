<?php

# === api
# ==================================================

$app->get('/users/name', function() use ($app) {

  $name = $app->request->get('n');
  if ( $name ) {
    $results = [];
    $nameres = Users::where('name','LIKE',"%{$name}%")
                      ->get();
    $message = $nameres->count() . ' results';
    return helpers::jsonResponse(false, $message, $results );
  }

});

$app->get('/users/username', function() use ($app) {

  $username = $app->request->get('u');
  if ( $username ) {
    $results = [];
    $results = Users::where('username','LIKE',"%{$username}%")
                      ->get();
    $message = $results->count() . ' results';
    return helpers::jsonResponse(false, $message, $results );
  }

});

$app->get('/', function() use ($app) {});


