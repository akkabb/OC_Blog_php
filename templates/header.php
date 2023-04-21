<header>
    <a href="http://localhost/monpremierblogenphp/index.php" class="logo_link"><img src="img/logo.png" alt="logo" class="logo"></a>
    <nav class="menu">
        <ul class="menu_list">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=list">Articles</a></li>
            <?php if (isset($_SESSION['username'])){?>
            <li><a href="index.php?action=logout">Se deconnecter de <?= $_SESSION['username']?></a></li>
            <?php } else {?>
            <li><a href="index.php?action=login">Se connecter</a></li>
            <?php } ?>
            <li><a href="index.php?action=register">S'inscrire</a></li>
        </ul>
    </nav>
</header>