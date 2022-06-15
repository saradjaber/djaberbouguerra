<?php
$servername='localhost';
$username="root";
$password="";
 
try
{
    $con=new PDO("mysql:host=$servername;dbname=opticien",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //On définit le mode d'erreur de PDO sur Exception

}
catch(PDOException $m) //On capture les exceptions si une exception est lancée et on affiche
{
    echo '<br>'.$m->getMessage();
}
     
?>