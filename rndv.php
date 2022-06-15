<?php
$connection=mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'opticien');

if(isset($_POST['submit']))
{
    if (isset($_POST['service'])||($_POST['date_heure'])||($_POST['message']||$nom=$_POST['nom']||$prenom=$_POST['prenom'])) 
    {   $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $service= $_POST['service'];
        $date_heure=$_POST['date_heure'];
        $message= $_POST['message'];

        if(!empty($service)||($date_heure)||($message)||($nom)||($prenom)){
            $q ="SELECT * FROM client WHERE nom='$nom'&& prenom='$prenom'";
         $result = mysqli_query($connection,$q);
         $num=mysqli_num_rows($result);
         if ($num==1) {
            $query="INSERT INTO rendez_vous(service,date_heure,message) VALUES ('$service','$date_heure','$message')";

            if (!empty($query)) {

                $query_run = mysqli_query($connection,$query);
            }   
            if (!empty($query)) {
                if( $query_run) 
                {
                    echo'<script type="text/javascript"> alert("votre information effucter")</script>'; 
                }    
                else{
                    echo'<script type="text/javascript"> alert("votre information non effucter")</script>';
                }

            } 
        }else{
            echo'<h1> il faut connecte avant!</h1>';
        }
    }}

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rendez-vous</title>
    <link rel="stylesheet" type="text/css" href="rndv.css">
    <style>  
        section#appointment .container{
            padding: 40px 25px;
            max-width: 1150px;
            margin: 0px auto;
            display: flex;
            align-items: flex-end;
            flex-direction: row-reverse;
            background-color: white;
            align-content: center;
        }   


        .formulaire h2{
            font-size: 3.5em;
            color: #2a2a2a;
            margin-bottom: 50px;
            position: absolute;
            left: 400px;
            top: 0px;
        }

        .formulaire-image{
            position: absolute;
            top:50px;
            right: 500px;
            width: 800px;
            height:2000px;
        }

        .form  {
            margin: 8 px 0 px;
            padding: 10px;
            border: none;
            font-size: 1.5em;
            border-bottom: 0.5px solid#1fb3bf;
            transition: 1.5s;
            border-radius: 8px;
            display: block;
            height: 95px;
        }

        input::placeholder,{
            border-radius: 8px;
            background-color: #e6e6fa;
            font-size: 0.7em;
            font: italic;

        }
        textarea::placeholder{
            border-radius: 8px;
            background-color: #e6e6fa;
            font-size: 0.9em;
            font: italic;

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
        }
        .retour_btn{
            color: black;
            display: flex;
            padding-bottom:30px;
        }
        input[type=text]{
            width: 100%;
           padding: 9px;
          border: 1px solid #1fb3bf;
          border-radius: 8px;
          box-sizing: border-box;
        }
    </style>

</head>
<body>


  <div id="rndv-form">
    <form action="rndv.php"method="POST">
        <section id="appointment">
            <div class="container">
            
                <div class="formulaire">
                <a href="index.php" class="retour_btn"><img src="images/left-arrow.png">Retour</a>
                <h3>Votre nom:</h3>
                <input type="text"  name="nom"  required>
                <h3>Votre prenom:</h3>
                <input type="text"  name="prenom" required>
                       
                    <h3>Choisir le service:</h3>
                    <div>
                        <input type="radio"  name="service" value="test de vision">
                        <label form="rendez-vous1"> test de vision</label>
                        <input type="radio" id="rendez-vous2" name="service" value="réglage du lunettes">
                        <label form="rendez-vous2"> réglage du lunettes</label>
                        <input type="radio" id="rendez-vous3" name="service" value="autre">
                        <label form="rendez-vous2"> autre</label><br>
                        <div class="input">
                            <h3>Date et heure souhaite:</h3>
                            <input type="datetime-local" name="date_heure" class="form-control" />

                            <div class="input">
                                <h3>votre message:</h3>
                                <textarea name="message" placeholder="entrez votre message" id="" cols="30" rows="2"class="form"></textarea>

                                <br>
                                <input type="submit" name="submit" value='Prende un rendez-vous'> 


                            </div>      
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


</div>
</section>

</form>

</div>
<div class="formulaire-image">
    <img src="images/rndv.jpg"alt="" > 
</div>

</body>
</html>
