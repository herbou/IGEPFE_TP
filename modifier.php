<?php $page = 'modifier'; ?>
<?php include_once ('includes/header.php'); ?>

<?php 
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method == "POST"){ // click sur mise à jour
    $id        = $_POST['id'];
    $libelle   = $_POST['libelle'];
    $echeance  = $_POST['echeance'];
    $quantite  = $_POST['quantite'];
    $compagne  = $_POST['compagne'];
    $categorie = $_POST['categorie'];
    $prix      = $_POST['prix'];

    include_once ('includes/connecter.php'); 
    $sql=$connexion->prepare("update articles set libelle=? , echeance=? , quantite=? , compagne=? , categorie=? , prix=? where id=? ");
    $sql->execute(array($libelle,$echeance,$quantite,$compagne,$categorie,$prix,$id));

    header("Location: index.php");
    exit();
  }
  
  //else :
  $id        = $_GET['id'];
  $libelle   = $_GET['libelle'];
  $echeance  = $_GET['echeance'];
  $quantite  = $_GET['quantite'];
  $compagne  = $_GET['compagne'];
  $categorie = $_GET['categorie'];
  $prix      = $_GET['prix'];
  
?>


<section class="section">
  <h1>Modifier un article :</h1><br>
  <form action="modifier.php" method="POST">
    <div class="form">
      <input type="hidden" value="<?php echo $id; ?>" name="id" />
      <div>
        Libellé : <br>
        <input type="text" name="libelle" value="<?php echo $libelle; ?>" required /><br>
        Echeance : <br>
        <input type="date" name="echeance" value="<?php echo $echeance; ?>" required /><br>
        Quantité : <br>
        <input type="number" name="quantite" min="1" value="<?php echo $quantite; ?>" required /><br>
      </div>
      <div>
        Compagne : <br>
        <input type="text" name="compagne" value="<?php echo $compagne; ?>" required /><br>
        Categorie : <br>
        <input type="text" name="categorie" value="<?php echo $categorie; ?>" required /><br>
        Prix : <br>
        <input type="number" step="0.01" name="prix" min="1" value="<?php echo $prix; ?>" required /><br>
      </div>
    </div>
    <br>
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn">Annuler</a>
    <input type="submit" class="btn enregistrer" value="Mise à jour" />
  </form>
</section>

<?php include_once ('includes/footer.php'); ?>
