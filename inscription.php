<?php

$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'opticien');
if(isset($_POST['submit'])){

$nom =$_POST['nom'];
$prenom=$_POST['prenom'];
$mail =$_POST['mail'];
$tel =$_POST['tel'];
$adresse =$_POST['adresse'];
$password =$_POST['password'];

$q="SELECT * FROM `client` WHERE mail='$mail'";
$result = mysqli_query($conn,$q);
$num=mysqli_num_rows($result); 

if ($num==1) {
    echo"<h1>mail déja reserver</h1>";
}else{
    $r="INSERT INTO client  (nom,prenom,mail,tel,adresse,password)VALUES ('$nom','$prenom','$mail','$tel','$adresse','$password')";
    mysqli_query($conn,$r);
    header('location:login.html');
}}
?>
