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

        <p>Entrer dans la barre de recherche le domaine du stage, l'entreprise ou l'utilisateur recherché</p>
        <form method="GET" action="../search/search.php" id="my-form">
            <input name="search" class="form-control" type="text" placeholder="Search" aria-label="Search" style="width:50%;">
              
            <select name="type" id="typeselector">
                <option value="Stage">Stage</option>
                <option value="Entreprise">Entreprise</option>
                <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][21]==1)))){ ?>
                    <option value="Etudiant">Etudiant</option>
                <?php } ?>
                <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][16]==1)))){ ?>
                    <option value="Delegue">Délégué</option>
                <?php } ?>
                <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or (isset($_SESSION['droits']) and ($_SESSION['droits'][12]==1)))){ ?>
                    <option value="Pilote">Pilote</option>
                <?php } ?>

            </select>

        </form>

    </div>

    <?php include('../footer/footer.html') ?>

</body>