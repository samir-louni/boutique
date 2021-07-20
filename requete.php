<script>
$('#button_prix').click(function(){
        if($('#article_select').val() != '' && $('#new_prix').val() != ''){
            var optionchoisis = $('#article_select option:selected').val();
         $.ajax({
                            type:'POST',
                            url:'ajax/administrateur.php',
                            data:{
                                optionchoisis:optionchoisis,
                                new_prix:$('#new_prix').val(),
                                modifierleprix:'modifierleprix'
                            },
                            datatype: 'text',
                            success:function(response2){
                                response2 = response2.trim();
                                popper(response2)   
                                $('#article_select option').remove()
                                affiche_prix();         
                                $('#tableau td').remove()
                                afficher_article_tableau();
                }
            })
        }else{
            popper('Remplissez les champs')
        }             
    })


function afficher_article_tableau(){
        $.ajax({
            type:'POST',
            url:'ajax/administrateur.php',
            data:{
                showarticle:'showarticle'
            },
            dataType:'text',
            success:function(response){
                response = JSON.parse(response);
               response.forEach(element => {
                  $('#tableau').append(`<tr id = '${element.id_article}' class = '${element.id_article}'><td>${element.nom_article}</td>><td>${element.prix_article} €</td>><td class = 'backred' onclick="deletearticle(${element.id_article})">Supprimer</td></tr>`)
                });
            }
        })
}


function deletearticle(id_article){

$.ajax({
    type:'POST',
     url:'ajax/administrateur.php',
     data:{
        supp_article:'supp_article',
         id_article:id_article
    },
    success:function(response){
        console.log(response);
        $('#tableau td').remove()
        afficher_article_tableau();
        

    }
    
})
}

function affiche_prix(){
        $.ajax({
                            type:'POST',
                            url:'ajax/administrateur.php',
                            data:{
                                afficheprix:'afficheprix'
                            },
                            datatype: 'text',
                            success:function(response){
                                response = JSON.parse(response);
                        response.forEach(element => {
                  $('#article_select').append(`<option value ='${element.id_article}'>${element.nom_article} .. Prix acutel : ${element.prix_article}</option>`)              
                });
                               
             
                }
            })
    }

    
$('#changer_article_phare').click(function(){
        if($('#nom_article').val() != '' && $('#textaffiche').val() != '' && $('#imagearticle2').val() != ''){
            var choix2 = $('#articlenom option:selected').val();
            var image2 = document.getElementById("imagearticle2").files[0].name;
        
         $.ajax({
                            type:'POST',
                            url:'ajax/administrateur.php',
                            data:{
                                articlenom:choix2,
                                textaffiche:$('#textaffiche').val(),
                                imagearticle2:image2,
                                phare:'phare'
                            },
                            datatype: 'text',
                            success:function(response2){
                                response2 = response2.trim();
                                popper(response2)
                                
                }
            })
        }else{
            popper('Remplissez les champs')
        }             
    })

    function changer_droit(){

 
    $('#button_droit').click(function(){
        if($('#iduser').val() != '' && $('#changementdroit').val() != ''){
         $.ajax({
                            type:'POST',
                            url:'ajax/administrateur.php',
                            data:{
                                iddroit:$('#changementdroit').val(),
                                iduser:$('#iduser').val(),
                                changedroit:'changedroit'
                            },
                            datatype: 'text',
                            success:function(response2){
                                response2 = response2.trim();
                                if( response2 != 'Cette id n\'existe pas')
                                {
                                    $('#tableau-user td').remove()
                                    afficher_utilisateurs();
                                    popper(response2)
                                }else{
                                    popper(response2)
                                }              
                }
            })
        }else{
            popper('Remplissez les champs')
        }             
    })

}

    function afficher_utilisateurs(){
        $.ajax({
            type:'POST',
            url:'ajax/administrateur.php',
            data:{
                showuser:'user'
            },
            dataType:'text',
            success:function(response){
                response = JSON.parse(response);
               response.forEach(element => {
                
                  $('#tableau-user').append(`<tr><td>${element.id}</td>><td>${element.login}</td><td>${element.id_droit}</td></tr>`)
                  
                  
                });
            }
        })
}


