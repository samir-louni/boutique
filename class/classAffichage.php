<?php 


class affichage
{

     public function dbconnect()
 {
     $db = new PDO("mysql:host=localhost; dbname=boutique", 'root', '');
    $this->_db = $db;
}

    public function affichercategorie()
{  
    $db = $this->_db;
    $requete = $db->prepare('SELECT id, nom_categorie FROM categorie ORDER BY id ASC');
    $requete->execute();
    $resultat = $requete->fetchall();
    return json_encode($resultat);
}

// public function affichercategorie()
// {  
//     $db = $this->_db;
//     $requete = $db->prepare('SELECT id, nom_categorie FROM categorie ORDER BY id ASC');
//     $requete->execute();
//     $resultat = $requete->fetchall();
     
//     foreach ($resultat as $key) {
//         $id = $key['id'];
//         echo "<li>"."<a href='produit.php?id=$id'>".$key['nom_categorie']. '</a>' . "</li>";
//     }
// }

public function produit_phare_affiche()
{

$db = $this->_db;
$requete =$db->prepare("SELECT * FROM article_phare  ORDER BY id_phare DESC LIMIT 1");
$requete->execute();
$resultat = $requete->fetchall();

    foreach ($resultat as $key) {
        $nom = $key['nom_article_phare'];
        $image = $key['image_phare'];
        $image_fin = "background-image:url('images-boutique/$image')";
        $id = $key['id_articles'];

        echo "<div class='iphone-red' style=$image_fin alt='Produit phare'>";
            echo " <div class='arrivage'>
                        <h1 class='titre-acceuil-1'>
                            $nom
                        </h1>
                        <a href='produitselect.php?idproduct=$id'><button class='butt-acceuil-1'>En profiter</button></a>
                    </div>
               </div>";
    } 
}


public function dernier_produit()
{

$db = $this->_db;
$requete =$db->prepare("SELECT * FROM article  ORDER BY id_article DESC LIMIT 3");
$requete->execute();
$resultat = $requete->fetchall();

    foreach ($resultat as $key) {
        $nom = $key['nom_article'];
        $image = $key['image_article'];
        $id = $key['id_article'];

        echo "<div class='produit-phare'>
        <div class = 'voir_plus'>$nom</div>
        <a href='produitselect.php?idproduct=$id'>
        <img class = 'produit-phare2' src = 'images-boutique/$image' alt='produits mit en avant'>
        </a>
        </div>";
    } 
}


// Afficher les articles 
public function afficherbaseproduit()
{  
    $db = $this->_db;
    $requete = $db->prepare('SELECT id_article, nom_article, prix_article FROM article WHERE 1');
    $requete->execute();
    $resultat = $requete->fetchall();

    return json_encode($resultat);
}

public function afficherbasededonner()
{  
    $db = $this->_db;
    $requete = $db->prepare('SELECT id, login, id_droit FROM utilisateurs WHERE 1');
    $requete->execute();
    $resultat = $requete->fetchall();
    return json_encode($resultat);
}



/* CHANGER LES DROITS */ 

public function changementdedroit($_id_droit, $_id_utilisateur)
{
    $db = $this->_db;
    $verif = "SELECT id FROM utilisateurs WHERE id = '$_id_utilisateur'";
    $requete = $db->query($verif);

    if(!empty($_id_droit) && (!empty($_id_utilisateur))){
        if ($requete->fetch(PDO::FETCH_ASSOC) == 0) {
            echo 'Cette id n\'existe pas';
        }else{
            $query = $db->prepare("UPDATE utilisateurs SET id_droit = '$_id_droit' WHERE id = $_id_utilisateur");
            $query->execute();
            
            if($_id_droit == 3){
                echo 'L\'utilisateur est passé admin !';
            }elseif($_id_droit == 2){
                echo 'L\'utilisateur est passé modérateur !';
            }else{
            echo  'L\'utilisateur est passé membre !';
            }
        }
}


}

public function afficher_article_prix()
{
$db = $this->_db;
$requete3 = $db->prepare('SELECT * FROM article');
$requete3->execute();
$resultat3 = $requete3->fetchall();

return json_encode($resultat3);

}


public function afficherarticle($id)
{
    
$db = $this->_db;
$requete = $db->prepare("SELECT * FROM article INNER JOIN categorie ON  categorie.id = article.id_categorie WHERE id_categorie='$id'");
$requete->execute();
$resultat = $requete->fetchall();


    foreach ($resultat as $key) {

    $nomcategorie = $key['nom_categorie'];
    $description = $key['description_article'];
    $prix = number_format($key['prix_article'],2,',',' ');
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
}

public function afficherarticleseul($id)
{
    $db = $this->_db;
    $requete = $db->prepare("SELECT * FROM article WHERE id_article='$id'");
    $requete->execute();
    $resultat = $requete->fetchall();

    foreach ($resultat as $key) {

    $description = $key['description_article'];
    $prix = number_format($key['prix_article'],2,',',' ');
    $nom = $key['nom_article'];
    $image = $key['image_article'];
    $id2= $key['id_article'];
        
    echo "<section class = 'case_produit_back'>
            <div class = 'photo'>
                <img class = 'image' src = 'images-boutique/$image'>
            </div>
            <div class = 'titre2'>
                <h3 class = 'titre_product'>$nom</h3>
                <div class = 'description'>
                    $description
                </div>
                <p class ='didi'>$prix €</p>
                <button onclick='ajouter_panier($id2)'>Ajouter au panier</button>
            </div>
            </section>";
    }

}

public function mes_commandes(){
    $db = $this->_db;
    $id = $_SESSION['id'];
    $requete = $db->prepare("SELECT * FROM detailcommande INNER JOIN commande on detailcommande.id_commande = commande.id_c INNER JOIN article on detailcommande.id_produit = article.id_article INNER JOIN utilisateurs on commande.id_utilisateur = utilisateurs.id WHERE id_utilisateur = '$id'");
    $requete->execute();
    $resultat = $requete->fetchall();

    
    foreach ($resultat as $key) {
        $id_article = $key['id_article'];

        echo "<tr>";
            echo "<td class='tdpetit'>".$key['id_commande']."</td>";
            echo "<td class='tdpetit'>".$key['quantite']."</td>";
            echo "<td class='tdgrand'>".$key['prix_total']. '.OO €' ."</td>";
            echo "<td class='tdpetit'>".$key['nom_commande']."</td>";
            echo "<td class='tdpetit'>".$key['prenom_commande']."</td>";
            echo "<td class='tdpetit'>".$key['pays']."</td>";
            echo "<td class='tdpetit'>".$key['ville']."</td>";
            echo "<td class='tdpetit'>".$key['cp']."</td>";
            echo "<td class='tdpetit'>".$key['telephone']."</td>";
            echo "<td class='tdgrand2'>".$key['adresse']."</td>";
            echo "<td class='tdgrand'>".$key['email_commande']."</td>";
            echo "<td class='tdgrand2'>".$key['nom_article']."</td>";
            echo "<td class='tdmoyen'>" . "<a href='produitselect.php?idproduct=$id_article'>" . "<img class = 'img_panier2' src = 'images-boutique/" .$key['image_article']. "'>" . "</a>" . "</td>";
            echo "<td class='tdgrand2'>".$key['date_commande']."</td>";
            echo "<td class='tdgrand2'>".$key['expedie']."</td>";
            echo "</tr>";

    }
}

}

?>