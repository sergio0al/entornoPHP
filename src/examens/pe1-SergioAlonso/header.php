<header class="cap">
    <div class="contenidor navegacio">
    <a class="marca" href="index.php">TRIVIAL Pe1</a>
    <nav class="enllacos">
        <a href="index.php">Inici</a><?php if(!isset($_SESSION["usuari"])):?><a href="registre.php">Registre</a
        ><a href="login.php">Login</a><? else: ?><a href="joc.php">Joc</a
        ><? endif ?><?php if(isset($_SESSION["usuario"]) && $_SESSION["rol"] === "admin"): ?><a href="admin.php">Administració</a><? endif ?>
    </nav>
    </div>
</header>