<?php

class user
{
private $_link;
private $_id;
private $_id_utilisateur;
private $_id_sujet;
public $_login;
public $_password;


/// Fonction pour se connecter a la base de données.

public function dbconnect()
{
    $db = new PDO("mysql:host=localhost; dbname=boutique", 'root', '');
    $this->_db = $db;
}



/// Fonction qui permet de se deconnecter.

public function deconnect()
{
    session_destroy();
}



/// Fonction qui permet de s'inscrire

public function inscription($email, $login, $nom, $prenom, $motdepasse)
{
    $db = $this->_db;

    $nom = htmlspecialchars($nom);
    $login = htmlspecialchars($login);
    $prenom = htmlspecialchars($prenom);
    $email = htmlspecialchars($email);
    $motdepasse = htmlspecialchars($motdepasse);

    $droit = 1;

    $_nom = trim($nom);
    $_login = trim($login);
    $_prenom = trim($prenom);
    $_email = trim($email);
    $_motdepasse = trim($motdepasse);
    $cryptage = password_hash($_motdepasse, PASSWORD_BCRYPT);
  

    $loginexistant = "SELECT `login` FROM utilisateurs WHERE login = '$_login'";
    $verification = $db->query($loginexistant);
    $emailexistant = "SELECT `email` FROM utilisateurs WHERE email = '$_email'";
    $verification2 = $db->query($emailexistant);




        if($verification2->fetch(PDO::FETCH_ASSOC) == 0 ){
            if($verification->fetch(PDO::FETCH_ASSOC) == 0 ){
                    $requete = $db->prepare("INSERT INTO `utilisateurs` (`email`, `login`, `nom`, `prenom`, `password`, `id_droit`) VALUES ('$_email', '$_login', '$_nom', '$_prenom', '$cryptage', '$droit')");
                    $requete->execute();
                    echo 'Bienvenue !';
            }else{
                echo  'Cette identifiant éxiste déjà';
            }
        }else{
            echo  'Cette email est déja utilisé';
        }
    }


/// Fonction qui permet de se connecter.

public function connexion($login, $password)
{
    
    $db = $this->_db;

    $login = htmlspecialchars($login);
    $password = htmlspecialchars($password);

    $_login = trim($login);
    $_password = trim($password);



    $requete = $db->prepare("SELECT * FROM utilisateurs WHERE login = '$_login'");
    $requete->execute();

    $verification = $requete->RowCount();
            if($verification == 1){
                $info = $requete->fetch();
                if( $_password == password_verify($_password, $info['password'])){
                    $_SESSION['login'] = $info['login'];
                    $_SESSION['password'] = $info['password'];
                    $_SESSION['nom'] = $info['nom'];
                    $_SESSION['prenom'] = $info['prenom'];
                    $_SESSION['email'] = $info['email'];
                    $_SESSION['id'] = $info['id'];
                    $_SESSION['id_droit'] = $info['id_droit'];
                    
                    echo "Connexion établie !";
                    header("refresh: 1; url=profil.php");
                }else{
                echo "Mauvais mot de passe !";
                }
            }else{
            echo "Cette identifiant n'existe pas ! ";
            }
}


public function acces_connect()
{
    if(!isset($_SESSION['login'])){
    echo "<body><section class = 'add_panier_msg'><section class = 'case_add_panier'>Tu dois être connecté pour acceder a cette page</section></section>";
    include 'footer.php';
    echo '</body>';
    exit;
    }
}

/// Fonction qui permet de modifier ses informations 
        

public function modifierinfo($login, $email, $nom, $prenom)
{
        $db = $this->_db;
        $id = $_SESSION['id'];
        $requete = $db->prepare("UPDATE utilisateurs SET nom='$nom' , prenom='$prenom' `login`='$login' `email`='$email' WHERE id=$id");
        $requete->execute();
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $email;
        $_SESSION['login'] = $login;
        echo 'Informations mise a jours ! ';
}



/// Fonction qui permet de modifier son mot de passe


public function modifpassword($ancienpass, $newpass)
{
    $db = $this->_db;
    $id = $_SESSION['id'];
    $password = $_SESSION['password'];
    $verif = password_verify($ancienpass, $password);

        if($ancienpass == $verif){

                $pass2 = password_hash($newpass, PASSWORD_BCRYPT);
                $requete = $db->prepare("UPDATE utilisateurs SET password='$pass2' WHERE id=$id");
                $requete->execute();
                echo 'Mot de passe changer';
                $_SESSION['password'] = $pass2;
        }else{
           echo  "Le mot de passe entrée n'est pas le bon";
        }


}


public function acces_admin()
{
    if($_SESSION['id_droit'] !=3){
        echo "<body><section class = 'add_panier_msg'><section class = 'case_add_panier'>Tu dois être admin pour acceder a cette page</section></section>";
    include 'footer.php';
    echo '</body>';
    exit;
    }
}


public function recherche($_recherche){
    

    $db = $this->_db;
    
    
        if(!empty($_recherche)){
            $recherche = htmlspecialchars($_recherche);
            $requete = $db->prepare("SELECT * FROM article WHERE nom_article LIKE '%$recherche%' ORDER BY id_article DESC");
            $requete->execute();
            $resultat = $requete->fetchall();
        
            foreach ($resultat as $key) {
                $prix = $key['prix_article'];
                $nom = $key['nom_article'];
                $image = $key['image_article'];
                $id2= $key['id_article'];   
                echo "<div class='card'>
                <img class = 'image_article_categorie' src='images-boutique/$image'>
                  <h2 >$nom</h2>
                  <p class='price' >$prix €</p>
                  <div class = 'button_align'>
                  <button><a href ='produitselect.php?idproduct=$id2'>Voir plus</a></button>
                  <button onclick='ajouter_panier($id2)'>Ajouter au panier</button>
             </div>
                  </div>";
            }
        }else{
            echo "Veuillez remplir le champ svp";
        }
    
    }

    public function recherche_auto($recherche)
{

    $db = $this->_db;
    $requete = $db->prepare("SELECT * FROM article WHERE nom_article LIKE '$recherche%' ORDER BY id_article DESC");
    $requete->execute();
    $resultat = $requete->fetchall();
    

    foreach($resultat as $result){
        $titre = $result['nom_article'];
        $id_ar = $result['id_article'];
        echo "<a href = 'produitselect.php?idproduct=$id_ar'><p class = 'resultat_search'>$titre</p></a>";

}

}

}
