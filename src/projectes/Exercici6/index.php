<?php

session_start();
include("data.php");

if (!isset($_SESSION["saldo"])) {
    $_SESSION["saldo"] = 1000;
}

$ganado = false;
$numero = "-";
$juego = isset($_POST["juego"]) ? $_POST["juego"] : "roigNegre";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $dinero = $_POST["numDinero"];
    $apuesta = $_POST["numApuesta"];

    $_SESSION["saldo"] -= $dinero;

    $fila = array_rand($tapete);
    $col = array_rand($tapete[$fila]);
    $numero = $tapete[$fila][$col];

    if ($_POST["juego"] === "roigNegre") {
        $color = in_array($numero, $rojo) ? "roig" : "negre";
        if ($apuesta === $color) {
            $_SESSION["saldo"] += ($dinero * 2);
            $ganado = true;
        }
    }

    if ($_POST["juego"] === "parellImparell") {
        $par = ($numero % 2 === 0) ? "par" : "impar";
        if ($apuesta === $par) {
            $_SESSION["saldo"] += ($dinero * 2);
            $ganado = true;
        }
    }

    if ($_POST["juego"] === "pasaFalta") {
        $resultadoPasaFalta = in_array($numero, $pasa) ? "pasa" : "falta";
        if ($apuesta === $resultadoPasaFalta) {
            $_SESSION["saldo"] += ($dinero * 2);
            $ganado = true;
        }
    }

    if ($_POST["juego"] === "pleno") {
        $numeroApostado = $_POST["numPleno"];
        if ($numeroApostado == $numero) {
            $_SESSION["saldo"] += ($dinero * 36);
            $ganado = true;
        }
    }

    if ($_POST["juego"] === "docena") {
        if ($apuesta === "1r" && in_array($numero, $docenas["1r"])) {
            $_SESSION["saldo"] += ($dinero * 3);
            $ganado = true;
        }
        if ($apuesta === "2r" && in_array($numero, $docenas["2r"])) {
            $_SESSION["saldo"] += ($dinero * 3);
            $ganado = true; 
        }
        if ($apuesta === "3r" && in_array($numero, $docenas["3r"])) {
            $_SESSION["saldo"] += ($dinero * 3);
            $ganado = true; 
        }
    }

    if ($_POST["juego"] === "columna") {
        if ($apuesta === "1r" && in_array($numero, $columnas[1])) {
            $_SESSION["saldo"] += ($dinero * 3);
            $ganado = true; 
        }
        if ($apuesta === "2r" && in_array($numero, $columnas[2])) {
            $_SESSION["saldo"] += ($dinero * 3);
            $ganado = true; 
        }
        if ($apuesta === "3r" && in_array($numero, $columnas[3])) {
            $_SESSION["saldo"] += ($dinero * 3);
            $ganado = true; 
        }
    }

    if ($_POST["juego"] === "dosDocenas") {
        if ($apuesta === "1r_2r" && (in_array($numero, $docenas["1r"]) || in_array($numero, $docenas["2r"]))) {
            $_SESSION["saldo"] += ($dinero * 1.5);
            $ganado = true; 
        }
        if ($apuesta === "2r_3r" && (in_array($numero, $docenas["2r"]) || in_array($numero, $docenas["3r"]))) {
            $_SESSION["saldo"] += ($dinero * 1.5);
            $ganado = true; 
        }
    }

    if ($_POST["juego"] === "dosColumnas") {
        if ($apuesta === "1c_2c" && (in_array($numero, $columnas[1]) || in_array($numero, $columnas[2]))) {
            $_SESSION["saldo"] += ($dinero * 1.5);
            $ganado = true;
        }
        if ($apuesta === "2c_3c" && (in_array($numero, $columnas[2]) || in_array($numero, $columnas[3]))) {
            $_SESSION["saldo"] += ($dinero * 1.5);
            $ganado = true;
        }
    }

    if ($ganado) {
        $mensaje = "<p class='mensaje victoria'>¡Has ganado!</p>";
    } else {
        $mensaje = "<p class='mensaje derrota'>Has perdido {$dinero}$</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ruleta</title>
</head>
<body>
    <p>Saldo: <?= $_SESSION["saldo"] ?></p>
    <p>Numero random: <?= $numero ?></p>
    <?= $mensaje ?>
    <img src="tapete.png" alt="" width="700">
    <form action="index.php" method="POST">

        <label for="juego">Juego
            <select name="juego" id="juego">
                <option value="roigNegre" <?= ($juego == "roigNegre") ? "selected" : "" ?>>Roig / Negre</option>
                <option value="parellImparell" <?= ($juego == "parellImparell") ? "selected" : "" ?>>Parell / Imparell</option>
                <option value="pasaFalta" <?= ($juego == "pasaFalta") ? "selected" : "" ?>>Pasa / Falta</option>
                <option value="pleno" <?= ($juego == "pleno") ? "selected" : "" ?>>Pleno</option>
                <option value="docena" <?= ($juego == "docena") ? "selected" : "" ?>>Docena</option>
                <option value="columna" <?= ($juego == "columna") ? "selected" : "" ?>>Columna</option>
                <option value="dosDocenas" <?= ($juego == "dosDocenas") ? "selected" : "" ?>>Dues Docenes</option>
                <option value="dosColumnas" <?= ($juego == "dosColumnas") ? "selected" : "" ?>>Dues Columnes</option>
            </select>
        </label>

        <label id="roigNegre">Apuesta
            <select name="numApuesta">
                <option value="roig">Roig</option>
                <option value="negre">Negre</option>
            </select>
        </label>

        <label id="parellImparell">Apuesta
            <select name="numApuesta">
                <option value="par">Par</option>
                <option value="impar">Impar</option>
            </select>
        </label>

        <label id="pasaFalta">Apuesta
            <select name="numApuesta">
                <option value="pasa">Pasa</option>
                <option value="falta">Falta</option>
            </select>
        </label>

        <label id="pleno">Número
            <input type="number" name="numPleno" id="numPleno" min="1" max="36">
        </label>

        <label id="docena">Apuesta
            <select name="numApuesta">
                <option value="1r">1ª Docena</option>
                <option value="2r">2ª Docena</option>
                <option value="3r">3ª Docena</option>
            </select>
        </label>

        <label id="columna">Apuesta
            <select name="numApuesta">
                <option value="1r">1ª Columna</option>
                <option value="2r">2ª Columna</option>
                <option value="3r">3ª Columna</option>
            </select>
        </label>

        <label id="dosDocenas">Apuesta
            <select name="numApuesta">
                <option value="1r_2r">1ª i 2ª Docena</option>
                <option value="2r_3r">2ª i 3ª Docena</option>
            </select>
        </label>

        <label id="dosColumnas">Apuesta
            <select name="numApuesta">
                <option value="1c_2c">1ª i 2ª Columna</option>
                <option value="2c_3c">2ª i 3ª Columna</option>
            </select>
        </label>

        <label for="numDinero">$
            <input type="number" name="numDinero" id="numDinero" min="1" required>
        </label>

        <input type="submit" value="Apostar">
    </form>
    <a href="logout.php">Cerrar Session</a>
    <script type="module" src="script.js"></script>
</body>
</html>