<?php $page = 'ajouter'; ?>
<?php include_once ('includes/header.php'); ?>

<?php 
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method == "POST"){ // click sur enregistrer
    $libelle   = $_POST['libelle'];
    $echeance  = $_POST['echeance'];
    $quantite  = $_POST['quantite'];
    $compagne  = $_POST['compagne'];
    $categorie = $_POST['categorie'];
    $prix      = $_POST['prix'];

    include_once ('includes/connecter.php'); 
    $sql=$connexion->prepare("insert into articles(libelle,echeance,quantite,compagne,categorie,prix) values(?,?,?,?,?,?)");
    $sql->execute(array($libelle,$echeance,$quantite,$compagne,$categorie,$prix));

    header("Location: index.php");
    exit();
  }
  
?>


<section class="section">
  <h1>Ajouter un article :</h1><br>
  <form action="ajouter.php" method="POST">
    <div class="form">
      <div>
        Libellé : <br>
        <input type="text" name="libelle" required /><br>
        Echeance : <br>
        <input type="date" name="echeance" required /><br>
        Quantité : <br>
        <input type="number" name="quantite" min="1" required /><br>
      </div>
      <div>
        Compagne : <br>
        <input type="text" name="compagne" required /><br>
        Categorie : <br>
        <input type="text" name="categorie" required /><br>
        Prix : <br>
        <input type="number" step="0.01" name="prix" min="1" required /><br>
      </div>
    </div>
    <br>
    <a href="index.php" class="btn">Annuler</a>
    <input type="submit" class="btn enregistrer" value="Enregistrer" />
  </form>
</section>

<?php include_once ('includes/footer.php'); ?>
