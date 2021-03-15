<?php $page = 'admin'; ?>
<?php include_once ('includes/header.php'); ?>

<?php 
  if (isset($_GET['option'])){
    if ($_GET['option']=="deconnecter"){
      session_unset();
      session_destroy();
      header("Location: index.php");
      exit();
    }
  }

  if (isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
  }

  $messages = "";
  if (isset($_POST['authentifier'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //login:
   
    include_once ('includes/connecter.php'); 
    $sql=$connexion->prepare("select * from utilisateurs where username=? and password=?");
    $sql->execute(array($username,$password));
    
    $resultats=$sql->fetchAll();
    if (count($resultats)>0){
      $user = $resultats[0];
      $_SESSION["userid"] = $user['id'];
      $_SESSION["username"] = $user['username'];

      header("Location: index.php");
      exit();

    }else{
      $messages = "Votre nom/mot de passe est incorrect";
    }
  }
  
?>

<section class="section">
  <h1>Authentification :</h1><br>
  <div class="container">
    <form action="admin.php" method="POST">
      Nom d'utilisateur : <br>
      <input type="text" name="username" required /><br>
      Mot de passe : <br>
      <input type="password" name="password" required autocomplete="new-password"/><br>
      <span class="messages">&nbsp;<?php echo $messages; ?></span>
      <input class="authentifier-btn" name="authentifier" type="submit" value="Authentifier" />
    </form>
  </div>
</section>

<?php include_once ('includes/footer.php'); ?>
