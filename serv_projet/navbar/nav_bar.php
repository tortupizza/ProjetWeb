
  <?php  session_start(); ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      
    <a class="navbar-brand" href="../homepage"><img src="../ss.png" alt="ss" height="90" width="120"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="../homepage">Home <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="#">support</a>
        <a class="nav-link" href="#">contact</a>
        <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][13]==1 or $_SESSION['droits'][22]==1)))){ ?>
        <a class="nav-link" href="../inscription">Inscrire</a>
        <?php } ?>
        
        <?php if(isset($_SESSION['type'])){ ?>
          <a class="nav-link" href="../connexion/Deconnexion.php" >Se déconnecter</a>
        <?php }else{ ?>
          <a class="nav-link" href="../connexion">Se connecter</a>
        <?php } ?>

        <?php if($_SERVER['PHP_SELF']!= '/projet-web/serv_projet/homepage/index.php'){ ?>
          <form method="POST" action="../search/search.php" id="my-form">
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

        <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][13]==1 or $_SESSION['droits'][22]==1)))){ ?>
        <div id='Utilisateur'>
          <?php echo "Utilisateur : ".$_SESSION["user"]."<br>Rôle : ".$_SESSION["type"]."<br><a href='userpage.html'>Profile</a>";
            
            /*if (isset($_SESSION['droits'])){
              echo "<br>Tu es délégué avec ces droits : ".$_SESSION['droits'];
            }*/
          ?>
        <?php } ?>

      </div>
    </div>
  </nav>
<br>