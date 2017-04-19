<?php
	header('Access-Control-Allow-Origin: *');  


	// CONNEXION BDD
	$pdo = new PDO('mysql:host=localhost;dbname=Mike', 'root', '', array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	));

	// Requete SQL
	$resultat = $pdo->prepare("SELECT * FROM utilisateurs");
	$resultat->execute();
	
	// Trie de la requete
	$utilisateurs = $resultat->fetchall(PDO::FETCH_ASSOC);

	// Creation de la varible tableau
	$tableau = "<table><tr>";
	
	// Bouble sur le premier element de notre table afin de recuperer les key.
	foreach ($utilisateurs[0] as $key => $value){
		$tableau .= '<th>'.$key.'</th>';
	}
	// Meme syntaxe. Trie du PREMIER ET SEUL element.
	foreach ($resultat->fetch() as $key => $value){
		$tableau .= '<th>'.$key.'</th>';
	}

	$tableau .= "</tr>";
	
	// Boucle pour parcourir chaque ligne de notre bdd
	foreach ($utilisateurs as $key => $value){
		$tableau .= "<tr>";
		// Boucle chaque colone de nos lignes
		foreach ($utilisateurs[$key] as $key => $value){
			$tableau .= "<td>".$value."</td>";
		}
		$tableau .= "</tr>";
	}
	
	echo $tableau;
	
	
	
	// sleep(20);
	// var_dump($utilisateurs);
	// echo json_encode($utilisateurs);
	