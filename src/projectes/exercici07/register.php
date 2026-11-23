<?php

require_once("config.php");

try {
    $pdo = db();
} catch (PDOException $e) {
    die("ERROR DE CONEXIÓN CON BBDDS: " . $e->getMessage());
}




if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"];
    $correu = $_POST["email"];
    $password = $_POST["password"] 
    $password_confirm = $_POST["password_confirm"];

    if ($nom === "" || $correu === "" || $password === "" || $password_confirm === "") {
        $error = "Por favor, rellena todos los campos.";
    } elseif ($password !== $password_confirm) {
        $error = "Las contraseñas no coinciden.";
    } else {
        $sql = "SELECT * FROM usuaris WHERE correu = '$correu'";
        $stmt = $pdo->query($sql);
        $usuari = $stmt->fetch();

        if ($usuari) {
            $error = "Este correo electrónico ya está registrado.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql_insert = "INSERT INTO usuaris (nom, correu, contrasenya, rol) VALUES ('$nom', '$correu', '$hash', 'user')";
            $pdo->query($sql_insert);
            
            $_SESSION["usuari_nom"] = $nom;
            header("Location: index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crear cuenta · Footmarts</title>
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
      <h1>Crear cuenta</h1>
      <p class="auth-sub">Únete a la comunidad de Footmarts</p>

      <?php if ($error !== ""): ?>
        <div class="alert-error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form method="POST" action="register.php" class="auth-form">
        <label>
          <span>Nombre</span>
          <input type="text" name="nom" placeholder="Tu nombre" required value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">
        </label>

        <label>
          <span>Correo electrónico</span>
          <input type="email" name="email" placeholder="tu@correo.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </label>

        <label>
          <span>Contraseña</span>
          <input type="password" name="password" placeholder="••••••••" required>
        </label>

        <label>
          <span>Repetir contraseña</span>
          <input type="password" name="password_confirm" placeholder="••••••••" required>
        </label>

        <button type="submit" class="btn-primary">Registrarse</button>
      </form>

      <p class="auth-footer">
        ¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>
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