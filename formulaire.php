<?php

    $pdo = new mysqli('localhost', 'root', '', 'momeoow');

    $error = '';
    $success = '';

    if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_produit'])){

        if(empty($_POST['titre']) || strlen($_POST['titre']) > 25){
            $error .= '<p> Veuillez saisir un titre valide .</p>';
        }

        if(empty($_POST['description']) || strlen($_POST['description']) > 1000){
            $error .= '<p> Veuillez sasir une description valide .</p>';
        }

        if(empty($_POST['categorie'])){
            $error .= '<p> Veuillez sélectionner une catégorie valide .</p>';
        }

        if(empty($_POST['prix']) || $_POST['prix'] <= 0 || !is_numeric($_POST['prix'])){
            $error .= '<p> Veuillez saisir un prix valide .</p>';
        }

        if(empty($_FILES['image']['size'])){
            $error .= '<p> Veuillez saisir au moins une image .</p>';
        }

        if(empty($error)){
            $request = $pdo->prepare("INSERT INTO produits (titre, description, categorie, prix, image) VALUES (?,?,?,?,?)");

            try{
                $request->execute([$_POST['titre'], $_POST['description'], $_POST['categorie'], $_POST['prix'], $_FILES['image']['name']]);
            } catch(PDOException $e){
                echo $e->getMessage();
            }

            $success .= '<p style="color : green"> Merci, le produit a bien été enregistré !</p>';
        } 

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire produit</title>
    <link rel="stylesheet" href="./public/assets/css/style.css">
</head>
<body class="form">
    <div class="blabla" style="display:flex">
        <div class="clearzone">
            <h3>METS TON PRODUIT GROS 😾</h3>
            <br>
            <br>
            <div class="error">
                <?php 
                    if(!empty($error)){
                        echo $error;
                    } else {
                        echo $success;
                    }     
                ?>

            </div>
        </div>
    
        <form action="" method="POST" enctype="multipart/form-data">
            <h1>MEOOW</h1>
    
            <label for="titre">Titre du produit</label>
            <input type="text" name="titre">
    
            <label for="description">Description du produit</label>
            <textarea name="description" id="description" rows="10" cols="40"></textarea>
    
            <label for="categorie">Catégorie du produit</label>
            <select name="categorie" id="categorie">
                <option value=""></option>
                <option value="jouet">Jouets</option>
                <option value="accesoire">Accessoire</option>
                <option value="nourriture">Nourriture</option>
            </select>
            <label for="prix">Prix</label>
            <input type="number" name="prix">
    
            <label for="image">Image du produit</label>
            <input type="file" name="image" id="image" value="upload">
    
            <input type="submit" name="submit_produit">
        </form>     
    </div>
</body>
</html>