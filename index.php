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
include('opticien.php');

$produit = getAllProduit();

if(isset($_GET['id'])){
  $produit= getProduitById($_GET['id']);
}

?> 

<html>
<head>
<meta charset="UTF-8"> 
    <title>Sh optique </title>
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <style type="text/css">
<?php include 'home.css'; ?>
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

#page-home{
  background-image: url("images/profil.jpg");
  height: 80vh;
  width: 88.1%;
  background-size: cover;
  padding: 0 80px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
}
#page-home h1{
  font-family: 'Staatliches', cursive;
}
#page-home h3{
  color: #2D567C;
  font-family: 'Abril Fatface', cursive;
}
#page-home h5{
  font-family: 'Staatliches', cursive;
}
.btn{
  display: inline-block;
    margin-top: 1rem;
    border-radius: 5rem;
    background: black;
    color: white;
    font-size: 1rem;
    padding: 0.5rem 1.5rem;
    cursor: pointer;
  }
.produits-title {
  margin: 3rem 0 7rem 0;
  text-align: center;
}
.produits-title h1 {
  font-size: 2rem;
  display: inline-block;
  position: relative;
  z-index: 0;
}

.produits-title h1::after {
  content: "";
  position: absolute;
  left: 50%;
  bottom: -20%;
  transform: translate(-50%, -50%);
  background-color: #DEB887;
  width: 50%;
  height: 0.4rem;
  z-index: 1;
}

.produit{
  display:flex;
  flex-wrap:wrap;
  justify-content:center;
  align-items:center;
}
.produit .card{
  margin-right: 40px;
  cursor:pointer;
  margin-bottom:40px;
}
.produit .card img{
  width: 380px;
}
.produit :hover{
  color: #DEB887;
}
.card{
  flex-basis: 25%;
  transition: transform 0.4s;
}
.card:hover{
  transform: translateY(-8px);
}
.promotions{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left:40px;
    margin-top: 4%;
  }
.promotions .banner-pro{
    background:linear-gradient(-85deg, #9e9e9e  34%, lightgray 29.1%, lightgray  68%, #9e9e9e 68.1%);
    border-radius: 5px;
    margin-right:40px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    box-shadow: 0 2px 1px #0005;
    overflow: hidden;
}

.promotions .banner .img1-pro{
    flex:1 1 190px;
    padding:0px;
    text-align: center;
}

.promotions .banner-pro .img1-pro img{
    width:70%;
}

.promotions .banner-pro .text-pro{
    flex:1 1 250px;
    text-align: center;
    padding:20px;
    text-transform: uppercase;
}

.promotions .banner-pro .text-pro span{
    color:black;
    font-size: 23px;
}

.promotions .banner-pro .text-pro h3{
    color:#2D567C;
    font-size: 28px;
}

.promotions .banner-pro .text-pro p{
    color:black;
    font-size: 22px;
    padding:9px 0;
}

.promotions .banner-pro .text-pro .btn{
    display: block;
    height:30px;
    width:150px;
    line-height: 38px;
    background: #2D567C;
    color:white;
    margin:4.5px auto;
    text-decoration: none;
}

.promotions .banner-pro .img2-pro{
    position: relative;
    bottom: -59px;
    padding:1px;
    flex:1 1 220px;
}
.promotions .banner-pro .img2-pro img{
    width:100%;
}

.avis{
  width: 90%;
  margin-left: 27px;
  margin-top: 18px;
  text-align: center;
}
.avis-titre h1 {
  font-size: 2rem;
  display: inline-block;
  position: relative;
  z-index: 0;
}

.avis-titre h1::after {
  content: "";
  position: absolute;
  left: 50%;
  bottom: -20%;
  transform: translate(-50%, -50%);
  background-color: #DEB887;
  width: 50%;
  height: 0.4rem;
  z-index: 1;
}
.avis-titre h1::after {
  position: absolute;
  left: 50%;
  bottom: -20%;
  transform: translate(-52%, -50%);
  background-color:#DEB887;
  width: 50%;
  height: 0.4rem;
  z-index: 1;
}
.avis-cadr{
  flex-basis: 33%;
  margin-bottom: 7%;
  text-align: center;
  padding: 48px;
  border-radius: 32px;
  margin-left: 28px;
  margin-top: 1px;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  background: #ffffd4;
}
.avis-cadr img{
  height: 65px;
  margin-left: 5px;
  margin-right: 30px;
  border-radius: 50%;
}
.avis-cadr p{
  padding: 0;
  text-align: center;
}
.avis-cadr h3{
  margin-top: 15px;
  text-align: center;
}
#options{
  margin-left: 50px;
    max-width: 90%;
     padding: 52px 0;
}
.options-list-item{
    text-align: center;
}
.options-list-item img{
    margin-bottom: 20px;

}
.options-list-item h3{
    font-weight: 570;
    font-size: 18px;
}
.options-list-item .options-text{
    max-width: 311px;
    margin-right: auto;
    margin-left: auto;
}
.options-lists{
    justify-content: space-evenly;
    display: flex;
}
.footer {
  margin-top: 10px;
  width: 70%;
  padding: 29px 15%;
  background: #c9c0bb;
  color: black;
 display: flex;
 text-transform: capitalize;
}
.footer-end1 :hover{
    color: #2D567C;
    padding-left: 10px;
}

