<?php

define('HOST','localhost');
define('DB','opticien');
define('USER','root');
define('PASS','');


$conn = new mysqli(HOST, USER, PASS, DB);


function ajouterProduit($nom, $qty, $price){
	global $conn;

	$sql ="INSERT INTO panier (nomatricle, nbreArticle, montant) VALUES ('$nom', $qty, $price)";
	$conn->query($sql);
}
function ajoutercommande($nom, $qty, $price){
	global $conn;

	$sql ="INSERT INTO commande (nomatricle, nbreArticle, montant) VALUES ('$nom', $qty, $price)";
	$conn->query($sql);
}




function removeProduct($pid){
	global $conn;

	$sql ="DELETE FROM panier WHERE idpanier = $pid";
	$conn->query($sql);
}
function getAllProduit(){
	global $conn;

	// creation de la requette
	$requette="SELECT * FROM produit";
	//execution de la requette
	$resultat=$conn->query($requette);
	//resultat de la requette
	$produit = array();
	if ($resultat->num_rows > 0) {
		 while($row = $resultat->fetch_assoc()) {
		 	array_push($produit, $row);
		 }
	}
	return $produit;
 }
function getProduitById($id){

global $conn;	
	//creation de la requette
	$requette="SELECT * FROM produit WHERE id_produit=$id";
	//execution de la requette
	$resultat=$conn->query($requette);
	//resultat de la requette
	$produit = array();
	if ($resultat->num_rows > 0) {
		 while($row = $resultat->fetch_assoc()) {
		 	array_push($produit, $row);
		 }
	}
	return $produit;

}

?>
	 
