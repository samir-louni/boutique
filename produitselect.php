<?php 
    include 'header.php';
    $id = $_GET['idproduct'];
?>

<section class = 'case_base_produit'>
    <?php $affichage->afficherarticleseul($id); ?>
</section>
<div class = 'marge_footer2'>
    .
</div>

<?php include 'footer.php';?>
</body>
</html>