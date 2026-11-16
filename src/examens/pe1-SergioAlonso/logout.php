<?php
session_start();

if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&  isset( $_POST["accio"] ) && $_POST["accio"] === "reiniciar"
) {

    // Només ADMIN
    if (
        ! isset( $_SESSION["usuari_actiu"] ) ||
        $_SESSION["usuari_actiu"]["rol"] !== "admin"
    ) {
        header( "Location: login.php" );
        exit;
    }

    // DESTROY
    $_SESSION = [];
    session_destroy();

} else {

    // Logout normal. Només destruim els calaixos (UNSET)
    unset( $_SESSION["usuari"] );
    unset( $_SESSION["rol"] );

}

header( "Location: index.php" );
exit;