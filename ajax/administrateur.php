<?php 
include('../class/classAdmin.php'); 
include("../class/classAffichage.php");
include("../class/panier.class.php");
session_start();
$admin = new admin;
$affiche = new affichage;
$panier = new panier;
$panier->dbconnect();
$affiche->dbconnect();
$admin->dbconnect();


// Fonction qui permet d'ajouter un article 
if(isset($_POST['add']))
{
    $admin->ajouterarticle($_POST['nomarticle'], $_POST['descriptionarticle'], $_POST['img'], $_POST['categorie'], $_POST['prixarticle']);
}



/// Fonction qui permet d'ajouter une catégories.

if(isset($_POST['add_categorie']))
{
    $admin->newcategorie($_POST['newcategorie']);
}


/// 
if(isset($_POST['show'])){
    echo $affiche->affichercategorie();
}

/// Supprimer une catégorie 

if(isset($_POST['supp_categorie']))
{
    $admin->delete_categorie_and_article($_POST['id_supp']);
}


// Afficher les articles sur un tableau
if(isset($_POST['showarticle']))
{
    echo $affiche->afficherbaseproduit();
}

if(isset($_POST['supp_article']))
{
    $admin->delete_article($_POST['id_article']);
}

/* AFFICHER LES USER  */
if(isset($_POST['showuser']))
{
    echo $affiche->afficherbasededonner();
}


// CHANGER LES DROITS // 
if(isset($_POST['changedroit']))
{
    $affiche->changementdedroit($_POST['iddroit'], $_POST['iduser']);
}

if(isset($_POST['phare']))
{
    $admin->produit_phare($_POST['articlenom'], $_POST['imagearticle2'], $_POST['textaffiche']);
}

if(isset($_POST['afficheprix']))
{
    echo $affiche->afficher_article_prix();
}

if(isset($_POST['modifierleprix']))
{
    $admin->modifier_prix($_POST['optionchoisis'], $_POST['new_prix']);
}


if(isset($_POST['showcommande'])){
    echo $admin->affichercommandepass();
}


if(isset($_POST['expedie']))
{
    $admin->expidition($_POST['idexpedie']);
}

if(isset($_POST['add_basket']))
{
    $panier->add($_POST['id']);
}

?>