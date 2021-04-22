<?php 
include 'header.php';
$id = $_GET['idproduct'];
?>
<?php $user->acces_connect(); ?>

<section class = 'case_base_produit'>
    <?php $user->afficherarticleseul($id); ?>
</section>
<div class = 'marge_footer2'>
    .
</div>

<?php include 'footer.php';?>
</body>
</html>