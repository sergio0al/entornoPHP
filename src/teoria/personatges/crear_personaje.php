<?php
require_once 'config.php';

try {
    $pdo = db();
} catch (PDOException $e) {
    die("ERROR DE CONEXIÓN AMB BBDD: " . $e->getMessage());
}

// ----------------------------------------------------
// PROCESSAR EL FORMULARI
// ----------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom        = trim($_POST['nom'] ?? '');
    $descripcio = trim($_POST['descripcio'] ?? '');
    $videojocId = (int) ($_POST['videojoc_id'] ?? 0);

    if ($nom === '' || $videojocId <= 0) {
        echo '<p>Cal indicar el nom i triar un videojoc.</p>';
    } else {
        try {
            $sql = '
                INSERT INTO personatges
                    (usuari_id, videojoc_id, nom, descripcio)
                VALUES
                    (:usuari_id, :videojoc_id, :nom, :descripcio)
            ';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'usuari_id'   => 1,
                'videojoc_id' => $videojocId,
                'nom'         => $nom,
                'descripcio'  => $descripcio,
            ]);

            echo '<p>Personatge creat correctament!</p>';
        } catch (PDOException $e) {
            echo '<p>Error en crear el personatge: '
                . htmlspecialchars($e->getMessage()) . '</p>';
        }
    }
}

// ----------------------------------------------------
// OBTENIR VIDEOJOCS PER AL SELECT
// ----------------------------------------------------
try {
    $stmt = $pdo->query('SELECT id, nom FROM videojocs ORDER BY nom');
    $videojocs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("ERROR EN LLEGIR ELS VIDEOJOCS: " . $e->getMessage());
}
?>
<h1>Crear personatge</h1>

<form method="post">
    <label>
        Nom:
        <input type="text" name="nom" required>
    </label>
    <br><br>

    <label>
        Descripció:
        <textarea name="descripcio"></textarea>
    </label>
    <br><br>

    <label>
        Videojoc:
        <select name="videojoc_id" required>
            <?php foreach ($videojocs as $videojoc): ?>
                <option value="<?= (int) $videojoc['id'] ?>">
                    <?= htmlspecialchars($videojoc['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <br><br>

    <button type="submit">Crear personatge</button>
</form>