.footer div{
  text-align: center;
  }
.footer-end2{
  flex-grow: 5;
  padding-left: 10px;
}
.footer-end2:hover{
    color: #2D567C;
    padding-left: 10px;
}
.footer-end3:hover{
    color: #2D567C;
    padding-left: 10px;
}
.footer div h4{
  font-weight: 670;
  margin-top: 40px;
  letter-spacing: 3px;
}
.footer-end1 a{
  display: block;
  text-decoration: none;
  color: black;
  margin-bottom: 8px;
}
form input{
  width: 410px;
  height: 45px;
  border-radius: 5px;
  text-align: center;
  margin-top: 21px;
  margin-bottom: 26px;
  outline: none;
  border: none;
}
.footer-end2 button{
  background: lightgray;
  border: 2px solid #fff;
  color: #fff;
  border-radius: 30px;
  padding: 10px 35px;
  font-size: 17px;
  cursor: pointer;
}
</style>
</head>

<body>

<section id="header">
    <h1>Sh optique</h1>

    <div> 
        <ul id="barre-menu">
            <li><a href="index.php"><i class='bx bx-home'></i>Accueil</a></li>
            
           
            <li><a href=""><i class='bx bxl-product-hunt'></i>Categorie</i></a>
              <div class="sub_menu">
                <ul>
                <li><a href="Femme.html">Femme</a></li>
                <li><a href="homme.html">Homme</a></li>
                <li><a href="enfant.html">Enfant</a></li>
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


<section id="page-home">

    <h1>Bienvenue sur notre site web</h1><br>
    <h3>Pour prendre soin de tes yeux</h3><br>
    <h5>Nouvelle collection pour femme</h5>
     <a href="Femme.html" class="btn">shop </a>
</section>

<section class="produits">

  <div class="produits-title">
        <h1>Meilleures ventes</h1>
      </div>

    <div class="produit">
   <form action="prod.php" method="POST">
      <div class="produit">
       <?php
       if (is_array($produit) )
       {
         foreach($produit as $produit){
           print' <div class="col-3" "margin-right:10px"> 
           <div class="card" >
           <img src="images/'.$produit['image'].'"  alt"'.$produit['nom'].'" >
           <div class="card-body">
           <h5 class="card-title">'.$produit['nom'].'</h4>
           <p class="card-text">'.$produit['prix'].'</p>
           <a href="prod.php?id='.$produit ['id_produit'].'"><span> Detail</span> </a> 
           </div>
           </div>
           </div>';   
         }
        }
         ?>
       </form>
      </section>

<div class="promotions">

    <div class="banner-pro">
        <div class="img1-pro">
            <img src="images/banner1.jpg" alt="">
        </div>

        <div class="text-pro">
            <span>Des promotions jusqu'a 30%</span>
            <h3>Offre du jour</h3>
            <p>offer termine apres 3 jours</p>
            <a href="homme.html" class="btn">voir offer</a>
        </div>

        <div class="img2-pro">
            <img src="images/counter-img2.jpg" alt="">
        </div>
    </div>
</div>

<section class="avis">
   <div class="avis-titre">
        <h1>Avis de nos clients</h1>
      </div>

    <div class="promotions">
    <div class="avis-cadr">
        <img src="images/user-1.jpg"> <br>
        <div>
            <p>j'ai adoré utiliser ce site,il est très pratique Très contente de mes lunettes </p>
            <h3>Juliot Norston</h3>
        </div>
    </div>
    <div class="avis-cadr">
        <img src="images/user-2.png"><br>
        <div>
            <p>Trés bonne idée pour moi car maintenant je peux acheté sans déplacer</p>
            <h3>Louis Marie</h3>
        </div>
    </div>
     
     <div class="avis-cadr">
        <img src="images/user-4.jpg"> <br>
        <div>
            <p>Des le premier jour de l'utilisation de ce site j'ai adoré trés simple et trés rapide</p>
            <h3>Richard Cypher</h3>
        </div>
    </div>
    </div>
</section>

<section id = "options">
               
                    <div class = "options-lists">

                        <div class = "options-list-item">
                            <img src = "images/credit-card.png" alt = "">
                            <h3>Paiment </h3>
                            <p class = "options-text">tu as la possibilité de Paiment a la livraison</p>
                        </div>

                        <div class = "options-list-item">
                            <img src = "images/return.png" alt = "">
                            <h3>Retours & Echanges</h3>
                            <p class = "options-text">tu as la possibilité de retourner, pour demander un remboursement ou un échange</p>
                        </div>

                        <div class = "options-list-item">
                            <img src = "images/delivery-truck.png" alt = "">
                            <h3> La livraison a lieu sous 48h à 72h</h3>
                            <p class = "options-text">Nous livrons actuellement dans la majorité des  wilayas</p>
                        </div>

                    </div>              
</section>

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