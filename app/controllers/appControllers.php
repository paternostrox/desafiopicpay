<?php

# === api
# ==================================================
use Illuminate\Support\Facades\DB;



$app->get('/users/name', function() use ($app) {

  $name = $app->request->get('n');
  if ( $name ) {
    $results = [];
    $results = Users::where('name','LIKE',"%{$name}%")
    ->orderByRaw("FIELD(id, (SELECT id FROM relevancia1 WHERE id = users.id))")
    ->orderByRaw("FIELD(id, (SELECT id FROM relevancia2 WHERE id = users.id))")
    ->orderBy('name')
    ->get();
    #->paginate(15);
    
    $message = $results->count() . ' results';
    return helpers::jsonResponse(false, $message, $results );
  }

});

$app->get('/users/username', function() use ($app) {

  $username = $app->request->get('u');
  if ( $username ) {
    $results = [];
    $results = Users::where('username','LIKE',"%{$username}%")
    ->orderByRaw("FIELD(id, (SELECT id FROM relevancia1 WHERE id = users.id))")
    ->orderByRaw("FIELD(id, (SELECT id FROM relevancia2 WHERE id = users.id))")
    ->orderBy('name')
    ->get();
    #->paginate(15);

    $message = $results->count() . ' results';
    return helpers::jsonResponse(false, $message, $results );
  }

});

$app->get('/', function() use ($app) {});


