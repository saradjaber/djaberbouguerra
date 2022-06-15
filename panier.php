<?php
include 'connexion_test.php';
$product_details='';
if(isset($_POST['rechercher']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("SELECT * FROM produit where nom like '%$search%' or categ like '%$search%'");
        $stmt->execute();
        $product_details = $stmt->fetchAll(PDO::FETCH_ASSOC);

         
    }    
}
include'opticien.php';

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


if(isset($_POST['submit'])){


  $nom= $_POST['nom'];
  $price= $_POST['price'];
  $qty= $_POST['qty'];

  foreach ($nom as $key => $value) {
    ajouterProduit($value, $qty[$key], $price[$key]);
    ajoutercommande($value, $qty[$key], $price[$key]);
  }


  $nbProduits = count($nom);
  
  foreach ($nom as $key => $value) {
    //print_r($value);
  }

  $total = $_POST['total'];
  //echo "<br>Total panier : ". $total ;

}


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="panier.css">
  <title>panier</title>
  <link rel="stylesheet" href="home.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <link rel="preconnect" href="https://fonts.gstatic.com"crossorigin>
  <style>
 *{
  padding: 0;
  margin: 0;
}
body{
    font-family: 'Open Sans', sans-serif;
    line-height: 1.5;
}
#header{
  display: flex;
  justify-content: space-between;
  padding: 10px 30px;
  background:#c9c0bb;
}
#header h1{
  font-weight: 300;
  font-family: cursive;
  font-style:oblique 5deg;
  text-transform: capitalize;
}
.recherche{
  top: 50%;
  left: 50%;
  height: 29px;
}
.recherche:hover  .recherche-text{
  width: 150px;
  padding: 0 6px;
}
.recherche:hover .recherche-btn{
  background: #2D567C;
}
.recherche-btn{
  color: black;
  float: left;
  width: 20px;
  height: 20px;
  margin-top: 30px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.4s;
}
.recherche-text{
  border: none;
  background: none;
  float: left;
  color: black;
  font-size: 13px;
  transition: 0.4s;
  line-height: 40px;
  width: 0px;
}
form .bx{
  margin-top:37px;
}
.btn-cnx{
width: 100px;
height: 30px;
background:#2D567C;
border: 2px #2D567C; 
margin-top: 4px ;
color: white;
font-size: 14px;
border-radius: 10px;
cursor: pointer;
}
#barre-menu{
  display: flex;
  align-items: center;
}
#barre-menu li{
  list-style: none;
  padding: 0 30px;
}
#barre-menu li a{
  text-decoration: none;
  font-size: 20px;
  font-weight: 500;
  color: black;
}
#barre-menu li a:hover{
  color: #2D567C;
}
.sub_menu{
  display: none;
}

#barre-menu li:hover .sub_menu{
display: inline;
position: absolute ;
background:#c9c0bb;
margin-top: 26px;
right: 590px;
}
#barre-menu li:hover .sub_menu ul{
display: block;
margin: 12px;
}
#barre-menu li:hover .sub_menu ul li{
width: 120px;
padding: 10px;
margin-top: 10px;
border-bottom: 1px dotted black;
background: transparent;
border-radius: 0;
text-align: left;
}

    .panier {
      width: 100px;
      height: 80px;
      margin: 100px auto;
      background: lavender;
      box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
      border-radius: 6px;
      display: flex;
      flex-direction: column;
    }
    .item {
      padding: 20px 30px;
      height: 50px;
      display: flex;
    }

    .item:nth-child(3) {
      border-top:  1px solid #E1E8EE;
      border-bottom:  1px solid #E1E8EE;
    }

    .delete-btn {
      display: inline-block;
      Cursor: pointer;
    }
    .delete-btn {
      width: 18px;
      height: 17px;
      background: url(&amp;quot;delete-icn.svg&amp;quot;) no-repeat center;
    }
    .image {
      margin-right: 100px;
      width: 20px;
      height: 10px;
      right: 1000px;
    }

    .description {
      padding-top: 10px;
      margin-right: 60px;
      width: 115px;
      width: 500px;
      text-align: center;
      margin: 6px 0;
    }

    .description span {
      display: block;
      font-size: 14px;
      color: #43484D;
      font-weight: 400;
    }

    .description span:first-child {
      margin-bottom: 5px;
    }
    .description span:last-child {
      font-weight: 300;
      margin-top: 8px;
      color: #86939E;
    }
    .quantité input {
      color: black;
      background-color: #FFFFFF;
      width: 100px;
      margin: 10px;
      padding: 2px;
      top: 10px;
    }
    .buttons {
      width: 50px;
      height: 30px;
      background-color: #FFFFFF;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      position: relative;
      left: 600px;
      top: 35px;
    }
    .total-price {
      width: 83px;
      padding-top: 27px;
      text-align: left;
      font-size: 16px;
      color: #43484D;
      font-weight: 300;
    }
    .panier {
      width: 1000px;
      height: auto;
      overflow: hidden;
    }
    .item {
      height: auto;
      flex-wrap: wrap;
      justify-content: center;
    }
    .image img {
      width: 150px;
      left: 0px;
    }
    .quantité{
      left: 0px;
      padding: 20px;
    }
    .description {
      width: 500px;
      text-align: center;
      margin: 6px 0;
    }
    input[type=submit]{
      width: 300px;
      height: 50px;
      border-radius: 8px;
      border: none;
      background-color: #1fb3bf;
      color: white;
      font-weight: bold;
      font-size: 1.5em;
      position: relative;
      left: 400px;
    }
    label[inputZip]{
      background-color: #1fb3bf;
    } 
  </style>

  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/scripts.js"></script>

