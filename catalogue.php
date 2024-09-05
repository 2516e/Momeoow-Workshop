<?php
    $pdo = new PDO('mysql:host=localhost;dbname=momeoow', 'root', '');

    $request = $pdo->prepare('SELECT * FROM produits');

    try {
        $request->execute();

        $tab = $request->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>
<?php include './public/header.html.php' ?>

<main>
    <section class="wrapper">
        <?php if($tab){
                    foreach ($tab as $t) { ?>
                <div class="produit">
                    <div class="imgp">
                        <img src="public/assets/img/produits/<?=$t['image'] ?>" alt="<?= $t['titre'] ?>" style="width: 100%">
                    </div>
                    <div class="details">
                        <h2><?= $t['titre']; ?></h2>
                        <p class="categorie"><?= ucfirst($t['categorie']) ?></p>
                        <h3 style="color: white;"><?= $t['prix']; ?>€</h3>
                        <div class="btn">
                            <a href="traitement_details.php?id=<?= $t['id']; ?>">MORE <i class="fa-solid fa-paw"></i></a>
                        </div>
                    </div>
                </div>

        <?php }} else { ?>
            <h2>Aucun produit n'a encore été ajouté ...</h2>
        <?php } ?>
    </section>
</main>