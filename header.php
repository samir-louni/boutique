<?php
session_start();
include('requete.php');
include("class/classUser.php");
$user = new user;


include("class/classAffichage.php");
include("class/classAdmin.php");
$admin = new admin;
$admin->dbconnect();


include("class/panier.class.php");
$panier = new panier();
$panier->dbconnect();
$affichage = new affichage; 
$admin = new admin;

$user->dbconnect();
$affichage->dbconnect();
$admin->dbconnect();
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html lang="fr">
    <head>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/paiement.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/informations.css">
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="css/produits.css">
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="css/recherche.css">
    
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
        </style>
    </head>
<body>
<header>
<section class = 'case_notif_invisible' id ='not'>
<section class="case_notif">
<div class="image_notif"><img class = 'image_not' src="images-boutique/valider.png" alt=""></div>
<div class="titre_notif">
<h3>Notifications</h3>
<p id ='notate'></p>
</div>
</section>
</section>
    <div class = 'titre'>
        <?php
        if(isset($_SESSION['login'])){
            echo "<a href='profil.php'><img class = 'logouser' src='images-boutique/man-user'></a>";

        }elseif(!isset($_SESSION['login'])){
            echo "<a href='connexion.php'><img class = 'logouser' src='images-boutique/man-user'></a>";
        }
        ?>
        <H1 class = 'titreheader'>Recon</H1>
    </div>
    <nav id = 'navcategorie'>
        <a href="recherche.php"><img class = 'logorecherche' src="images-boutique/recherche.png"></a>
        <?php 
        if(isset($_SESSION['login'])){
            if($_SESSION['id_droit'] != 3){
                echo '';
            }else{
                echo "<li><a href = 'admin.php'>Admin</a></li>";
            }
        }else{
            echo '';
        }
        ?>
        <li><a href = 'index.php'>Accueil</a></li>
        <?php 
        
        // $affichage->affichercategorie(); ?>
    <script>
function afficher_header(){
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
                  $('#navcategorie').append(`<li id = "${element.id}"><a href='produit.php?id=${element.id}'> ${element.nom_categorie} </a></li>`)
                   // "<li>"."<a href='produit.php?id=$id'>".$key['nom_categorie']. '</a>' . "</li>
                });
            }
        })
}

afficher_header();



function afficher_header2(){
        $.ajax({
            type:'POST',
            url:'ajax/administrateur.php',
            data:{
                show:'show'
            },
            dataType:'text',
            success:function(response){
                $('#navcategorie').append(`<li><a href = 'admin.php'>Admin</a></li><li><a href = 'index.php'>Accueil</a></li>`)
                response = JSON.parse(response);
               response.forEach(element => {
                  $('#navcategorie').append(`<li id = "${element.id}"><a href='produit.php?id=${element.id}'> ${element.nom_categorie} </a></li>`)
                   // "<li>"."<a href='produit.php?id=$id'>".$key['nom_categorie']. '</a>' . "</li>
                });
                
            }
        })
}


function popper(test)
{  
$('#not').fadeIn().delay(3000).fadeOut();
$('#notate').html(test)
}




</script>


    

    </nav>
    <a href="panier.php"><img class = 'logopanier' src="images-boutique/panier.png"></a>
</header>