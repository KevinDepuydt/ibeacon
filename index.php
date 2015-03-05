<?php
// démarrage session
session_start();
// connection bdd
$bdd = new PDO('mysql:host=localhost;dbname=ibeacon', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// page du site
$routing = [
    'home' => [
        'controller' => 'home',
        'path' => 'view/home.php',
        'secure' => false
    ],
    'inscription' => [
        'controller' => 'subscription',
        'path' => 'model/subscription.php',
        'secure' => false
    ],
    'login' => [
        'controller' => 'login',
        'path' => 'model/login.php',
        'secure' => false
    ],
    'product' => [
        'controller' => 'product',
        'path' => 'model/product.php',
        'secure' => true
    ],
    '404' => [
        'controller' => '404',
        'path' => 'view/404.php',
        'secure' => false
    ]
];

// verifions la pertinance de la page en GET
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (!isset($routing[$page])) {
        // la page n'existe pas
        $page = '404';
    }
} else {
    //page par defaut
    $page = 'home';
}

//check pour la sécurité : si la page à la clée 'secure' est true et que $_SESSION['name'] n'est pas définis
if ($routing[$page]['secure'] === true && !isset($_SESSION['user'])) {
    //redirection
    header("location: index.php?page=login");
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Site ecommerce Wome">
        <meta name="author" content="Wome developers">
        <link rel="stylesheet" type="text/css" href="view/css/reset.css">
        <link rel="stylesheet" type="text/css" href="view/css/style.css">
        <script src="controller/jquery-2.1.3.min.js"></script>
        <script src="controller/formverify.js"></script>
        <script src="controller/script.js"></script>
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
        <title>Wome</title>
    </head>
    <body>
    <div id="navigationes">
        <div id="navigation">
            <a href="?page=home" id="logo"><img src="view/images/logo.png" alt="Logo"></a>
            <div id="menu">
                <a href="?page=home#discover" class="element">Discover</a>
                <a href="?page=home" class="element">Community</a>
                <a href="?page=home" class="element">Help</a>
                <a href="?page=home" class="element">About</a>
                <a href="?page=inscription" class="element">Inscription</a>
                <a href="?page=login" class="element">Connexion</a>
            </div>
        </div>
    </div>



        <?php
        // Charge la page demandée;
        $link = $routing[$page]['path'];
        if (file_exists($link)) {
            require $link;
        } else {
            echo 'File is missing';
        }
        ?>

        <div id="footer">

        </div>
    </body>
</html>