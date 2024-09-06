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
                        <h4><?= $t['titre']; ?></h4>
                        <p class="categorie"><?= ucfirst($t['categorie']) ?></p>
                        <p style="color: white; font-size:x-large"><b><?= $t['prix']; ?>€</b></p>
                        <div class="btn">
                            <a href="page_produit.php?id=<?= $t['id']; ?>&titre=<?= $t['titre']?>&categorie=<?= $t['categorie'] ?>&description=<?= $t['description'] ?>&prix=<?= $t['prix'] ?>&image=<?= $t['image'] ?>"> MORE <i class="fa-solid fa-paw"></i></a>
                        </div>
                    </div>
                </div>
        <?php }} else { ?>
            <h2>Aucun produit n'a encore été ajouté ...</h2>
        <?php } ?>
    </section>

    <?php include 'public/footer.html.php' ?>
</main>