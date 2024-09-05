<?php include './public/header.html.php' ?>

<main>
        <div>
        <?php if($tab){
             foreach ($tab as $t) { ?>
            <div>
                <h2>Produit numéro : <?= $t['id'] ?></h2>
                <div style="width: 200px;">
                    <img src="img/<?= $t['image'] ?>" alt="<?= $t['produit'] ?>" style="width: 100%">
                </div>
                <h2><?= $t['produit']; ?></h2>
                <p><?= $t['prix']; ?>€</p>
                <p>categorie : <?= $t['categorie'] ?></p>
                <a href="traitement_details.php?id=<?= $t['id']; ?>">Voir en détails</a>
            </div>

        <?php }} else { ?>
            <h2>Aucun produit n'a encore été ajouté </h2>
        <?php } ?>
    </div>
</main>



<?php
