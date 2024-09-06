<?php include 'public/header.html.php' ?>

    <section id="page_produit">
        <div class="page_produit">
            <div>
                <img src="public/assets/img/produits/<?= $_GET['image']?>" alt="">
            </div>
            <div class="text">
                <h1><?= $_GET['titre']?></h1>
                <p><?= $_GET['categorie'] ?></p>
                <p><?= $_GET['description'] ?></p>
                <h2><?= $_GET['prix'] ?>€</h2>
            </div>
        </div>
        <div class="btn">
            <a href="confirmation.php">BUY NEOW <i class="fa-solid fa-paw"></i></a>
        </div>
    </section>