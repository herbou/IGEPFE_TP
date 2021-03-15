<?php session_start(); ?>
<?php $estAuthentifier = isset($_SESSION["username"]); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Gestion des articles</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/general.css">
  <link rel="stylesheet" type="text/css" href="css/<?php echo $page; ?>.css">
</head>

<body>

  <header>
    <h2 class="logo"><a href="index.php">Gestion des articles</a></h2>
    <?php 
      if ($estAuthentifier) 
        echo '<a href="ajouter.php" class="btn ajouter-btn">+ Ajouter article</a>'; 
    ?>
    <form action="rechercher.php" method="GET">
      <input type="text" name="motcle" placeholder="Article à rechercher..." required />
      <input type="submit" value="Rechercher" />
    </form>
    <?php 
      if ($estAuthentifier)
        echo '<a href="admin.php?option=deconnecter" class="auth">Se déconnecter</a>';
      else
        echo '<a href="admin.php?option=connecter" class="auth">Connexion</a>';
    ?>
  </header>