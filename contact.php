<?php 

if(isset($_POST['submit']))
{
  $url = 'https://api.elasticemail.com/v2/email/send';

  $body = "firstName: " . $_POST["firstName"]
  . "<br> lastName: " . $_POST["lastName"]
  . "<br> Email: " . $_POST["email"]
  . "<br> number: " . $_POST["number"]
  . "<br> message: " . $_POST["msg"];
  try{
    $post = array('from' => 'saradjaber01@gmail.com',
      'fromName' => 'Sh Optique',
      'apikey' => '7CAA41ADD15C0507C4371B2FA0EFC7496422D4971818BD8568EB0CACE61D9A5913EAC50C49F2B1A7C3BA6CE4E471C147',
      'subject' => 'Contact fromulaire',
      'to' => 'saradjaber01@gmail.com',
      'bodyHtml' => $body,
      'isTransactional' => false);

    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $post,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
      CURLOPT_SSL_VERIFYPEER => false
    ));
    
    $result=curl_exec ($ch);
    curl_close ($ch);
    
    echo '<script type="text/javascript"> alert("messages sent succesfully")</script>'; 
  }
  catch(Exception $ex){
    echo $ex->getMessage();
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="contact.css">
  <!-- Fontawesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


</head>
<body> 
 <!--header-->
 <section id="header">
    <h1>Sh optique</h1>

    <div> 
        <ul id="barre-menu">
            <li><a href="home.html"><i class='bx bx-home'></i>Accueil</a></li>
            
           
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
            <li><a href="panier.html"><i class="las la-shopping-cart"style="font-size:23px;"></i></a></li>
            <li><a href="login.html"><BUTTON class="btn-cnx">Se connecter</BUTTON></a></li>
        </ul>
    
    </div>
</section>    

 <!--img header-->

 <section id="pa-head" class="hachtage">
  <br><br>
  <h1>#Contact Us</h1>

</section>
<!--fin img header-->

<div class = "contact-section">

  <div class = "contact-info">
    <div>
      <span><i class = "fas fa-mobile-alt"></i></span>
      <span>Appelez-nous</span>
      <span class = "text info">+213 698 920 156</span>
    </div>

    <div>
      <span><i class = "fas fa-envelope-open"></i></span>
      <span>E-mail</span>
      <span class = "text info">saradjaber01@contact.com</span>
    </div>

    <div>
      <span><i class = "fas fa-map-marker-alt"></i></span>
      <span>Magasin</span>
      <span class = "text info">Menadia, Annaba, Dz</span>
    </div>

    <div>
      <span><i class = "fas fa-clock"></i></span>
      <span>Horaires de travail</span>
      <span class = "text info">Dimanche - jeudi (8:30 AM to 6:00 PM)</span>
    </div>
  </div>


  <div class="contact-formulaire">
    <!-- <form onsubmit="sendEmail();reset();return false;"> -->
      <form method="post" >

        <div>
          <input id="firstName" name="firstName" type = "text"  class = "form-contr"  placeholder="Nom"required>
          <input id="lastName" name="lastName" type = "text"   class = "form-contr" placeholder="Prénom"required>
        </div> 

        <div>
          <input id="email" name="email" type = "email" class = "form-contr" placeholder="E-mail" required>
          <input id="number" name="number" type = "text"  class = "form-contr" placeholder="Numéro"required>
        </div>
        <textarea id="msg"  name="msg" rows = "7" placeholder="Message" class = "form-contr"></textarea>
        <input type = "submit"  name = "submit"  class = "btn-send" value = "Envoyer">
      </form>
    </div>
  </div>




  <!-- FAQ -->
  <div class="faq">
    <div class="faq-titre">faq</div><br> Notre équipe est là pour vous aider avec toute demande que vous pourriez avoir, veuillez voir ci-dessous pour le bon contact. <br>
    <br>
    Vous êtes client et vous avez une question concernant vos achats sur sh optique ?
    <p>merci de m'envoyer vos questions a notre email.</p>


    Si vous préférez nous parler?
    <p>composez le +213 698 920 156</p>
  </div>

</div>

<div class = "map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12762.751903553899!2d7.731425369775398!3d36.89781210000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f00777c0eec10d%3A0x9d1e17855270806a!2sOptic!5e0!3m2!1sfr!2sdz!4v1650114362102!5m2!1sfr!2sdz" width="1346" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<!--footer-->
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