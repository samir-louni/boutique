
// /* AJOUTER UN ARTICLE  */

// function ajouterarticleajax(){
        
//     if($('#image_article').val() != '' && $('#nomarticle').val() != '' && $('#prixarticle').val() != '' && $('#descriptionarticle').val() != '' && $('#selection').val() != ''){
//         var choix = $('#selection option:selected').val();
//         var image = document.getElementById("image_article").files[0].name;
//         $.ajax({
//             type:'POST',
//             url:'ajax/administrateur.php',
//             data:{
//                 img:image,
//                 nomarticle:$('#nomarticle').val(),
//                 prixarticle:$('#prixarticle').val(),
//                 descriptionarticle:$('#descriptionarticle').val(),
//                 categorie:choix,
//                  add:'add'
//             },
//             datatype: 'text',
//             success:function(response2){
//                 response2 = response2.trim();
//                 popper(response2);

                
//             }
//         })
        
//     }else{
//         popper('Veuillez remplir tout les caractères');
//     }
// }


// /* AJOUTER UNE CATEGORIE  */

// function addcat()
// {

//                         if($('#name_categorie').val() != ''){
//                             $.ajax({
//                             type:'POST',
//                             url:'ajax/administrateur.php',
//                             data:{
//                                 newcategorie:$('#name_categorie').val(),
//                                 add_categorie:'add_categorie'
//                             },
//                             datatype: 'text',
//                             success:function(response2){
//                                 console.log(response2);
//                                 response2 = response2.trim();
//                                 popper(response2);
//                                 $('#navcategorie li').remove();
//                                 afficher_header2();
//                                 $('#liste_categorie p').remove();
//                                 afficher_categorie();
//                 }
//             })
//                         }else{
//                             popper('Veuillez indiquez le nom de la categorie à ajouter')
//                         }
// }

// /* AFFICHER UNE CATEGORIE */ 

// function afficher_categorie(){
//     $.ajax({
//             type:'POST',
//             url:'ajax/administrateur.php',
//             data:{
//                 show:'show'
//             },
//             dataType:'text',
//             success:function(response){
//                 response = JSON.parse(response);
//                response.forEach(element => {
//                   $('#liste_categorie').append(`<p class = 'categorie_sup' id="${element.id}" onclick="deleteuh(${element.id})">${element.nom_categorie} </p>`)
//                 });


//             }
//         })
// }

// /* SUPPRIMER UNE CATEGORIE */

// function deleteuh(id_supp){

//     console.log(id_supp);
//      $.ajax({
//         type:'POST',
//          url:'ajax/administrateur.php',
//          data:{
//             supp_categorie:'supp_categorie',
//              id_supp:id_supp
//         },
//         success:function(response){
//             console.log(response);
//            $('#navcategorie li').remove();
//            afficher_header2();
//            $('#liste_categorie p').remove();
//             afficher_categorie();   
//         }
        
//     })
// }

// function ajouter_panier(id)
// {
//     $.ajax({
//             type:'POST',
//             url:'ajax/administrateur.php',
//             data:{
//                 add_basket:'add_basket',
//                 id:id
//             },
//             dataType:'text',
//             success:function(response){
//             popper('Produit ajouter au panier')

//             }
//         })
// }



// // Changer l'article phare 

// function articlephare(){
//     if($('#nom_article').val() != '' && $('#textaffiche').val() != '' && $('#imagearticle2').val() != ''){
//         var choix2 = $('#articlenom option:selected').val();
//         var image2 = document.getElementById("imagearticle2").files[0].name;
    
//      $.ajax({
//                         type:'POST',
//                         url:'ajax/administrateur.php',
//                         data:{
//                             articlenom:choix2,
//                             textaffiche:$('#textaffiche').val(),
//                             imagearticle2:image2,
//                             phare:'phare'
//                         },
//                         datatype: 'text',
//                         success:function(response2){
//                             response2 = response2.trim();
//                            popper(response2)
                            
//             }
//         })
//     }else{
//         popper('Remplissez les champs')
//     }             
// }