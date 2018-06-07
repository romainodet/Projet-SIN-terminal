<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top" style="background-color:#00AFE9!important;">
    
      <a class="navbar-brand" href="index.php"><?php print $titre_site; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
       


        <li class="nav-item <?php if (strpos($_SERVER[ 'PHP_SELF'], 'index.php')) echo 'active';?>">
        <a class="nav-link" href="index.php">Accueil</a>
      </li>
      <li class="nav-item <?php if (strpos($_SERVER[ 'PHP_SELF'], 'contact.php')) echo 'active';?>">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>

      
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $donnees_users['genre'] . " ".$donnees_users['prenom'] . " " .$donnees_users['nom']; ?>
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item <?php if (strpos($_SERVER[ 'PHP_SELF'], 'my_account.php')) echo 'active';?>" href="my_account.php">Mon compte</a>
          <a class="dropdown-item" href="logout.php">Déconnexion</a>
          
          
        </div>

      </li>
</ul>
      </div>
    </nav>