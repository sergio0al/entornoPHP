<?php

require_once("config.php");

try {
    $pdo = db();
} catch (PDOException $e) {
    die("ERROR DE CONEXIÓN CON BBDDS: " . $e->getMessage());
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correu = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($correu === "" || $password === "") {
        $error = "Por favor, rellena todos los campos.";
    } else {
        $sql = "SELECT * FROM usuaris WHERE correu = :correu";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["correu" => $correu]);

        $usuari = $stmt->fetch();

    
        if ($usuari && password_verify($password, $usuari["contrasenya"])) {
            $_SESSION["usuari_id"] = $usuari["id"];
            $_SESSION["usuari_nom"] = $usuari["nom"];
            header("Location: index.php");
            exit;
        } else {
            $error = "Correo electrónico o contraseña incorrectos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar sesión · Footmarts</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">


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
    <div class="auth-card">
      <h1>Iniciar sesión</h1>
      <p class="auth-sub">Accede a tu cuenta de Footmarts</p>

      <?php if ($error !== ""): ?>
        <div class="alert-error"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST" action="login.php" class="auth-form">
        <label>
          <span>Correo electrónico</span>
          <input type="text" name="email" placeholder="tu@correo.com" required value="<?= $_POST['email'] ?? '' ?>">
        </label>

        <label>
          <span>Contraseña</span>
          <input type="password" name="password" placeholder="••••••••" required>
        </label>

        <button type="submit" class="btn-primary">Entrar</button>
      </form>

      <p class="auth-footer">
        ¿Aún no tienes cuenta? <a href="register.php">Regístrate aquí</a>
      </p>
    </div>
  </main>




  <!-- Barra inferior: solo se ve en móvil -->
  <nav class="nav mobile-nav">
    <a href="index.php">⌂</a>
    <a href="search.html">⌕</a>
    <a href="#">♡</a>
    <a href="login.php" class="on">☺</a>
  </nav>

</body>
</html>