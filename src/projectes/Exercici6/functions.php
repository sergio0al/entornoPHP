<?php

function roigNegre($numero, $apuesta, $dinero, $rojo) {
    $ganado = false;
    $color = in_array($numero, $rojo) ? "roig" : "negre";
    if ($apuesta === $color) {
        $_SESSION["saldo"] += ($dinero * 2);
        $ganado = true;
    }
    return $ganado;
}


function parellImparell($numero, $apuesta, $dinero) {
    $ganado = false;
    $par = ($numero % 2 === 0) ? "par" : "impar";
    if ($apuesta === $par) {
        $_SESSION["saldo"] += ($dinero * 2);
        $ganado = true;
    }
    return $ganado;
}


function pasaFalta($numero, $apuesta, $dinero, $pasa) {
    $ganado = false;
    $resultadoPasaFalta = in_array($numero, $pasa) ? "pasa" : "falta";
    if ($apuesta === $resultadoPasaFalta) {
        $_SESSION["saldo"] += ($dinero * 2);
        $ganado = true;
    }
    return $ganado;
}


function pleno($numero, $numeroApostado, $dinero) {
    $ganado = false;
    if ($numeroApostado == $numero) {
        $_SESSION["saldo"] += ($dinero * 36);
        $ganado = true;
    }
    return $ganado;
}


function docena($numero, $apuesta, $dinero, $docenas) {
    $ganado = false;
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
    return $ganado;
}


function columna($numero, $apuesta, $dinero, $columnas) {
    $ganado = false;
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
    return $ganado;
}


function dosDocenas($numero, $apuesta, $dinero, $docenas) {
    $ganado = false;
    if ($apuesta === "1r_2r" && (in_array($numero, $docenas["1r"]) || in_array($numero, $docenas["2r"]))) {
        $_SESSION["saldo"] += ($dinero * 1.5);
        $ganado = true;
    }
    if ($apuesta === "2r_3r" && (in_array($numero, $docenas["2r"]) || in_array($numero, $docenas["3r"]))) {
        $_SESSION["saldo"] += ($dinero * 1.5);
        $ganado = true;
    }
    return $ganado;
}


function dosColumnas($numero, $apuesta, $dinero, $columnas) {
    $ganado = false;
    if ($apuesta === "1c_2c" && (in_array($numero, $columnas[1]) || in_array($numero, $columnas[2]))) {
        $_SESSION["saldo"] += ($dinero * 1.5);
        $ganado = true;
    }
    if ($apuesta === "2c_3c" && (in_array($numero, $columnas[2]) || in_array($numero, $columnas[3]))) {
        $_SESSION["saldo"] += ($dinero * 1.5);
        $ganado = true;
    }
    return $ganado;
}


function transversal($numero, $apuesta, $dinero) {
    $ganado = false;
    $numeros = explode("-", $apuesta);
    if (in_array($numero, $numeros)) {
        $_SESSION["saldo"] += ($dinero * 12);
        $ganado = true;
    }
    return $ganado;
}


function seisena($numero, $apuesta, $dinero) {
    $ganado = false;
    $numeros = explode("-", $apuesta);
    if (in_array($numero, $numeros)) {
        $_SESSION["saldo"] += ($dinero * 6);
        $ganado = true;
    }
    return $ganado;
}


function cuadro($numero, $apuesta, $dinero) {
    $ganado = false;
    $numeros = explode("-", $apuesta);
    if (in_array($numero, $numeros)) {
        $_SESSION["saldo"] += ($dinero * 9);
        $ganado = true;
    }
    return $ganado;
}


function caballo($numero, $apuesta, $dinero) {
    $ganado = false;
    $numeros = explode("-", $apuesta);
    if (in_array($numero, $numeros)) {
        $_SESSION["saldo"] += ($dinero * 18);
        $ganado = true;
    }
    return $ganado;
}
