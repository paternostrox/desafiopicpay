<?php

# === constants
# ==================================================
define("_APP", dirname(__FILE__) . '/app');

# === slim
# ==================================================
require 'vendor/autoload.php';
$app = new \Slim\Slim(array(
  'debug' => true
));

# === config
# ==================================================
require_once _APP . '/config/database.php';

# === helpers
# ==================================================
require_once _APP . '/helpers/appHelpers.php';

# === models
# ==================================================
require_once _APP . "/models/appModels.php";

# === controllers
# ==================================================
require_once _APP . "/controllers/appControllers.php";

# === run slim
$app->run();
