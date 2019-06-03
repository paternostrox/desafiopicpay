<?php
// Database configuration
$settings = array(
  'driver'    => 'mysql',
  'host'      => 'localhost',
  'database'  => 'piquepei',
  'username'  => 'root',
  'password'  => '',
  'charset'   => 'latin1',
  'collation' => 'latin1_general_ci',
  'prefix'    => ''
);

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection( $settings );
$capsule->bootEloquent();
