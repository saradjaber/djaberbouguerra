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
?>
<html>
<head>
<style>
h2 {
    font-weight: 300;
  font-family: cursive;
  font-style:oblique;
  text-transform: capitalize;
  text-align: center;
}
.resultat_table{
    font-weight: 500;
  font-family: sarif;
  font-style:oblique;
  text-transform: capitalize;
}
.tab{
  margin-left: auto;
  margin-right: auto;
  width: 100%;
}
th{
  border: 1px solid gray;
  padding: 30px;
  text-align: center;
}
td{
  text-align: center;
}
</style>

<h2><u>Le resultat  :</u></h2><br/>
<div class="resultat_table">          
  <table class="tab">
    <thead>
      <tr>
        <th>id produit</th>
        <th>nom</th>
        <th>prix</th>
        <th>image</th>
        <th>categorie</th>
      </tr>
    </thead>
    <tbody>
            <?php
             if(!$product_details)
             {
                echo '<tr>aucun produit trouvé</tr>';
             }
             else{
                foreach($product_details as $key=>$value)
                { 
                    ?>
                  
                <tr>
                    <td><?php echo $value['id_produit'];?></td>
                    <td><?php echo $value['nom'];?></td>
                    <td><?php echo $value['prix'];?></td>
                    <td><?php echo '<img src="images/'.$value['image'].'" width="128" height="117"> </img>' ?></td>
                    <td><?php echo $value['categ'];?></td>     
                </tr> 
                    <?php
                }
             }
            ?>
         
     </tbody>
</div>