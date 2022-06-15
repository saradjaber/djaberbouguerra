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



if(isset($_GET['id'])){
 $produit=getProduitById($_GET['id']);
}
//maintenant on peut ajouter des produits au panier
if(isset($_POST['submit'])){
  $nom= $_POST['nom'];
  $price= $_POST['price'];
  $qty= $_POST['qty'];

  foreach ($nom as $key => $value) {
    ajouterProduit($value, $qty[$key], $price[$key]);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>

  <title>Sh optique </title>

  <link rel="stylesheet" href="home.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="prod.css">
</head>
<body>

  
<section id="header">
    <h1>Sh optique</h1>

    <div>

      <ul id="barre-menu">
        <li><a href="home.html"><i class='bx bx-home'></i>Accueil</a></li>



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
       <li><a href="panier.html"><i class="las la-shopping-cart"style="font-size:23px;"></i></a></li>
       <li><a href="login.html"><BUTTON class="btn-cnx">Se connecter</BUTTON></a></li>
     </ul>

   </div>

         
    
</section>      
   
    
     

<div class="detailproduit">

          <div class="produit">
           <div class="row col-12 mt-4">
            <div class="card col-8 offset-2">
              <?php foreach ($produit as $prod): ?>
               <div class="img"> <img src="images/<?php echo $prod['image']; ?>" class="card-img-top" alt="<?php echo $prod['nom']?>">
              </div>
                <div class="card-body">
                  <h5 class="card-title" name="produit"><?php echo $prod['nom']?></h5>
                <h5>
                  <p class="card-text" name="produit">Catégorie: <?php echo $prod['categ']?></p>
              </h5>
                <hr>
                <div class="star-rating">
 					<button class="star">&#9734</button>
 					<button class="star">&#9734</button>
 					<button class="star">&#9734</button>
 					<button class="star">&#9734</button>
 					<button class="star">&#9734</button>
 				</div>
                <ul class="list-group list-group-flush">
                  <h3>
                  <li class="list-group-item"><?php echo $prod['prix']?>DA</li>
              </h3>
              <h3>
              <li class="list-group-item"> description:

              </h3></li>
                  <p><?php echo $prod['description']?></p>
                </ul>
               
              <?php endforeach ?>


            <br>
            
				<input type="radio"  name="rad1" onclick="img(0)"checked>avec correction
				<input type="radio"  name="rad1"onclick="img(1)">sans correction </br>
				<div>
          <br>
                    <input type="file"  name="ordonnance" id="myimg"/><br><br>
				</div>
			<h3>chosir votre taille:</h3>
<label class="checkbox" for="myCheckBoxId">
  <input class="checkbox__box" type="checkbox" name="checkboxname" id="checkboxid">
  <div class="Checkbox1"></div> S </label>
   <label class="checkbox" for="myCheckBoxId">
  <input class="checkbox__box" type="checkbox" name="checkboxname" id="checkboxid">
  <div class="Checkbox1"></div>M</label>
   <label class="checkbox" for="myCheckBoxId">
  <input class="checkbox__box" type="checkbox" name="checkboxname" id="checkboxid">
  <div class="Checkbox1"></div>L</label>
 
   
            <p>
 			<ul> <a href="aide.html">guide des tailles</a></ul>
 		</p>

			        <input value=1 name="qty[]" class="qty" type="number">
		         <br>
           </section> 
 		<br><br><br>
 		
           	<div class="buttons">
 				<button type="submit" name="submit" class="fas da-shopping-cart"></i>ADD TO CART</button>
 					
 			</div>


              </div>

              </div>
              </div>
              </div>
              </div>
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