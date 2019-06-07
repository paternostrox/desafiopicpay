<?php

if($_POST["method"] == "name") {
	header("Location: http://localhost/pp/users/name?n=" . $_POST["searchstr"]);
}
else {
	header("Location: http://localhost/pp/users/username?u=" . $_POST["searchstr"]);
}

exit;
?>
