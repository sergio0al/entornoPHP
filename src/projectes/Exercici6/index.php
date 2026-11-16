<?php

session_start();
include("data.php");
include("functions.php");

if (!isset($_SESSION["saldo"]) || !isset($_SESSION["historial"])) {
    $_SESSION["saldo"] = 1000;
    $_SESSION["historial"] = [];
}


$ganado = false;
$numero = "";
$mensaje = "";   
$juego = isset($_POST["juego"]) ? $_POST["juego"] : "roigNegre";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $dinero = $_POST["numDinero"];
    $apuesta = $_POST["numApuesta_" . $juego] ?? null;

    $_SESSION["saldo"] -= $dinero;

    $fila = array_rand($tapete);
    $col = array_rand($tapete[$fila]);
    $numero = $tapete[$fila][$col];


    

    switch ($juego) {
        case "roigNegre":
            $ganado = roigNegre($numero, $apuesta, $dinero, $rojo);
            break;

        case "parellImparell":
            $ganado = parellImparell($numero, $apuesta, $dinero);
            break;

        case "pasaFalta":
            $ganado = pasaFalta($numero, $apuesta, $dinero, $pasa);
            break;

        case "pleno":
            $ganado = pleno($numero, $_POST["numPleno"], $dinero);
            break;

        case "docena":
            $ganado = docena($numero, $apuesta, $dinero, $docenas);
            break;

        case "columna":
            $ganado = columna($numero, $apuesta, $dinero, $columnas);
            break;

        case "dosDocenas":
            $ganado = dosDocenas($numero, $apuesta, $dinero, $docenas);
            break;

        case "dosColumnas":
            $ganado = dosColumnas($numero, $apuesta, $dinero, $columnas);
            break;

        case "transversal":
            $ganado = transversal($numero, $apuesta, $dinero);
            break;

        case "seisena":
            $ganado = seisena($numero, $apuesta, $dinero);
            break;

        case "cuadro":
            $ganado = cuadro($numero, $apuesta, $dinero);
            break;

        case "caballo":
            $ganado = caballo($numero, $apuesta, $dinero);
            break;
    }


    if ($ganado) {
        $mensaje = "<p class='mensaje victoria'>¡Has ganado " . $dinero . "$! Ha salido el {$numero}.</p>";
    } else {
        $mensaje = "<p class='mensaje derrota'>Has perdido {$dinero}$. Ha salido el {$numero}.</p>";
    }

    
    $apuestaMostrada = ($juego === "pleno") ? $_POST["numPleno"] : $apuesta;

    $_SESSION["historial"][] = [
        "color"   => in_array($numero, $rojo) ? "roig" : "negre",
        "numero"  => $numero,
        "juego"   => $juego,
        "apuesta" => $apuestaMostrada,
        "dinero"  => $dinero,
        "ganado"  => $ganado,
    ];

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
                <option value="transversal" <?= ($juego == "transversal") ? "selected" : "" ?>>Transversal</option>
                <option value="seisena" <?= ($juego == "seisena") ? "selected" : "" ?>>Seisena</option>
                <option value="cuadro" <?= ($juego == "cuadro") ? "selected" : "" ?>>Cuadro</option>
                <option value="caballo" <?= ($juego == "caballo") ? "selected" : "" ?>>Caballo</option>
            </select>
        </label>

        <label id="roigNegre">Apuesta
            <select name="numApuesta_roigNegre">
                <option value="roig">Roig</option>
                <option value="negre">Negre</option>
            </select>
        </label>

        <label id="parellImparell">Apuesta
            <select name="numApuesta_parellImparell">
                <option value="par">Par</option>
                <option value="impar">Impar</option>
            </select>
        </label>

        <label id="pasaFalta">Apuesta
            <select name="numApuesta_pasaFalta">
                <option value="pasa">Pasa</option>
                <option value="falta">Falta</option>
            </select>
        </label>

        <label id="pleno">Número
            <input type="number" name="numPleno" id="numPleno" min="1" max="36">
        </label>

        <label id="docena">Apuesta
            <select name="numApuesta_docena">
                <option value="1r">1ª Docena</option>
                <option value="2r">2ª Docena</option>
                <option value="3r">3ª Docena</option>
            </select>
        </label>

        <label id="columna">Apuesta
            <select name="numApuesta_columna">
                <option value="1r">1ª Columna</option>
                <option value="2r">2ª Columna</option>
                <option value="3r">3ª Columna</option>
            </select>
        </label>

        <label id="dosDocenas">Apuesta
            <select name="numApuesta_dosDocenas">
                <option value="1r_2r">1ª i 2ª Docena</option>
                <option value="2r_3r">2ª i 3ª Docena</option>
            </select>
        </label>

        <label id="dosColumnas">Apuesta
            <select name="numApuesta_dosColumnas">
                <option value="1c_2c">1ª i 2ª Columna</option>
                <option value="2c_3c">2ª i 3ª Columna</option>
            </select>
        </label>

        <label id="transversal">Apuesta
            <select name="numApuesta_transversal">
                <?php for ($i = 1; $i <= 34; $i += 3) { ?>
                    <option value="<?= $i ?>-<?= $i + 1 ?>-<?= $i + 2 ?>"><?= $i ?>, <?= $i + 1 ?>, <?= $i + 2 ?></option>
                <?php } ?>
            </select>
        </label>

        <label id="seisena">Apuesta
            <select name="numApuesta_seisena">
                <?php for ($i = 1; $i <= 31; $i += 3) { ?>
                    <option value="<?= $i ?>-<?= $i + 1 ?>-<?= $i + 2 ?>-<?= $i + 3 ?>-<?= $i + 4 ?>-<?= $i + 5 ?>"><?= $i ?> al <?= $i + 5 ?></option>
                <?php } ?>
            </select>
        </label>

        <label id="cuadro">Apuesta
            <select name="numApuesta_cuadro">
                <?php for ($i = 1; $i <= 33; $i++) { ?>
                    <?php if ($i % 3 != 0) { ?>
                        <option value="<?= $i ?>-<?= $i + 1 ?>-<?= $i + 3 ?>-<?= $i + 4 ?>"><?= $i ?>, <?= $i + 1 ?>, <?= $i + 3 ?>, <?= $i + 4 ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </label>

        <label id="caballo">Apuesta
            <select name="numApuesta_caballo">
                <?php for ($i = 1; $i <= 35; $i++) { ?>
                    <?php if ($i % 3 != 0) { ?>
                        <option value="<?= $i ?>-<?= $i + 1 ?>"><?= $i ?> y <?= $i + 1 ?></option>
                    <?php } ?>
                <?php } ?>
                <?php for ($i = 1; $i <= 33; $i++) { ?>
                    <option value="<?= $i ?>-<?= $i + 3 ?>"><?= $i ?> y <?= $i + 3 ?></option>
                <?php } ?>
            </select>
        </label>

        <label for="numDinero">$
            <input type="number" name="numDinero" id="numDinero" min="1" required>
        </label>
        

        <input type="submit" value="Apostar">
         <div>
        <h2>Historial</h2>
        <div id="containerHistorial">
            <?php foreach ($_SESSION["historial"] as $bola): ?>
                <div class="itemHistorial">
                    <div id="esfera" class="<?= $bola["color"] ?>">
                        <p><?= $bola["numero"] ?></p>
                    </div>
                    <small class="juego"><?= $nombresJuego[$bola["juego"]] ?? "" ?></small>
                    <small>Apuesta: <?= $bola["apuesta"]?></small>
                    <small><?= $bola["dinero"] ?>$</small>
                    <small><?= $bola["ganado"] ? "Ganado" : " Perdido" ?></small>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    </form>
    <a href="logout.php" id="limpiarSession">Limpiar Session</a>
    <script type="module" src="script.js"></script>
</body>
</html>