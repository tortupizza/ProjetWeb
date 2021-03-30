<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}

    $nbdroits = 35;
    $droits = "1";
    for($i = 2 ; $i<=$nbdroits ; $i++){
        $droit = "SFx".$i;
        if(isset($_POST[$droit])){

            if ($_POST[$droit]){
                $droits.="1";
            }else{
                $droits.="0";
            }
        }else{
            $droits.="0";
        }
    }

    $data=array($droits,$_POST["ID"]);
    $stmt = $bdd->prepare("UPDATE delegue SET droits = ? WHERE ID_Utilisateur = ?;");
    $stmt->execute($data);
    header('Location:'.$_GET['next']);
    exit();

?>