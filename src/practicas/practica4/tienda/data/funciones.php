<?php
function generarTablaProductos($lista){
    ?> 
    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Categoria</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio Unidad</th>
            <th scope="col">Disponibilidad</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $cont = 1;
    foreach($lista as $producto){?>
    <tr>
      <th scope="row"><?=$cont?></th>
      <td><?=$producto["categoria"]?></td>
      <td><?=$producto["nombre"]?></td>
      <td><?=$producto["precio"]?></td>
      <td><?=$producto["disponible"] ? "En stock" : "Agotado"?></td>
    </tr>
    <?$cont++;};
    ?>
    </tbody>
    </table>
    <?php
};

function muestraInfoContacto($nombre, $apellido, $telefono ,$foto){
    ?>
    <p><?=$nombre?> <?=$apellido?></p>
    <p><?=$telefono?></p>
    <img src="<?= ($foto !== "" ? $foto : "https://img.magnific.com/vector-premium/icono-perfil-avatar-predeterminado-imagen-usuario-redes-sociales-icono-avatar-gris-silueta-perfil-blanco-ilustracion-vectorial_561158-3407.jpg?semt=ais_hybrid&w=740&q=80") ?>" alt="Foto de perfil de <?=$nombre?>" width="200">
    <?php
};
?>