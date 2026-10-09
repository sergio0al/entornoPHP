<?php

 $projectes = [
    [
    "nom" => "Landing restaurant 3", 
    "tecnologia" => "HTML",
    "horas" => 32,
    "estat" => "Pendent"
    ],
    [
    "nom" => "WEB Porfolio 2", 
    "tecnologia" => "HTML",
    "horas" => 32,
    "estat" => "En proces"
    ],
    [
    "nom" => "Landing Sergio 1", 
    "tecnologia" => "HTML",
    "horas" => 32,
    "estat" => "Pendent"
    ],
];


echo "<pre>";
var_dump($projectes);
echo "</pre>";

echo $projectes[0]["nom"];




foreach($projectes as $id => $projecte):?>
<div>
    <h1><?= $projecte["nom"] ?></h1>
    <p><?=$id?></p>
    <p><?=$projecte["tecnologia"]?></p>
    <a href="index.php?id=<?=$id?>"><?=$projecte["nom"]?></a>
    <button><?= $projecte["horas"] ?></button>
</div>
<? endforeach ?>