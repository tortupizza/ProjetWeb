<?php

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}

$ID_utilisateur=$_GET["user"];
$IDstage=$_GET["IDstage"];

$uploaddir = '../fichierutilisateur/offredestage/';
$uploadfileCV = $uploaddir.$ID_utilisateur."_".$IDstage."_CV".basename($_FILES[$ID_utilisateur."_".$IDstage."_CV"]['name']);
$uploadfileLM = $uploaddir.$ID_utilisateur."_".$IDstage."_LM".basename($_FILES[$ID_utilisateur."_".$IDstage."_LM"]['name']);

if(move_uploaded_file($_FILES[$ID_utilisateur."_".$IDstage."_CV"]['tmp_name'],$uploadfileCV)){
    echo "bravo !";
    if(move_uploaded_file($_FILES[$ID_utilisateur."_".$IDstage."_LM"]['tmp_name'],$uploadfileLM)){
        echo "bravo !";

        $data = array($IDstage,$ID_utilisateur,1,$uploadfileCV,$uploadfileLM);
        $stmt = $bdd->prepare("INSERT INTO candidature (ID_Offre_de_stage, ID_Etudiant, etape, CV ,lettre_de_motivation) VALUES (?,?,?,?,?);");
        $stmt->execute($data);
        header('Location:'.$_GET['next']);
        exit();

    }else{
        echo "pas bravo";
        print_r($_FILES);
    }
}else{
    echo "pas bravo";
    print_r($_FILES);
}