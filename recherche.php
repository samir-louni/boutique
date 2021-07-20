
<?php include 'header.php';?>
<main>
    <section class = 'caserouge'>
        <div class = 'caserougepanier'>
            Trouve ton bonheur
        </div>
        <hr class="line-case">
    </section>
    <form class="form-recherche" method="POST" action="" autocomplete="off" >
        <input class="input-recherche" type="search" name="recherche" id="recherche" placeholder="rechercher">
        <input class="label-recherche" type="submit" value="Valider">
    </form>
    <section class = 'centrer_produit'>
        <div id="resultat_recherche">
        </div>
    </section>
    <section class = 'centrer_produit'>
        <section class="produit">
            <?php
                if(isset($_POST['recherche'])){
                    $user->recherche($_POST['recherche']);
                    }
            ?>
        </section>
    </section>
    <div class = 'marge_footer2'>
    .
    </div>
</main>

<?php include 'footer.php';?>




<script>

$('#recherche').keyup(function(){
            var valeur = $('#recherche').val();
            $('#resultat_recherche').html('');
            if(valeur != ""){
                $.ajax({
                    type : 'GET',
                    url : 'ajax/utilisateurs.php',
                    data : {
                            titre:'titre',
                            valeur:valeur
                        },
                    success : function(response){
                        if(response != ""){
                            $('#resultat_recherche').append(response);
                        }else{
                            ('#resultat_recherche').html("Aucun resultat")
                        }
                    }
                });
                
            }
        });

        
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
</body>
</html>