</head>
<body>

  <section id="header">
    <h1>Sh optique</h1>

    <div>

      <ul id="barre-menu">
        <li><a href="index.php"><i class='bx bx-home'></i>Accueil</a></li>



        <li><a href=""><i class='bx bxl-product-hunt'></i>Produits</i></a>
          <div class="sub_menu">
            <ul>
              <li><a href="Femme.html" name="Catégorie">Femme</a></li>
              <li><a href="homme.html"name="Catégorie">Homme</a></li>
              <li><a href="enfant.html"name="Catégorie">Enfant</a></li>
            </ul>  
          </div>
        </li>
        <li><a href="accessoires.html"><i class='bx bx-glasses'></i>Accessoires</a></li>
        <li><a href="aide.html"><i class='bx bx-help-circle'></i>Aide</a></li>

        <form action="resultat.php" method="post">
        <div  class="recherche" >
               <input class="recherche-text" type="text" name="search" placeholder="écrivez votre recherche">
               <a class="recherche-btn"> <button type="submit" name="rechercher" ></button></a>
               <i class='bx bx-search-alt-2'></i></a>
        </div></form>
       <li><a href="panier.php"><i class="las la-shopping-cart"style="font-size:23px;"></i></a></li>
       <li><a href="login.html"><BUTTON class="btn-cnx">Se connecter</BUTTON></a></li>
     </ul>

   </div>
 </section>  




 <div class="panier">


   <form action="panier.php" method="POST">
    <!-- Produit #1 -->
    <div class="item">

      <div class="image">
        <img src="images/a1.jpg" alt="" name="img" />
      </div>

      <div class="description">
        <span>Lunette de soleil</span>
        <br>
        <span>Gucci</span>
        <br>
        <span>noir</span>
      </div>

      <div class="quantité">

       <input type="hidden" class="name" name="nom[]" value="Gucci">
       <input value=1 name="qty[]" class="qty" price="549" type="number" >
       <input type="hidden" class="price" name="price[]" value="549">

     </div>

     <div class="total-price">549</div>
   </div>
   <hr> 

   <!-- Product #2 -->
   <div class="item">

    <div class="image">
      <img src="images/a2.jpg" alt="" name="img" />
    </div>

    <div class="description">
      <span>lunette de soleil</span>
      <br>
      <span>Gucci</span>
      <br>
      <span>noir</span>
    </div>

    <div class="quantité">
     <input type="hidden" class="name" name="nom[]" value="Gucci">

     <input value=1  name="qty[]" class="qty" price="870" type="number">
     <input type="hidden" class="price" name="price[]" value="870">
   </div>

   <div class="total-price">870</div>
 </div>
 <hr>

 <!-- Product #3 -->
 <div class="item">

  <div class="image">
    <img src="images/a1.jpg" alt="" />
  </div>

  <div class="description">
    <span>lunette de soleil</span>
    <br>
    <span>Gucci</span>
    <br>
    <span>Brown</span>
  </div>

  <div class="quantité">
   <input type="hidden" class="name" name="nom[]" value="Gucci">

   <input value=1 name="qty[]" class="qty" price="349" type="number">
   <input type="hidden" class="price" name="price[]" value="349">

 </div>

 <div class="total-price">349</div>

</div>
<hr>

<label>Somme total a payer</label>
<input readonly="" id="total" name="total" type="text" class="text-warning bg-dark form-control"></input>
<br>
<br>
<br>

<input type="submit" name="submit" class="Achetez"></input>
</form>
</div>

<div class="footer">

        <div class="footer-end1">
          <h4>Nos services</h4><br>
          <a href="rndv.php">rendez vous</a>
          <a href="contact.php">Nous contacter</a>
        </div>
        <div class="footer-end2">
            <form action="resultat.php" method="post">
                <input type="text" name="search"  placeholder="écrivez votre recherche" required>
                <br>
                <button type="submit" name="rechercher" >search</button>   
            </form>
        </div>

        <div class="footer-end3">
          <h4>Contact</h4><br>
          <p>Menadia,Annaba,DZ</p>
         <i class='bx bxl-facebook-circle'></i>
          <i class='bx bxl-instagram'></i>
          <i class='bx bxl-twitter'></i>
          
      </div>
</body>
</html>
