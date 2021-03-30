
<?php session_start(); ?>

<header class="navbar navbar-expand-lg navbar-light bg-light">
  
  <a href="../homepage">
    <img src="../ss.png" alt="StageSupp" height="90" width="120">
  </a>
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="../homepage">Accueil<span class="sr-only">(current)</span></a>

      <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][13]==1 or $_SESSION['droits'][22]==1)))){ ?>
      <a class="nav-item nav-link" href="../inscription"> + utilisateur</a>
      <?php } ?>

      <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and $_SESSION['droits'][2]==1))){ ?>
      <a class="nav-item nav-link" href="../entreprise/ajout.php"> + entreprise</a>
      <?php } ?>

      <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and $_SESSION['droits'][8]==1))){ ?>
      <a class="nav-item nav-link" href="../stage/ajout.php"> + stage</a>
      <?php } ?>

      <?php if(isset($_SESSION['type'])){ ?>
        <a class="nav-item nav-link" href="../connexion/Deconnexion.php" >Se déconnecter</a>
      <?php }else{ ?>
        <a class="nav-item nav-link" href="../connexion">Se connecter</a>
      <?php } ?>

      <?php if($_SERVER['PHP_SELF']!= '/projet-web/StageSupp/homepage/index.php'){ ?>
        <form method="GET" action="../search/search.php" id="my-form" class="nav-item">
          <input name="search" class="form-control" type="text" placeholder="Search" aria-label="Search" style="width:50%;margin-left:10%">
            
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
      <?php } ?>

      <?php if(isset($_SESSION['type'])){ ?>
      <div id='Utilisateur' class="nav-item">
        <br>
        <?php echo "Utilisateur : ".$_SESSION["user"]."<br>Rôle : ".$_SESSION["type"]/*."<br><a href='userpage.html'>Profile</a>"*/;
          
          /*if (isset($_SESSION['droits'])){
            echo "<br>Tu es délégué avec ces droits : ".$_SESSION['droits'];
          }*/
        ?>
      </div>
      <?php } ?> 
    </div>
  </div>
</header>

<script src="../assets/jquery/jquery-3.5.1.min.js"></script>
<script src="../assets/bootstrap/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>

<br>