function modifier_prix(){


$('#button_prix').click(function(){
        if($('#article_select').val() != '' && $('#new_prix').val() != ''){
            var optionchoisis = $('#article_select option:selected').val();
         $.ajax({
                            type:'POST',
                            url:'ajax/administrateur.php',
                            data:{
                                optionchoisis:optionchoisis,
                                new_prix:$('#new_prix').val(),
                                modifierleprix:'modifierleprix'
                            },
                            datatype: 'text',
                            success:function(response2){
                                response2 = response2.trim();
                                popper(response2)   
                                $('#article_select option').remove()
                                affiche_prix();         
                                $('#tableau td').remove()
                                afficher_article_tableau();
                }
            })
        }else{
            popper('Remplissez les champs')
        }             
    })
}

/* AJOUTER UN ARTICLE  */

function ajouterarticleajax(){
        
        if($('#image_article').val() != '' && $('#nomarticle').val() != '' && $('#prixarticle').val() != '' && $('#descriptionarticle').val() != '' && $('#selection').val() != ''){
            var choix = $('#selection option:selected').val();
            var image = document.getElementById("image_article").files[0].name;
            $.ajax({
                type:'POST',
                url:'ajax/administrateur.php',
                data:{
                    img:image,
                    nomarticle:$('#nomarticle').val(),
                    prixarticle:$('#prixarticle').val(),
                    descriptionarticle:$('#descriptionarticle').val(),
                    categorie:choix,
                     add:'add'
                },
                datatype: 'text',
                success:function(response2){
                    response2 = response2.trim();
                    popper(response2);
    
                    
                }
            })
            
        }else{
            popper('Veuillez remplir tout les caractères');
        }
    }
    
    
    /* AJOUTER UNE CATEGORIE  */
    
    function addcat()
    {
    
                            if($('#name_categorie').val() != ''){
                                $.ajax({
                                type:'POST',
                                url:'ajax/administrateur.php',
                                data:{
                                    newcategorie:$('#name_categorie').val(),
                                    add_categorie:'add_categorie'
                                },
                                datatype: 'text',
                                success:function(response2){
                                    console.log(response2);
                                    response2 = response2.trim();
                                    popper(response2);
                                    $('#navcategorie li').remove();
                                    afficher_header2();
                                    $('#liste_categorie p').remove();
                                    afficher_categorie();
                    }
                })
                            }else{
                                popper('Veuillez indiquez le nom de la categorie à ajouter')
                            }
    }
    
    /* AFFICHER UNE CATEGORIE */ 
    
    function afficher_categorie(){
        $.ajax({
                type:'POST',
                url:'ajax/administrateur.php',
                data:{
                    show:'show'
                },
                dataType:'text',
                success:function(response){
                    response = JSON.parse(response);
                   response.forEach(element => {
                      $('#liste_categorie').append(`<p class = 'categorie_sup' id="${element.id}" onclick="deleteuh(${element.id})">${element.nom_categorie} </p>`)
                    });
    
    
                }
            })
    }
    
    /* SUPPRIMER UNE CATEGORIE */
    
    function deleteuh(id_supp){
    
        console.log(id_supp);
         $.ajax({
            type:'POST',
             url:'ajax/administrateur.php',
             data:{
                supp_categorie:'supp_categorie',
                 id_supp:id_supp
            },
            success:function(response){
                console.log(response);
               $('#navcategorie li').remove();
               afficher_header2();
               $('#liste_categorie p').remove();
                afficher_categorie();   
            }
            
        })
    }
    
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
    
    
    
    // Changer l'article phare 
    
    function articlephare(){
        if($('#nom_article').val() != '' && $('#textaffiche').val() != '' && $('#imagearticle2').val() != ''){
            var choix2 = $('#articlenom option:selected').val();
            var image2 = document.getElementById("imagearticle2").files[0].name;
        
         $.ajax({
                            type:'POST',
                            url:'ajax/administrateur.php',
                            data:{
                                articlenom:choix2,
                                textaffiche:$('#textaffiche').val(),
                                imagearticle2:image2,
                                phare:'phare'
                            },
                            datatype: 'text',
                            success:function(response2){
                                response2 = response2.trim();
                               popper(response2)
                                
                }
            })
        }else{
            popper('Remplissez les champs')
        }             
    }


