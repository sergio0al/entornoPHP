<?php

session_start();

unset($_SESSION["usuari_id"]);
unset($_SESSION["usuari_nom"]);

header("Location: index.php");
exit;

?>