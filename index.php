<?php
// démarrage session
session_start();
// connection bdd
$bdd = new PDO('mysql:host=localhost;dbname=ibeacon', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Site ecommerce Wome">
        <meta name="author" content="Wome developers">
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <script src="controller/formverify.js"></script>
        <title>Wome</title>
    </head>
    <body>
        <?php
        require_once 'model/inscription.php'; // page inscription
        ?>
    </body>
</html>