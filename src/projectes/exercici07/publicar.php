<?php


require_once("config.php");

try{
    $pdo = db();
}catch(PDOException $e){
    die("ERROR DE CONEXIÓN CON BBDDS: " . $e->getMessage());
}


$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["imagen"] === "" || $_POST["titulo"] === "" || $_POST["precio"] === "" || $_POST["categoria"] === ""){
        $error = "Completa todos los campos del formulario";
    }else{
        $imagen = $_POST["imagen"];
        $titulo = $_POST["titulo"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];
        $descripcion = $_POST["descripcion"] ?? "";

        $sql = "INSERT INTO anuncis (titol, descripcio, preu, imatge, categoria_id, puntuacio, descripcio_puntuacio) VALUES ('$titulo', '$descripcion', '$precio', '$imagen', '$categoria', 0, '$descripcion')";
        $stmt = $pdo->query($sql);

        header("Location: index.php");
        exit;

    }
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Publicar artículo · Footmarts</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

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
    <div class="publish-card">
      <h1>Publicar artículo</h1>
      <p class="auth-sub">Sube tu producto y empieza a vender en Footmarts</p>

      <form method="POST" action="publicar.php" class="auth-form publish-form">

        <!-- Imagen (enlace) -->
        <div class="image-preview" id="image-preview">
          <div class="upload-text" id="preview-text">
            <span class="upload-icon">🖼️</span>
            <b>Vista previa de la foto</b>
            <small>Pega el enlace de la imagen abajo</small>
          </div>
        </div>

        <label>
          <span>Enlace de la imagen</span>
          <input type="url" name="imagen" id="imagen" placeholder="https://ejemplo.com/foto.jpg" required>
        </label>

        <!-- Título -->
        <label>
          <span>Título</span>
          <input type="text" name="titulo" placeholder="Ej: Nike Mercurial Vapor 15" required>
        </label>

        <!-- Categoría y precio -->
        <div class="form-row">
          <label>
            <span>Categoría</span>
            <select name="categoria" required>
              <option value="" disabled selected>Selecciona una categoría</option>
              <option value="botas-futbol">Botas de fútbol</option>
              <option value="zapatillas-running">Zapatillas running</option>
              <option value="sneakers">Sneakers</option>
              <option value="ropa-deportiva">Ropa deportiva</option>
              <option value="accesorios">Accesorios</option>
            </select>
          </label>

          <label>
            <span>Precio (€)</span>
            <input type="number" name="precio" placeholder="0.00" min="0" step="0.01" required>
          </label>
        </div>

        <!-- Descripción -->
        <label>
          <span>Descripción</span>
          <textarea name="descripcion" rows="5" placeholder="Estado, características, detalles de envío..." required></textarea>
        </label>

        <button type="submit" class="btn-primary">Publicar artículo</button>
      </form>

      <p class="auth-footer">
        <a href="index.php">← Volver al inicio</a>
      </p>
    </div>
  </main>

  <!-- Barra inferior: solo se ve en móvil -->
  <nav class="nav mobile-nav">
    <a href="index.php">⌂</a>
    <a href="search.html">⌕</a>
    <a href="#">♡</a>
    <a href="login.php">☺</a>
  </nav>

 

  <script>
    const inputImg = document.getElementById('imagen');
    const preview = document.getElementById('image-preview');
    const previewText = document.getElementById('preview-text');

    inputImg.addEventListener('input', function () {
      const url = this.value.trim();
      let img = preview.querySelector('img');

      if (!url) {
        if (img) img.remove();
        previewText.style.display = 'flex';
        return;
      }

      if (!img) {
        img = document.createElement('img');
        img.alt = 'Vista previa';
        img.addEventListener('load', () => { previewText.style.display = 'none'; });
        img.addEventListener('error', () => {
          img.remove();
          previewText.style.display = 'flex';
        });
        preview.appendChild(img);
      }
      img.src = url;
    });
  </script>

</body>
</html>