

<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>Postuler à <?=$_GET['name']?></title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        
        if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'etudiant')){ 

            $IDstage=$_GET["ID"];
            $name=$_GET["name"];
            $ID_utilisateur=$_SESSION["ID"];
            ?>
        
            <h4 style="text-align: center;">Postuler à l'offre : <?=$name;?> </h4>
            <div id='milieu'>
            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'etudiant' )){ ?>
                
                <form method="POST" action="BDDpostuler.php?user=<?=$ID_utilisateur?>&IDstage=<?=$IDstage?>&next=<?=$next?>" id="my-form" enctype="multipart/form-data">
                        
                    <input type="hidden" name="IDstage" value="<?=$_GET["ID"]?>" />

                    <input type="hidden" name="MAX_FILE_SIZE" value="300000000" />

                    <label for="CV">CV :</label><br>
                    <input id="CV" name="<?=$ID_utilisateur."_".$IDstage."_CV"?>" type="file" required/>

                    <label for="LM">lettre de motivation :</label><br>
                    <input id="LM" name="<?=$ID_utilisateur."_".$IDstage."_LM"?>" type="file" required/>

                    <input type="submit" value="Envoyer le fichier" />

                </div>

            <?php }

        }else{
            echo "<div id='milieu'>Vous n'avez pas les droits pour vous aventurer ici";
            echo "<br>" ;
            echo "<a href='../connexion' class='tab'>Changer d'utilisateur / Se connecter</a></div>";
        }
        
        include('../footer/footer.html') ?>

    </body>

</html>