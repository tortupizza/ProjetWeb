<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>Page de suppression de pilote</title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        ?>

        <?php
        if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or (isset($_SESSION['droits']) and ($_SESSION['droits'][15]==1)))){

            if($_SERVER['REQUEST_METHOD']=='POST'){
                $ID_utilisateur=$_POST["ID_utilisateur"];
                try{
                    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
                }catch (PDOException $e) {
                    echo "Connexion echouée : " . $e->getMessage();
                }

                $stmt = $bdd->prepare("DELETE FROM pilote WHERE ID_utilisateur = ? ");
                $stmt->execute(array($ID_utilisateur));
                $stmt = $bdd->prepare("DELETE FROM delegue WHERE ID_utilisateur = ? ");
                $stmt->execute(array($ID_utilisateur));
                $stmt = $bdd->prepare("DELETE FROM utilisateur WHERE ID = ? ");
                $stmt->execute(array($ID_utilisateur));

                header('Location:'.$_GET['next']);
                exit();

            }else{
            
                
                $ID_utilisateur=$_GET["user"];
                $name=$_GET["name"];
                ?>
                <div id='milieu'>

                    <form action="#?next=<?=urlencode($next)?>" method="POST">
                        <input type="hidden" name="ID_utilisateur" value="<?=$ID_utilisateur?>" />
                        <p>Voulez vous vraiment supprimer le pilote <?=$name?> ?</p>
                        <button>
                            Supprimer le pilote.
                        </button>
                    </form>
                    <br>
                    <a href="<?=$_GET['next']?>">Non pauvre fou !</a>
                </div>
                <?php
            }
        
        }else{
            echo "<div id='milieu'>Vous n'avez pas les droits pour vous aventurer ici";
            echo "<br>" ;
            echo "<a href='../connexion' class='tab'>Changer d'utilisateur / Se connecter</a></div>";
        }
        ?>
                
        <?php include('../footer/footer.html') ?>

    </body>

</html>