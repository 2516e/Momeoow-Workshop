<?php

    $pdo = new mysqli('localhost', 'root', '', 'momeoow');

    $error = '';
    $success = '';

    if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_produit'])){

        if(empty($_POST['titre']) || strlen($_POST['titre']) > 100){
            $error .= '<p> Veuillez saisir un titre valide .</p>';
        }

        if(empty($_POST['description']) || strlen($_POST['description']) > 5000){
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

        if (empty($error)) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];
                $fileSize = $_FILES['image']['size'];
                $fileType = $_FILES['image']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
    
                // Vérification du type MIME
                $allowedfileExtensions = ['jpg', 'gif', 'png', 'webp'];
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // Créez un nouveau nom de fichier pour éviter les conflits de nom
                    // md5 est une fonction pour hasher le nom de l'image (sécurité)
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    
                    $uploadFileDir = './public/assets/img/produits/';
                    $dest_path = $uploadFileDir . $newFileName;
    
                    // Déplacer le fichier dans le répertoire cible
                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $request = $pdo->prepare("INSERT INTO produits (titre, description, categorie, prix, image) VALUES (?,?,?,?,?)");;
                        try {
                            $request->execute([$_POST['titre'], $_POST['description'], $_POST['categorie'], $_POST['prix'], $newFileName]);
                            $pdo = null;
                            $request = null;
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    } else {
                        $error .= '<p>Il y a eu une erreur lors du déplacement du fichier téléchargé.</p>';
                    }
                } else {
                    $error .= '<p>Téléchargement échoué. Seuls les types de fichiers suivants sont autorisés : ' . implode(', ', $allowedfileExtensions). '</p>';
                }
            } else {
                $error .= '<p>Erreur lors du téléchargement du fichier. Code d\'erreur : ' . $_FILES['image']['error'] . '</p>';
            }

            $success .= '<p style="color : green"> Merci, le produit a bien été enregistré !</p>';
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
            <input type="number" step="0.01" name="prix">
    
            <label for="image">Image du produit</label>
            <input type="file" name="image" id="image" value="upload">
    
            <input type="submit" name="submit_produit">
        </form>     
    </div>
</body>
</html>