$(document).ready(function(){
    /* FAIRE APPARAITRE LE FORMULAIRE D'INSCRIPTION */
    $('#inscrivez-vous').click(function(){
         $('#form_connexion').css("display", "none")
         $('#form_inscription').slideDown(1000)
         
    })

    /* FAIRE APPARAITRE LE FORMULAIRE DE CONNEXION*/
        $('#connectez-vous').click(function(){
            $('#form_inscription').css("display", "none")
             $('#form_connexion').slideDown(1000);
    })
})

/* FAIRE APPARAITRE LE FORMULAIRE DAJOUT DARTICLE */

$('#phare').click(function(){
    $('#add_phare').slideDown(1000)
    $('#table_supp').css("display", "none")
$('#add_article_vue').css("display", "none")
$('#categorie_liste').css("display", "none")
$('#changer_droit_affiche').css("display", "none");
$('#modification_prix').css("display", "none");
})

$('#add_article_js').click(function(){
$('#add_article_vue').toggle('1000');
$('#table_supp').css("display", "none");
$('#categorie_liste').css("display", "none")
$('#changer_droit_affiche').css("display", "none");
$('#add_phare').css("display", "none");
$('#modification_prix').css("display", "none");


})


$('#delete_button').click(function(){
$('#table_supp').slideDown(1000);
$('#add_article_vue').css("display", "none")
$('#categorie_liste').css("display", "none")
$('#changer_droit_affiche').css("display", "none");
$('#add_phare').css("display", "none");
$('#modification_prix').css("display", "none");
})

$('#categorie_js').click(function(){
$('#add_article_vue').css("display", "none")
$('#table_supp').css("display", "none");
$('#changer_droit_affiche').css("display", "none");
$('#categorie_liste').slideDown(1000)
$('#add_phare').css("display", "none");
$('#modification_prix').css("display", "none");

})

$('#gerer_js').click(function(){
$('#add_article_vue').css("display", "none")
$('#table_supp').css("display", "none");
$('#categorie_liste').css("display", "none");
$('#table_list').css("display", "none");
$('#changer_droit_affiche').slideDown(1000);
$('#add_phare').css("display", "none");
$('#modification_prix').css("display", "none");

})


$('#prix').click(function(){
$('#modification_prix').slideDown(1000)
$('#add_article_vue').css("display", "none")
$('#table_supp').css("display", "none");
$('#categorie_liste').css("display", "none");
$('#table_list').css("display", "none");
$('#changer_droit_affiche').css("display", "none")
$('#add_phare').css("display", "none");
})

$('#commande').click(function(){
    ('#table_list').slideDown(1000)
})

