<?php include './public/header.html.php' ?>

<main>
    <section id="produit">
        <div class="textdesc">
            <h2><?= isset($_GET['titre']) ? htmlspecialchars($_GET['titre']) : '' ?></h2>

            <p>
                <?= isset($_GET['description']) ? htmlspecialchars($_GET['description']) : '' ?>
            </p>

            <div class="avis">
                
            </div>

            <h3><?= isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : '' ?></h3>
        </div>
    </section>
</main>