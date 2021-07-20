
<?php 


class admin
{

     public function dbconnect()
 {
     $db = new PDO("mysql:host=localhost; dbname=boutique", 'root', '');
    $this->_db = $db;
}

/// Fonction qui permet d'ajouter un article 



public function ajouterarticle($nomarticle, $descriptionarticle, $imagearticle, $categorie, $prix)
{
    $db = $this->_db;
    $descriptionarticle2 = trim($descriptionarticle);
    $requete = $db->prepare("INSERT INTO `article` (`nom_article`, `description_article`, `image_article`, `id_categorie`, `prix_article`) VALUES ('$nomarticle', '$descriptionarticle2', '$imagearticle', '$categorie', '$prix')");
    $requete->execute();
    echo 'Article ajouter';

}

// Fonction qui permet de supprimer un article.

public function supp_article($id)
{
    $db = $this->_db;
    $requete10 =$db->prepare("DELETE FROM article WHERE id_article='$id'");
    $requete10->execute();
}


// Fonction qui modifie l'article phare 

public function produit_phare($id_article, $image_phare, $text)
{
    $db = $this->_db;
    $_text = addslashes($text);
    $requete =$db->prepare("UPDATE `article_phare` SET `id_articles`='$id_article',`nom_article_phare`='$_text',`image_phare`='$image_phare' WHERE phare = 15");         
    $requete->execute();
    echo "Article phare modifiée en page d'accueil";


}

// Fonction qui modifie le prix d'un article 

public function modifier_prix($id, $prix)
{
    $db = $this->_db;
    $query = $db->prepare("UPDATE article SET prix_article = '$prix' WHERE id_article = $id");
    $query->execute();
    echo 'Prix changer';
}

// Fonction qui crée une nouvelle catégorie

public function newcategorie($name_categorie)
{
    $db = $this->_db;


        $requete = $db->prepare("INSERT INTO `categorie` (`nom_categorie`) VALUES ('$name_categorie')");
        $requete->execute();
        echo 'Nouvelle catégorie ajouter';

}


/// Supprimer une catégorie. 

public function delete_categorie_and_article($id)
{
    $db = $this->_db;
    $requete = $db->prepare("DELETE FROM `categorie` WHERE id='$id'");
    $requete2 = $db->prepare("DELETE FROM article WHERE id_categorie='$id'");
    $requete->execute();
    $requete2->execute();
}

// Fonction qui permet de supprimer un article

public function delete_article($id)
{
    $db = $this->_db;

    $requete2 = $db->prepare("DELETE FROM article WHERE id_article='$id'");
    $requete2->execute();
}

// Fonction qui affiche les commandes passer 

public function affichercommandepass(){
    $db = $this->_db;
    $requete2 = $db->prepare("SELECT * FROM detailcommande INNER JOIN commande on detailcommande.id_commande = commande.id_c INNER JOIN article on detailcommande.id_produit = article.id_article INNER JOIN utilisateurs on commande.id_utilisateur = utilisateurs.id ORDER BY detailcommande.id DESC");
    $requete2->execute();
    $resultat = $requete2->fetchall();
    return json_encode($resultat);
    
}


// Fonction qui  permet de modifier le statut d'expedition

public function expidition($id)
{
    $db = $this->_db;
    $requete =$db->prepare("UPDATE `commande` SET `expedie`='OUI' WHERE id_c = '$id'");
    $requete->execute();
    echo "Le client sera bien informé de l'expedition de son article !";


}

}

?>