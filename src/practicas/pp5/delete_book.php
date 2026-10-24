<?php

session_start();
unset($_SESSION["libros"][$_GET["id"]]);
header("Location: home.php");

?>