<!DOCTYPE html>

<head>
    <?php
        include("../header.html");
    ?>
    <title>Page d'acceuil</title>
</head>

<body>

    <?php
        include("../navbar/nav_bar.php");
    ?>

    <div id="container">

        <p>Entrer dans la barre de recherche le stage, domaine, ou l'entreprise rechercher</p>
        <form method="POST" action="search.php" id="my-form">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" style="width:50%;">
        </form>

    </div>

    <?php include('../footer/footer.html') ?>

</body>