function connexion(){


    $('#connexion_button').click(function(){
        if($('#login').val() != '' && $('#pass').val() != ''){
            $.ajax({
                type:'POST',
                url:'ajax/utilisateurs.php',
                data:{
                    login:$('#login').val(),
                    pass:$('#pass').val(),
                     connect:'connect'
                },
                datatype: 'text',
                success:function(response2){
                    console.log(response2);
                    popper(response2)
                    if(response2 == "Connexion établie !")
                    window.location.replace('profil.php');
                }
            })
            
        }else{
            
            popper('Veuillez remplir tout les caractères');
        }
    })
}


function inscription(){
    $('#inscription_button').click(function(){
        var mailver = $('#mail').val();
        var pass = $('#password-inscription').val();
        var passlong = $('#password-inscription').val().length;

        
        if($('#nom').val() != '' && $('#prenom').val() != '' && $('#adresse').val() != ''  && $('#societe').val() != ''  && $('#email').val() != ''  && $('#password-inscription').val() != ''  && $('#confirm-password').val() != ''){
           if(/['@']/.test(mailver) && /['.']/.test(mailver)){
            if(passlong > 7){
                if(/[A-Z]/.test(pass)){
                    if(/[0-9]/.test(pass)){
                        if($('#password-inscription').val() == $('#confirm-password').val()){
                            $.ajax({
                                type:'POST',
                                url:'ajax/utilisateurs.php',
                                data:{
                                    nom:$('#nom').val(),
                    prenom:$('#prenom').val(),
                    mail:$('#mail').val(),
                    identifiant:$('#identifiant').val(),
                    password:$('#password-inscription').val(),
                    inscriptionuser:'inscriptionuser'
                                },
                                datatype: 'text',
                                success:function(response){
                                    response = response.trim()
                                popper(response);
                                if( response == "Cette identifiant éxiste déjà"){
                                    $('#identifiant').val('') 
                                    $('#password-inscription').val('');
                                    $('#confirm-password').val('');
                                }
                                    }
                                })
                        }else{
                            popper('Les mots de passes ne correspondent pas');
                            $('#password-inscription').val('');
                            $('#confirm-password').val('');
                            }
                    }else{
                        popper('Votre mot de passes doit contenir au moins un chiffres')
                        $('#password-inscription').val('');
                        $('#confirm-password').val('');
                    }
                    
                }else{
                    popper('Votre mot de passes doit contenir au moins une majuscule')
                    $('#password-inscription').val('');
                    $('#confirm-password').val('');
                }
            }else{
             
                popper('Votre mot de passe doit contenir 8 caractère minimum')
               $('#password-inscription').val('');
               $('#confirm-password').val('');
           }       
           }else{
            popper("Votre adresse mail n'est pas valide")
               $('#mail').val('');
           }
           
        }else{
            popper('Veuillez remplir tout les champs')
        }
    })
}


function afficher_commande(){
        $.ajax({
            type:'POST',
            url:'ajax/administrateur.php',
            data:{
                showcommande:'showcommande'
            },
            dataType:'text',
            success:function(response){
                response = JSON.parse(response);
               response.forEach(element => {
                
                  $('#table-commande').append(`<tr>
      <td class='tdpetit'>${element.id_payer}</td>
         <td class='tdpetit'>${element.id_commande}</td>
        <td class='tdpetit'>${element.quantite}</td>
         <td class='tdmoyen'>${element.prix_total} OO €</td>
        <td class='tdpetit'>${element.nom_commande}</td>
       <td class='tdpetit'>${element.prenom_commande}</td>
        <td class='tdpetit'>${element.pays}</td>
        <td class='tdpetit'>${element.ville}</td>
        <td class='tdpetit'>${element.cp}</td>
        <td class='tdpetit'>${element.telephone}</td>
        <td class='tdgrand'>${element.adresse}</td>
        <td class='tdgrand'>${element.email_commande}</td>
        <td class='tdgrand'>${element.nom_article}</td>
        <td class='tdpetit'>${element.login}</td>
       <td id = '${element.id_c}' onclick="expedierarticle(${element.id_c})" class='tdpetit tdback'>${element.expedie}</td>
        </tr>`)

                  
                  
                });
            }
        })
}

function expedierarticle(idexpedie){

$.ajax({
    type:'POST',
     url:'ajax/administrateur.php',
     data:{
        expedie:'expedie',
         idexpedie:idexpedie
    },
    success:function(response){
        console.log(response);
        response = response.trim();
        popper(response);
        $('#table-commande td').remove()
        afficher_commande();
        

    }
    
})
}

