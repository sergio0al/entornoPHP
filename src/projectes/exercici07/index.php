<?php

require_once("config.php");

try{
    $pdo = db();
}catch(PDOException $e){
    die("ERROR DE CONEXIÓN CON BBDDS: " . $e->getMessage());
}




$sql = "SELECT * FROM anuncis";
$stmt = $pdo->query($sql);
$productes = $stmt->fetchAll();




$sql_categories= "SELECT * FROM categories";
$stmt = $pdo->query($sql_categories);
$categories = $stmt->fetchAll();



if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["filtre"]) && $_GET["filtre"] !== ""){
  $filtreId = $_GET["filtre"];
  $sql_filtre = "SELECT * FROM anuncis WHERE categoria_id = :filtreId";
  $stmt = $pdo->prepare($sql_filtre);
  $stmt->execute(["filtreId" => $filtreId,]);
  $productes = $stmt->fetchAll();

};


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
                <a href="publicar.php" class="btn-login">+</a>
            </div>
            <?php endif ?>
        </div>
    </header>

    <main class="wrap">

    <form method="get" class="filter">
    <select name="filtre" onchange="this.form.submit()">
      <option value="">Todas las marcas</option>
      <?php foreach($categories as $categorie): ?>
        <option value="<?=$categorie["id"]?>" <?php if(isset($_GET["filtre"]) && $_GET["filtre"] == $categorie["id"]):?> selected <?php endif ?>>
          <?= $categorie["nom"] ?>
        </option>
      <?php endforeach ?>
    </select>
    </form>
   
    <!-- ===== PRODUCTOS ===== -->
    <div class="grid">
      <?php foreach($productes as $anunci):?>
      <?php 

      $user_id = $anunci["usuari_id"];
      $sql_usuari = "SELECT * FROM usuaris WHERE id = :user_id";
      $stmt = $pdo->prepare($sql_usuari);
      $stmt->execute(["user_id" => $user_id]);
      $user = $stmt->fetch();
        
      $categoria_id = $anunci["categoria_id"];
      $sql_categoria = "SELECT * FROM categories WHERE id = :categoria";
      $stmt = $pdo->prepare($sql_categoria);
      $stmt->execute(["categoria" => $categoria_id]);
      $categoria = $stmt->fetch();
      
      ?>
      <a class="card" href="product.php?id=<?=$anunci["id"]?>">
        <div class="thumb"><img src="<?= $anunci["imatge"] ?? 'images/default.png' ?>" alt="<?= $anunci["titol"] ?>"></div>
        <div class="rate">☆ <?=$anunci["puntuacio"]?></div>
        <p><?=$anunci["titol"]?></p>
        <p><?= $user["nom"]?></p>
        <p><?= $categoria["nom"]?></p>
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