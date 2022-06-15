<?php
session_start();
$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'opticien');

$mail =$_POST['mail'];
$password =$_POST['password'];

$q="SELECT * FROM `client` WHERE mail='$mail'&& password='$password'";
$result = mysqli_query($conn,$q);
$num=mysqli_num_rows($result);

if ($num==1) {
  $r="INSERT INTO compte  (mail,password)VALUES ('$mail','$password')";
    mysqli_query($conn,$r);

  if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['nom'] = $row['nom'];
    $_SESSION['prenom']=$row['prenom'];
		header("Location: profil.php");
  }
}else{
  $erreur ='<h4 style="color:red;">Adresse e-mail ou  Mot de passe est incorrect!</h4>';
}
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  
</head>
<body>
 <div class="login">
   <a href="index.php" class="retour_btn"><img src="images/left-arrow.png">Retour</a>

         <h1 class="login-header">Connexion </h1>
    <form method="post" action="login.php"  >
      
          <div class="inputWithIcon">

           <i class="las la-at" style="font-size:24px;"></i>
           <input type="text"  name="mail" placeholder="Email" value="<?php echo $mail; ?>"required>
          <div class="inputWithIcon">

           <i class="las la-key" style="font-size:24px;"></i>
            <input type="password" name="password" placeholder="Mot de passe" value="<?php echo $password; ?>" required >
         </div>
            <input type="submit" name="submit" value="Connexion">
            <?php if( ! empty( $erreur ) ) echo '    <h4>', $erreur, '</h4>' ?>
           
   </form>
</div>
         <div class="login-more">
             
             <span class="txt1">
               vous n'avez pas de compte?
             </span>

             <a href="inscription.html" class="txt2">
              inscription
             </a>
         </div>
</body>
</html>