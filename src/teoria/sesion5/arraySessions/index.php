<?php

session_start();

if(!isset($_SESSION["alumnes"])){
    $_SESSION["alumnes"] = ["Joan", "miguel", "david", "pedro"];
}

?>

<pre>
    <?= var_dump($_SESSION["alumnes"]) ?>
</pre>



<?php

array_push($_SESSION["alumnes"], "Sergio");

?>

<pre>
    <?= var_dump($_SESSION["alumnes"]) ?>
</pre>
