<?php

# === api
# ==================================================

$app->get('/api/users', function() use ($app) {

  $results = [];
  $name = $app->request->get('name');
  if ( $name ) {
    $results = Users::where('name','LIKE',"%{$name}%")
                      ->get();
  } else {
    $results = Users::all();
  }
  $message = $results->count() . ' results';
  return helpers::jsonResponse(false, $message, $results );

});