function style(){
    
$('#modif-mdp').click(function(){
    $('.info').css("display", "none")
    $('#modif-info').css("display", "none")
    $('#modif-pass').slideDown(1000) 
})


$('#modif').click(function(){

    $('.info').css("display", "none")
    $('#modif-pass').css("display", "none") 
    $('#modif-info').slideDown(1000)  
    $('#modif').addClass("input-back");
    $('#mon-comptes').removeClass("input-back");
    $('#modif-mdp').removeClass("input-back");


})

$('#mon-comptes').click(function(){
$('#modif-info').css("display", "none")
$('#modif-pass').css("display", "none") 
$('.info').slideDown(1000); 
$('#modif').removeClass("input-back");
$('#mon-comptes').addClass("input-back");
$('#modif-mdp').removeClass("input-back");
})

$('#modif-mdp').click(function(){
// $('#modif-info').css("display", "none")
// $('.info').slideDown(1000);
$('#mon-comptes').removeClass("input-back");
$('#modif').removeClass("input-back");
$('#modif-mdp').addClass("input-back");
})

}


function modifier_info(){
    $('#modification_button').click(function(){
    var login = $('#logininfo').val();
    var email = $('#emailinfo').val();
    var nom = $('#nominfo').val();
    var prenom = $('#prenominfo').val();
    $.ajax({
                type:'POST',
                url:'ajax/utilisateurs.php',
                data:{
                    nominfo:$('#nominfo').val(),
                    prenominfo:$('#prenominfo').val(),
                    emailinfo:$('#emailinfo').val(),
                    logininfo:$('#logininfo').val(),
                     modifbd:'modifbd'
                },
                datatype: 'text',
                success:function(response2){
                    console.log(response2);
                        popper(response2);
                    $('#nomsession').replaceWith(nom);
                    $('#prenomsession').replaceWith(prenom);
                    $('#emailsession').replaceWith(email);
                    $('#loginsession').replaceWith(login); 
                }
            })
})
}

function deconnexion_profil(){
    $('#deconnexion').click(function(){

$.ajax({
            type:'POST',
            url:'ajax/utilisateurs.php',
            data:{
                 deco:'deco'
            },
            datatype: 'text',
            success:function(response2){
                console.log(response2); 
                window.location.replace('connexion.php');
            }
        })
})

}


function modifier_pass(){
    $('#password_button').click(function(){
    var passlong = $('#new_pass').val().length;
    var pass = $('#new_pass').val()
if($('#ancien_pass').val() != '' && $('#new_pass').val() != '' && $('#confirm_pass').val() != ''){
            if(passlong > 7){
                if(/[A-Z]/.test(pass)){
                    if(/[0-9]/.test(pass)){
                        if($('#new_pass').val() == $('#confirm_pass').val()){
                            $.ajax({
                                type:'POST',
                                url:'ajax/utilisateurs.php',
                                data:{
                                    modifpass:'modifpass',
                                    ancien_pass:$('#ancien_pass').val(),
                                    new_pass:$('#new_pass').val()
                                },
                                datatype: 'text',
                                success:function(response){
                                popper(response);
                                console.log(response);
                                if( response == "Mot de passe changer"){
                                    $('#ancien_pass').val('');
                                    $('#new_pass').val('');
                                    $('#confirm_pass').val('');
                                }
                                if(response == "Le mot de passe entrée n'est pas le bon")
                                {
                                    $('#ancien_pass').val('');
                                    $('#new_pass').val('');
                                    $('#confirm_pass').val('');
                                }
                                    }
                                })
                        }else{
                            popper('Les mots de passes ne correspondent pas');
                                    $('#ancien_pass').val('');
                                    $('#new_pass').val('');
                                    $('#confirm_pass').val('');
                            }
                    }else{
                        popper('Votre mot de passes doit contenir au moins un chiffres')
                                    $('#new_pass').val('');
                                    $('#confirm_pass').val('');
                    }
                    
                }else{
                   popper('Votre mot de passes doit contenir au moins une majuscule')
                    $('#new_pass').val('');
                                    $('#confirm_pass').val('');
                }
            }else{
               popper('Votre mot de passe doit contenir 8 caractère minimum')
               $('#new_pass').val('');
                                    $('#confirm_pass').val('');
           }       

        }else{
            popper('Veuillez remplir tout les champs')
        }
})
}
</script>