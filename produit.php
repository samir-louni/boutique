<?php include 'header.php';?>

<section class = 'caserouge'>
    <div class = 'titrecaserouge'>
            Produits
    </div>
    <hr>
</section>
<section class = 'centrer_produit'>
    <section class="produit">
       <?php $affichage->afficherarticle($_GET['id']); ?>  
    </section>
</section>
<div class = 'marge_footer2'>
    .
</div>

<?php include 'footer.php' ?>
</body>
</html>

<!-- $panier->add($produit[0]->id_article); -->

<script>
function ajouter_panier(id)
{
    $.ajax({
            type:'POST',
            url:'ajax/administrateur.php',
            data:{
                add_basket:'add_basket',
                id:id
            },
            dataType:'text',
            success:function(response){
            popper('Produit ajouter au panier')

            }
        })
}

</script>