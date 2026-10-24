<?php
session_start();

$usuarios = [
    ["username" => "admin", "password" => "adminpass", "role" => "admin"],
    ["username" => "reader", "password" => "readerpass", "role" => "lector"]
];

$error = "";

if(!isset($_SESSION["usuarios"])){
    $_SESSION["usuarios"] = $usuarios;
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST["nombre"] ? $_POST["nombre"] : "";
    $password = $_POST["password"] ? $_POST["password"] : "";
    $foto = $_POST["foto"] ? $_POST["foto"] : "https://static.vecteezy.com/system/resources/thumbnails/048/334/475/small/a-person-icon-on-a-transparent-background-png.png";
    $cifrado = password_hash($password, PASSWORD_DEFAULT);

    foreach($_SESSION["usuarios"] as $usuario){
        if($usuario["username"] === $nombre && password_verify($usuario["password"], $cifrado)){
            $_SESSION["nombre"] = $usuario["username"];
            $_SESSION["rol"] = $usuario["role"];
            $_SESSION["foto"] = $foto;
            header("Location: home.php");
            exit;
        }else{
            $error = "!Usuario o contraseña incorrectos!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Usa el archivo de estilo que acompaña a la estructura de HTML proporcionada -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section>
        <!-- Elementos de fondo decorativos -->
        <?php for ($i = 0; $i < 180; $i++): ?>
            <span></span>
        <?php endfor; ?>

        <!-- Sección de inicio de sesión -->
        <div class="signin">
            <div class="content text-center">
                <h2>Inicia sesión</h2>
                <form method="post" action="login.php">
                    <div class="inputBox ">
                        <input class="p-2 m-2" placeholder="Username" type="text" name="nombre" required>
                    </div>
                    <div class="inputBox ">
                        <input class="p-2 m-2" placeholder="Password" type="password" name="password" required>
                    </div>
                    <div class="inputBox ">
                        <input class="p-2 m-2" placeholder="Foto de perfil" type="text" name="foto">
                       
                    </div>
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    
                    <div class="inputBox">
                        <input class="bg-warning btn mt-2" type="submit" value="Iniciar">
                    </div>
                </form>
            </div>
        </div>
    </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>