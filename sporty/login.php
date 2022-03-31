<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="frontend/loginstyle.css" rel="stylesheet">
      <title>Login</title>
</head>
<body>

      <div class="container-fluid">
         <div class="row">
            <div id="leftmain" class="col-md-8">
            <h1><strong > Connectez-vous.</strong></h1>
            <form method="POST" action="">
            <input type ="text" name="email" id="email" placeholder="Adresse e-mail" required><br>
            <input type ="password" name="password" id="mdp" placeholder="Mot de passe" required><br>
            <div id="svn"><a><input type="checkbox" id="ho"> Se souvenir de moi</a><br></div>
            <button name="seConnecter">Se Connecter</button><br>
            <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
            <div id="comm"><a>Vous n'avez pas de compte?</a>
            <a href="inscription.php" id="Commencer"><strong >&nbsp Commencer</strong></a></div>
            </form>
            </div> 

</body>
</html>
<?php
session_start();
require_once('connection.php');
if(isset($_SESSION['email'])){
    header('location:singup.php');
}
$email= $password =$pwd = '';
if(isset($_POST['seConnecter'])){
    $email= $_POST['email'];
    $pwd= $_POST['password'];
    $password = sha1($pwd);
    $sql = "SELECT email,pass,nom,prenom,adresse,telephone FROM client WHERE email ='$email' AND pass='$password'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    
    $_SESSION['idClient']= $row["idClient"];
    $_SESSION['email']= $row["email"];
    $_SESSION['name'] = $row['nom'];
    $_SESSION['Prenom']=$row["prenom"];
    $_SESSION['adresse']=$row['adresse'];
    $_SESSION['telephone'] =$row['telephone'];
    echo "<h1>niiiice<h1>";
    }else{
        $message[]= 'incorrect password or email!';
    }
}
?>