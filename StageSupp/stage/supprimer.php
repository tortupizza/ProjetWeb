<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>Page d'inscription d'entreprise</title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        ?>

        <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][10]==1)))){


            if($_SERVER['REQUEST_METHOD']=='POST'){
                $ID=$_POST["ID"];
                try{
                    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
                }catch (PDOException $e) {
                    echo "Connexion echouée : " . $e->getMessage();
                }

                $stmt = $bdd->prepare("DELETE FROM offre_de_stage WHERE ID = ? ");
                $stmt->execute(array($ID));
                header('Location:'.$_GET['next']);
                exit();

            }else{

                $ID=$_GET["ID"];
                $name=$_GET["name"];
                ?>
                    <div id='milieu'>
                        <form action="#?next=<?=urlencode($next)?>" method="POST">
                            <input type="hidden" name="ID" value="<?=$ID?>" />
                            <p>Voulez vous vraiment supprimer l'offre de stage <?=$name?> ?</p>
                            <button>
                                Supprimer l'offre de stage.
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