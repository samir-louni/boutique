<?php 
include('../class/classUser.php'); 
session_start();
$user = new user;
$user->dbconnect(); 

// INSCRIPTION DE L'UTILISATEURS.

if(isset($_POST['inscriptionuser']))
{
    $user->inscription($_POST['mail'],$_POST['identifiant'],$_POST['nom'],$_POST['prenom'],$_POST['password']);
}




// CONNEXION DE L'UTILISATEURS 

if(isset($_POST['connect']))
{
    $user->connexion($_POST['login'], $_POST['pass']);
}


// Modifier les infos 

if(isset($_POST['modifbd'])){
    $user->modifierinfo($_POST['logininfo'],$_POST['emailinfo'], $_POST['nominfo'], $_POST['prenominfo']);
}


// Deconnexion

if(isset($_POST['deco']))
{
    $user->deconnect();
}


// Modifier le mot de passe

if(isset($_POST['modifpass']))
{
    $user->modifpassword($_POST['ancien_pass'], $_POST['new_pass']);
}

if(isset($_GET['titre'])){

echo $user->recherche_auto($_GET['valeur']);

}
?>