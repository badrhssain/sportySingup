<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscripton</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
          <div id="leftmain" class="col-md-6">
     

          <h1>Bonjour<strong > Inscrivez-vous.</strong></h1>
          <form action="" method="POST">
          <input type ="text" name="email" id="email" placeholder="Adresse e-mail"required><br>
          <input type ="text" name="nom"  id="nom" placeholder="Nom"required>
          <input type ="text" name="prenom"  id="prenom" placeholder="Prénom"required><br>
          <input type ="text" name="adresse"  id="adr" placeholder="Adresse"required><br>
          <input type ="text" name="telephone"  id="num" placeholder=" Numéro de tel"required><br>
          <input type ="text" name="password"  id="mdp" placeholder="Mot de passe"required><br>
          <div id="svn"><a><input type="checkbox"  id="ho"> Se souvenir de moi</a><br></div>
          <button type="submit" name="submit" id="submit">S'inscrire</button><br>
        </form>
    </div>
</div>

</body>
</html>
<?php
include("connection.php");
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $checkEmail = "SELECT email FROM client WHERE email ='$email'";
    $Result = mysqli_query($db, $checkEmail);
    if(mysqli_num_rows($Result)>0){
        echo 'cet compte est exists';

    }else{
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adresse = $_POST["adresse"];
        $number = $_POST["telephone"];
        $email = $_POST["email"];
        $password= sha1($_POST['password']);

        $detailClients = "INSERT INTO client (idClient, nom, prenom, adresse, telephone, email, pass)
        VALUES ( null,'$nom','$prenom','$adresse','$number','$email','$password'
        );";
        mysqli_query($db,$detailClients);
    }
}
?>