<html>
<body>

<form action="search.php" method="post">
Buscar: <input type="text" name="searchstr"><br>
  <br>
  <input type="radio" name="method" value="name"> Por nome
  <input type="radio" name="method" value="username"> Por username<br>
  <br>
<input type="submit" value="Busca">
</form>

</body>
</html>

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
