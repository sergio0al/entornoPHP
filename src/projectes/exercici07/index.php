<?php

require_once("config.php");

try{
    $pdo = db();
}catch(PDOException $e){
    die("ERROR DE CONEXIÓN CON BBDDS: " . $e->getMessage());
}



$sql = "SELECT * FROM anuncis";
$stmt = $pdo->query($sql);


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio · Footmarts</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="home">

  <!-- ===== CABECERA ===== -->
    <header class="site-header">
        <div class="inner">
            <a class="logo" href="index.php">FOOT<span>MARTS</span></a>

            <input class="search" placeholder="Buscar una marca">

            <?php if(!isset($_SESSION["usuari_nom"])):?>
            <div class="auth-buttons">
                <a href="login.php" class="btn-login">Entrar</a>
                <a href="register.php" class="btn-register">Registrarse</a>
            </div>
            <?php else: ?>
            <div class="auth-buttons" style="gap: 20px;">
                <p>Hola <span style="font-weight: bold; color:#ef4444;"><?= $_SESSION["usuari_nom"] ?></span>!</p>
                <a href="logout.php" class="btn-login">Cerrar Session</a>
            </div>
            <?php endif ?>
        </div>
    </header>

    <main class="wrap">

   
    <!-- ===== PRODUCTOS ===== -->
    <div class="grid">
      <?php foreach($stmt as $anunci):?>
      <a class="card" href="product.php?id=<?=$anunci["id"]?>">
        <div class="thumb"><img src="<?= $anunci["imatge"] ?? 'images/default.png' ?>" alt="<?= $anunci["titol"] ?>"></div>
        <div class="rate">☆ <?=$anunci["puntuacio"]?></div>
        <b><?=$anunci["titol"]?></b>
        <span class="price"><?=$anunci["preu"]?></span>
      </a>
    <?php endforeach ?>
    </div>
  </main>

  <!-- ===== PIE DE PÁGINA (solo ordenador) ===== -->
  <!-- <footer class="site-footer">
    <div class="inner">
      <div>
        <div class="logo">FOOT<span>MARTS</span></div>
        <p>Las mejores zapatillas, en un solo lugar.</p>
      </div>
      <div><b>Tienda</b><a href="#">Zapatillas</a><a href="#">Camisetas</a><a href="#">Pantalones</a></div>
      <div><b>Ayuda</b><a href="#">Envíos</a><a href="#">Devoluciones</a><a href="#">Contacto</a></div>
      <div><b>Legal</b><a href="#">Términos de servicio</a><a href="#">Privacidad</a><a href="#">Cookies</a></div>
    </div>
  </footer> -->

  <!-- Barra inferior: solo se ve en móvil -->
  <nav class="nav mobile-nav">
    <a href="home.html" class="on">⌂</a>
    <a href="search.html">⌕</a>
    <a href="#">♡</a>
    <a href="login.html">☺</a>
  </nav>
</body>
</html>