<?php $page = 'supprimer'; ?>
<?php include_once ('includes/header.php'); ?>

<?php 
  $confirm = $_GET['confirm'];
  $id = $_GET['id'];

  if ($confirm == "vrai"){
    include_once ('includes/connecter.php'); 
    $sql=$connexion->prepare("delete from articles where id=?");
    $sql->execute(array($id));

    header("Location: index.php");
    exit();
  }
  
?>

<section class="section">
  <h1>Confirmation de supression :</h1><br>
  êtes-vous sûr de vouloir supprimer l'article <b>"<?php echo $_GET['libelle']; ?>"</b> ?<br><br>
  <a href="supprimer.php?id=<?php echo $id; ?>&confirm=vrai" class="btn supprimer">Supprimer</a>
  <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn">Annuler</a>
</section>

<?php include_once ('includes/footer.php'); ?>
