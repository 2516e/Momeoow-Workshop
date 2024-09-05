<?php include './public/header.html.php' ?>

<main>
    <div class="wrapper">
        
    <div class="produit" id="produit1">
            <a href="formulaire.php?titre=rouleauxmeoow&img=rouleaux1.jpg&prix=10">
             <h4><?= isset($_GET['titre']) ? htmlspecialchars($_GET['titre']) : '' ?></h4>
             <div> <img src="img/<?= $t['image'] ?>" alt="<?= $t['titre'] ?>"> </div>
             <h5><?= isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : '' ?></h5>
            </a>
        </div>



        <div class="produit" id="produit2">
            <a href="formulaire.php?titre=rouleauxmiaou&img=produit2.jpg">
             <h4><?= isset($_GET['titre']) ? htmlspecialchars($_GET['titre']) : '' ?></h4>
             <div> <img src="img/<?= $t['image'] ?>" alt="<?= $t['titre'] ?>"> </div>
             <h5><?= isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : '' ?></h5>
            </a>
        </div>
        
        
        
        <div class="produit" id="produit3">
            <a href="formulaire.php?titre=pelottedelaine&img=produit3.jpg">
             <h4><?= isset($_GET['titre']) ? htmlspecialchars($_GET['titre']) : '' ?></h4>
             <div> <img src="img/<?= $t['image'] ?>" alt="<?= $t['titre'] ?>"> </div>
             <h5><?= isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : '' ?></h5>
            </a>
        </div>
        
        
        <div class="produit" id="produit4">
            <a href="formulaire.php?titre=croquettepink&img=croquettepink.jpg">
             <h4><?= isset($_GET['titre']) ? htmlspecialchars($_GET['titre']) : '' ?></h4>
             <div> <img src="img/<?= $t['image'] ?>" alt="<?= $t['titre'] ?>"> </div>
             <h5><?= isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : '' ?></h5>
            </a>
        </div>

        <div class="produit" id="produit5">
            <a href="formulaire.php?titre=croquetteblue&img=croquetteblue.jpg">
             <h4><?= isset($_GET['titre']) ? htmlspecialchars($_GET['titre']) : '' ?></h4>
             <div> <img src="img/<?= $t['image'] ?>" alt="<?= $t['titre'] ?>"> </div>
             <h5><?= isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : '' ?></h5>
            </a>
        </div>

        <div class="produit" id="produit6">
            <a href="formulaire.php?titre=croquettered&img=croquettered.jpg">
             <h4><?= isset($_GET['titre']) ? htmlspecialchars($_GET['titre']) : '' ?></h4>
             <div> <img src="img/<?= $t['image'] ?>" alt="<?= $t['titre'] ?>"> </div>
             <h5><?= isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : '' ?></h5>
            </a>
        </div>
</main>

<?php 
$request = http_build_query($_GET);

var_dump($_GET);
if (isset($_GET) && $_SERVER['REQUEST_METHOD'] === "GET") {
    switch ($_GET['titre']) {
        case 'rouleauxmeoow':
            header("Location: produit.php?$request&img=rouleaux1");
            break;
        case 'rouleauxmiaou':
            header("Location: produit.php?$request&img=produit2");
            break;
        case 'pelottedelaine':
            header("Location: produit.php?$request&img=produit3");
            break;
        case 'croquettepink':
            header("Location: produit.php?$request&img=croquettepink");
            break;
        case 'croquetteblue':
            header("Location: produit.php?$request&img=croquetteblue");
                break;
        case 'croquettered':
            header("Location: produit.php?$request&img=croquettered");
                break;       
        default:
            header('Location: erreur.php?error_titre=true');
            break;
    }
}
?>