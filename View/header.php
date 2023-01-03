<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>EcoSphere - Shop</title>
        <meta name="viewport" content="width=device-width">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="View/style/general.css" rel="stylesheet" type="text/css">
        <link href="View/style/header-footer.css" rel="stylesheet" type="text/css">
        <link href="View/style/mainSection.css" rel="stylesheet" type="text/css">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Nunito|Glegoo" rel="stylesheet">
        <!-- Fontawesome -->
        <script src="./View/js/fontawesome-all.min.js"></script>
        <!-- Icon -->
        <link href="./View/img/icon.png" rel="icon">
    </head>
    <body>
    <br />

<header>
    <div id="info-bar">
        <p>My wonderful platform</p>
    </div>

    <div id="banner-bloc">
        <h1>TP Authentification et MVC</h1>
    </div>

    <div id="account_bar">
        <div class="connection center">

        <?php if(isset($_SESSION['user'])) : ?>
            <div>Bonjour <?= $_SESSION['user']['firstName'] ?> </div>
            <a href="./index.php?ctrl=user&action=logout" class="no-deco" title="Logout">
                <i class="fas fa-user"></i>
                <div class="text">Logout</div>
            </a>
            
        <?php else : ?>
            <a href="./index.php?ctrl=user&action=login" class="no-deco" title="Login or create account">
                <i class="fas fa-user mt-3"></i>
                <div class="text">Login</div>
            </a>
        <?php endif ?>
            
        </div>
    </div>

    <ul id="menu_bar">
        <a href="./index.php?ctrl=user&action=usersList" class="no-deco"><li>Liste des utilisateurs</li></a>
        <a href="./" class="no-deco"><li>Le mémoire</li></a>
        <a href="./" class="no-deco"><li>La soutenance</li></a>
        <a href="./" class="no-deco"><li>Le carnet de liaison</li></a>
        <a href="./" class="no-deco"><li>Les espaces de travail</li></a>
    </ul>
</header>