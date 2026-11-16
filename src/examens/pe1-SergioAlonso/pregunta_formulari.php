<?php

session_start();

$editar = false;
$id = null;

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $nou = [ 
  "id" => count($_SESSION["preguntas"]), 
  "categoria" => $_POST["categoria"], 
  "pregunta" => $_POST["pregunta"], 
  "opcions" => [ $_POST["opcio_0"], $_POST["opcio_1"], $_POST["opcio_2"], $_POST["opcio_3"]], 
  "correcta" => $_POST["correcta"]
  ];
  
  array_push($_SESSION["preguntas"], $nou);

  array_values($_SESSION["preguntas"]);
  header("Location: admin.php");
  exit;

}else if($_SERVER["REQUEST_METHOD"] === "GET"){
  if(isset($_GET[$id])){
    $editar = true;
    $id = ($_GET["id"] - 1);
  }
}




?>


<!doctype html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pregunta</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
        <!-- AQUEST HEADER HA DE SER REUTILITZABLE -->

    <?php include("./header.php"); ?>


    <main class="contenidor">
      <section class="panell ample-mig">
        <h1>Crear o editar pregunta</h1>
        <p class="subtitol">
          El mateix formulari pot servir per a les dues operacions.
        </p>
        <form action="#" method="post">
          <label class="camp"
            >Categoria<select name="categoria" value="" required>
              <option value="">Selecciona una categoria</option>
              <option value="">Geografia</option>
              <option>Història</option>
              <option>Ciència i natura</option>
              <option>Art i cultura</option>
            </select></label
          ><label class="camp"
            >Enunciat<textarea
              name="pregunta"
              required
              placeholder="Escriu l'enunciat..."
              value="<?= $editar ? $_SESSION["preguntas"][$id]["pregunta"] : "" ?>"
            ></textarea></label
          ><label class="camp"
            >Opció A<input type="text" name="opcio_0" value="<?= $editar ? $_SESSION["preguntas"][$id]["opcions"][0] : "" ?>" required /></label
          ><label class="camp"
            >Opció B<input type="text" name="opcio_1" value="<?= $editar ? $_SESSION["preguntas"][$id]["opcions"][1] : "" ?>" required /></label
          ><label class="camp"
            >Opció C<input type="text" name="opcio_2" value="<?= $editar ? $_SESSION["preguntas"][$id]["opcions"][2] : "" ?>" required /></label
          ><label class="camp"
            >Opció D<input type="text" name="opcio_3" value="<?= $editar ? $_SESSION["preguntas"][$id]["opcions"][3] : "" ?>" required /></label
          ><label class="camp"
            >Resposta correcta<select name="correcta" value="<?= $editar ? $_SESSION["preguntas"][$id]["correcta"] : "" ?>" required>
              <option value="0">A</option>
              <option value="1">B</option>
              <option value="2">C</option>
              <option value="3">D</option>
            </select></label
          >
          <?php if($editar): ?>
          <input type="text" hidden name="id" value="<?=$id?>">
          <? endif ?>
          <div class="accions">
            <button class="btn" type="submit">Guardar pregunta</button
            ><a class="btn btn-sec" href="admin.php">Cancel·lar</a>
          </div>
        </form>
      </section>
    </main>
    <footer class="peu">AQUEST FOOTER HA DE SER REUTILITZABLE</footer>
  </body>
</html>
