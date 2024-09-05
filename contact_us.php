<?php

    $pdo = new mysqli('localhost', 'root', '', 'momeoow');

    $error = '';
    $success = '';

    if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_form'])){

        if(empty($_POST['nom']) || strlen($_POST['nom']) > 25){
            $error .= '<p> Veuillez saisir un nom valide. </p>';
        }
        
        if(empty($_POST['prenom']) || strlen($_POST['nom']) > 25){
            $error .= '<p> Veuillez saisir un prenom valide. </p>';
        }
        
        if(empty($_POST['mail']) || strlen($_POST['mail']) > 50){
            $error .= '<p> Veuillez saisir un mail valide. </p>';
        }
        
        if(empty($_POST['message']) || strlen($_POST['message']) > 5000){
            $error .= '<p> Veuillez saisir un message valide. </p>';
        }

        if(empty($error)){
            $request = $pdo->prepare("INSERT INTO contact (nom, prenom, mail, message) VALUES (?,?,?,?)");
            
            try {
                $request->execute([$_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['message']]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
        }

        $success .= '<p style="color : green"> Merci, votre message a bien été enregistré !</p>';

    }
?>

<?php include './public/header.html.php' ?>

<section id="contact_us">
        <div class="contact_us">
            <form action="" method="POST">
                <h2>Contact us</h2>
                <br>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom">

                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom">

                <label for="mail">Email</label>
                <input type="email" name="mail" id="mail">

                <label for="message">Message</label>
                <textarea name="message" id="message" cols="40" rows="20"></textarea>

                <input type="submit" name="submit_form">
            </form>
        </div>

        <div class="error">
            
            <?php
                if(!empty($error)){
                    echo $error;
                } else {
                    echo $success;
                }
            ?>
        </div>
    </section>