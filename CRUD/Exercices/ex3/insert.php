<?php

    // if(isset($_POST["marque"]) && isset($_POST["modele"]) && isset($_POST["annee"]) && isset($_POST["couleur"])){
    if(isset($_POST)){
        if(!empty($_POST)){

            try{ 
                // connexion à la bdd qu'on a créée au préalable sur php my admin
                $PDO  = new PDO("mysql:host=localhost;dbname=mike", "root", "");
                $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            // TRY : Pour des ? de sécurité / Vérifie la condition connexion bdd ok
               
            }catch(PDOException $e){
                echo "Mike n'ai plus de se monde.";
            }

            $insertRequet = $PDO->prepare("INSERT INTO `voitures`(`marque`, `modele`, `annee`, `couleur`) VALUES (:marque,:modele,:annee,:couleur)");
            $insertRequet->bindParam(":marque", $_POST["marque"]);
            $insertRequet->bindParam(":modele", $_POST["modele"]);
            $insertRequet->bindParam(":annee", $_POST["annee"]);
            $insertRequet->bindParam(":couleur", $_POST["couleur"]);
            $insertRequet->execute();
            echo "<p style='color:green'>OK - 270 KAA</p>";

        }else
            echo "<p style='color:red'>FAIL</p>";
    }else
            echo "<p style='color:red'>FAIL</p>";



?>