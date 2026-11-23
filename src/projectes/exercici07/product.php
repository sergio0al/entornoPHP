<?php

require_once("config.php");

try {
    $pdo = db();
} catch (PDOException $e) {
    die("ERROR DE CONEXIÓN CON BBDDS: " . $e->getMessage());
}



$id = isset($_GET['id']) ? $_GET['id'] : -1;

$sql = "SELECT * FROM anuncis WHERE id = $id";
$stmt = $pdo->query($sql);
$anunci = $stmt->fetchAll();

if (!$anunci) {
    header("Location: index.php");
    exit;
}


?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $anunci[0]["titol"] ?> · Footmarts</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="product-page">

  <!-- ===== CABECERA ===== -->
  <header class="site-header">
        <div class="inner">
            <a class="logo" href="index.php">FOOT<span>MARTS</span></a>

            <input class="search" placeholder="Buscar una marca">

            <div class="auth-buttons">
            <a href="login.php" class="btn-login">Entrar</a>
            <a href="register.php" class="btn-register">Registrarse</a>
            </div>
        </div>
    </header>


  <main class="wrap">
    
    <!-- Enlace para volver atrás -->
    <a href="index.php" class="back-link">← Volver a productos</a>

    <!-- ===== DETALLE DEL PRODUCTO ===== -->
    <div class="product-detail">
      
      <!-- Columna izquierda: Imagen -->
      <div class="product-gallery">
        <div class="thumb">
          <img src="<?= $anunci[0]["imatge"] ?? 'images/default.png' ?>" alt="<?= $anunci[0]["titol"] ?>">
        </div>
      </div>

      <!-- Columna derecha: Información -->
      <div class="product-info">
        <div class="rate">☆ <?=$anunci[0]["puntuacio"]?></div>
        <h1><?= $anunci[0]["titol"] ?></h1>
        <span class="price"><?= $anunci[0]["preu"] ?> €</span>

        <p class="description">
          <?= $anunci[0]["descripcio_puntuacio"] ?? 'Sin descripción disponible para este artículo.' ?>
        </p>

       

        <!-- Botones de acción -->
        <!-- <div class="actions">
          <button type="button" class="btn-primary">Añadir al carrito 🛍</button>
          <button type="button" class="btn-fav">♡</button>
        </div> -->
      </div>

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
    <a href="index.php">⌂</a>
    <a href="search.html">⌕</a>
    <a href="#">♡</a>
    <a href="login.html">☺</a>
  </nav>

</body>
</html>