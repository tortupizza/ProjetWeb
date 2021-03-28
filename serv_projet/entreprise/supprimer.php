<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $ID=$_POST["ID"];
    try{
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
    }catch (PDOException $e) {
        echo "Connexion echouée : " . $e->getMessage();
    }

    $stmt = $bdd->prepare("DELETE FROM entreprise WHERE ID = ? ");
    $stmt->execute(array($ID));
    header('Location:'.$_GET['next']);
    exit();

}else{

    $ID=$_GET["ID"];
    $name=$_GET["name"];
    ?>

    <form action="#?next=<?=urlencode($next)?>" method="POST">
        <input type="hidden" name="ID" value="<?=$ID?>" />
            <p>Voulez vous vraiment supprimer l'entreprise <?=$name?> ?</p>
            <button>
                Supprimer l'entreprise.
            </button>
    </form>

    <a href="<?=$_GET['next']?>">Non pauvre fou !</a>

    <?php
}

?>