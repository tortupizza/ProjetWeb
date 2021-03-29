<?php

function sqltry($stmt){
    if (!$stmt) {
        echo "erreur de requete : $req";
        die;
    }
}

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}
    if(isset($_POST["Confiance"]) and $_POST["Confiance"] != 0){
        $confiance=$_POST["Confiance"];
    }else{
        $confiance=NULL;
    }

    if(isset($_POST["NoteEtudiant"]) and $_POST["NoteEtudiant"] != 0){
        $NoteEtudiant=$_POST["NoteEtudiant"];
    }else{
        $NoteEtudiant=NULL;
    }
    
    $data = array($_POST["Nom"],$_POST["SA"],$_POST["Localité"],$_POST["StagiaireCESI"],$confiance,$NoteEtudiant);
    $stmt = $bdd->prepare("INSERT INTO entreprise (Nom, Secteur_d_activite, Localite, Stagiaire_CESI_acceptes,Confiance_du_pilote,Note) VALUES (?,?,?,?,?,?);");
    $stmt->execute($data);
    sqltry($stmt);
 
    header('Location: ../homepage');
    exit();
?>