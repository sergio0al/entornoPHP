<?php

session_start();

if($_SESSION["rol"] === "admin"){
    unset($_SESSION["preguntas"][$_GET["id"]-1]);
    array_values($_SESSION["preguntas"]);
    header("Location: admin.php");
    exit;
}else{
    header("Location: index.php");
    exit;
}


?>