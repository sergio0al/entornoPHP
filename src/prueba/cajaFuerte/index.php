<?php
$resultado = null;

if ($_POST) {
    $numero = (int) $_POST['numero'];

    $texto = implode(",", [$_POST['r1'], $_POST['r2']]);
    $respuestas = explode(",", $texto);

    $total = $numero;
    foreach ($respuestas as $r) {
        $total += strlen(trim($r));
    }

    $resultado = $total;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Acertijos</title>
<style>
    * { box-sizing: border-box; }

    body {
        margin: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Segoe UI", Arial, sans-serif;
        background: linear-gradient(135deg, #1e1e2f, #2d2b55);
        color: #fff;
    }

    form {
        background: #2a2a40;
        padding: 30px;
        width: 100%;
        max-width: 420px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    h1 {
        margin: 0 0 20px;
        text-align: center;
        color: #7cf29c;
    }

    label {
        display: block;
        margin: 18px 0 6px;
        font-size: 15px;
        line-height: 1.4;
    }

    input {
        width: 100%;
        padding: 12px;
        border: 2px solid transparent;
        border-radius: 8px;
        background: #3a3a5a;
        color: #fff;
        font-size: 16px;
        outline: none;
        transition: border-color 0.2s;
    }

    input:focus { border-color: #7cf29c; }

    button {
        width: 100%;
        margin-top: 24px;
        padding: 14px;
        border: none;
        border-radius: 8px;
        background: #7cf29c;
        color: #1e1e2f;
        font-size: 17px;
        font-weight: bold;
        cursor: pointer;
        transition: transform 0.1s, background 0.2s;
    }

    button:hover { background: #5fe383; }
    button:active { transform: scale(0.97); }

    .resultado {
        margin-top: 20px;
        padding: 14px;
        text-align: center;
        font-size: 20px;
        background: #1e1e2f;
        border: 2px dashed #7cf29c;
        border-radius: 8px;
    }
</style>
</head>
<body>

<form method="post">
    <h1>🧩 Acertijos</h1>

    <label>Número</label>
    <input type="number" name="numero" required>

    <label>Soy nuevo en GTA y vivo en una película. ¿Quién soy?</label>
    <input type="text" name="r1" required>

    <label>Mmmmmmm. Ciudad, si te acercas explota, ¿cómo me llaman?</label>
    <input type="text" name="r2" required>

    <button type="submit">Enviar</button>

    <?php if ($resultado !== null): ?>
        <div class="resultado">Resultado: <strong><?= $resultado ?></strong></div>
    <?php endif; ?>
</form>

</body>
</html>