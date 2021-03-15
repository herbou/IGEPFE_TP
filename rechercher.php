<?php $page = 'rechercher'; ?>
<?php include_once ('includes/header.php'); ?>

<!--connecter à la base de données -->
<?php 
  $motcle = $_GET['motcle'];
  $recherche = "%$motcle%";
  include_once ('includes/connecter.php'); 
  $sql=$connexion->prepare("select * from articles where libelle like ? or compagne like ? or categorie like ? order by id desc");
  $sql->execute(array($recherche,$recherche,$recherche));
  
  $articles=$sql->fetchAll();
  
?>

<section class="section">
  <h1>Rechercher des articles : <span class="resultats"> Résultats sur : "<b class="motcle">...<?php echo $motcle; ?>...</b>" </span></h1><br>
  <table>
    <thead>
      <tr>
        <th>#ID</th>
        <th>Libellé</th>
        <th>Quantité</th>
        <th>Echéance</th>
        <th>Compagne</th>
        <th>Categorie</th>
        <th>Prix (DH)</th>
        <?php if ($estAuthentifier) echo '<th>Opérations</th>'; ?>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($articles as $article) {
          $id        = $article["id"];
          $libelle   = $article['libelle'];
          $echeance  = $article['echeance'];
          $quantite  = $article['quantite'];
          $compagne  = $article['compagne'];
          $categorie = $article['categorie'];
          $prix      = $article['prix'];

          $modifierLien = "modifier.php?id=$id&libelle=$libelle&quantite=$quantite&echeance=$echeance&compagne=$compagne&categorie=$categorie&prix=$prix";
          echo '<tr>';
          echo '<td>'.$article["id"].'</td>
                <td>'.$article["libelle"].'</td>
                <td>'.$article["quantite"].'</td>
                <td>'.$article["echeance"].'</td>
                <td>'.$article["compagne"].'</td>
                <td>'.$article["categorie"].'</td>
                <td>'.$article["prix"].'</td>';
                if ($estAuthentifier) 
                  echo '<td><a href="'.$modifierLien.'" class="modifier-btn">Modifier</a> | <a href="supprimer.php?id='.$article["id"].'&libelle='.$article["libelle"].'&confirm=faux" class="supprimer-btn">Supprimer</a></td>';
          echo '<tr>';
        }
      ?>
    </tbody>
  </table>
</section>

<?php include_once ('includes/footer.php'); ?>
