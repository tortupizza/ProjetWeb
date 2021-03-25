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

        <p>Entrer dans la barre de recherche le stage, l'entreprise ou l'utilisateur recherché</p>
        <form method="POST" action="search.php" id="my-form">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" style="width:50%;">
              
            <select name="type" id="typeselector">
                <option value="Stage">Stage</option>
                <option value="Entreprise">Entreprise</option>
                <option value="Etudiant">Etudiant</option>
                <option value="Pilote">Pilote</option>
            </select>

        </form>

    </div>

    <?php include('../footer/footer.html') ?>

</body>