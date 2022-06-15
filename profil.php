<?php
session_start();

?>

<html>
<head>
<meta charset="UTF-8"> 
    <title> profil </title>
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<style>
    h1{
        color:black;
        text-align:center;
        padding: 150px ;
        font-size:50px;
    }
    span{
        color:#BC8F8F;
    }
    .btn-log{
        border-color:black;
        background:black;
        color:white;
        margin-left: 620px;
        margin-top:-120px;
        padding-top:10px;
        padding-bottom:10px;
    
    }
    body{
        background:#F5F5DC;
    }
    </style>
<body>
<?php echo "<h1>Bienvenue sur Sh Optique <br><span> " . $_SESSION['nom']." ". $_SESSION['prenom']." </span></h1>"; ?>
<a href="deconnexion.php"><BUTTON class="btn-log">Déconnexion</BUTTON>
</body>
</html>