<?php include 'header.php';?>
<?php $user->acces_connect(); ?>
<?php $user->acces_admin(); ?>
<?php
$db = new PDO("mysql:host=localhost; dbname=boutique", 'root', '');
$requete = $db->prepare('SELECT id, nom_categorie FROM categorie WHERE 1');
$requete->execute();
$resultat = $requete->fetchall();

$requete2 = $db->prepare('SELECT * FROM article WHERE 1 ORDER BY nom_article ASC');
$requete2->execute();
$resultat2 = $requete2->fetchall();

$requete3 = $db->prepare('SELECT * FROM article');
$requete3->execute();
$resultat3 = $requete3->fetchall();
?>

<section class='caserouge'>
  <div class='titrecaserouge'>Admin</div>
  <hr>
</section>
<div class="select_admin">
  <p id='add_article_js'>Ajouter un article</p>
  <p id='prix'>Modifier le prix d'un article</p>
  <p id='delete_button'>Supprimer un article</p>
  <p id='categorie_js'>Catégories</p>
  <p id='gerer_js'>Gerer les droits</p>
  <p id='phare'>Changer d'article phare</p>
  <a href='admincommande.php'>
    <p id='commande'>Commandes</p>
  </a>
</div>
<script>
  $('#prix').click(function(){
      $('#modification_prix').slideDown(1000)
  })
</script>
<section class="centrer_element">
  <section class='add_article' id='add_article_vue'>
    <form action='' method='post'>
      <input class='upload-box' type='file' accept="image/png, image/jpeg" id='image_article' placeholder='Images'>
      <br>
      <input type='text' id='nomarticle' placeholder='NOM'>
      <br>
      <input type='number' id='prixarticle' placeholder='PRIX'>
      <br>
      <textarea id="descriptionarticle" maxlenght="368" rows="5" cols="33" placeholder='DESCRIPTION'>DESCRIPTION</textarea>
      <br>
      <select id='selection' placeholder='CATEGORIE'>
        <?php foreach ($resultat as $key) {
            $id=$key[ 'id']; $nom=$key[ 'nom_categorie']; echo "<option value='$id'>$nom</option>";
            } ?>
      </select>
      <br>
    </form>
    <div class="buttonalign">
      <button type='submit' id='ajout_article'>Ajouter l'article</button>
    </div>
  </section>
  <script>
  $('#ajout_article').click(function(){
    ajouterarticleajax();
    })
  </script>
</section>

<section class="centrer_element">
  <section class="categorie_liste" id='categorie_liste'>
    <div class='box1'>
      <h3 class='titreconnexioninscription2'>Ajouter catégorie</h3>
      <section class='form_add_categorie'>
        <form action='' method='POST'>
          <input type='text' id='name_categorie' placeholder='NOM DE LA CATEGORIE'>
          <br>
        </form>
        <div class="buttonalign">
          <button id='add_categorie'>Ajouter</button>
        </div>
    </div class='box1'>
    <script>
  $('#add_categorie').click(function(){
                          addcat();
                      })
    </script>
    </div>
    <script src='javascript/style.js'></script>
    <script src='javascript/fonction.js'></script>
    <div class='box2'>
      <h3 class='titreconnexioninscription2'>Supprimer catégorie</h3>
      <section class='form_add_categorie'>
        <form action='' method='post'>
          <div id='liste_categorie'>
          </div>
    </div class='box1'>
    </section>
    <script>
  afficher_categorie();
    </script>
    </section>
  </section>
  </div>
</section>
    <section class="centrer_element">
  <section class='center_table' id='table_supp'>
    <table class='tableau1'>
      <thead>
        <tr>
          <th class='th1'>
            <h3>nom de l'article
              <h3>
          </th>
          <th class='th1'>
            <h3>Prix
              <h3>
          </th>
          <th class='th1'>
            <h3>Supprimer
              <h3>
          </th>
        </tr>
      </thead>
      <tbody id='tableau'>
        <script>
  afficher_article_tableau();
        </script>
      </tbody>
    </table>
  </section>
</section>
<section class='changer_droit_affiche' id='changer_droit_affiche'>
  <section class='center_table'>
    <table class='tableau1'>
      <thead>
        <tr>
          <th class='th1'>
            <h3>ID
              <h3>
          </th>
          <th class='th1'>
            <h3>Login
              <h3>
          </th>
          <th class='th1'>
            <h3>Accès
              <h3>
          </th>
        </tr>
      </thead>
      <tbody id='tableau-user'>
        <script>
  afficher_utilisateurs();
        </script>
      </tbody>
    </table>
  </section>
  <section class="centrer_element">
    <form action="" method="POST">
      <section class='form_droit' id='form_droit'>
        <p class='formulairep'>Droit</p>
        <select name="changementdroit" id="changementdroit">
          <option id='iddroit' value="1">Membres</option>
          <option id='iddroit' value="2">Modérateur</option>
          <option id='iddroit' value="3">Admin</option>
        </select>
        <br>
        <p class='formulairep'>Id de l'utilisateur</p>
        <br>
        <input type='number' id='iduser' placeholder='ID '>
        <br>
        <div class="buttonalign">
    </form>
    <button id='button_droit'>Modifier les droits</button>
    </div>
    </section>
    <div class='msg_centrer'>
    </div>
    <script>
    changer_droit();
    </script>
  </section>
</section>

       
<?php $admin->affichercommandepass(); ?>
<script>
  $('#commande').click(function(){
      ('#tablo').slideDown(1000)
  })
</script>
<section class="centrer_element">
  <section class='add_article' id='add_phare'>
    <form action='' method='post'>
      <label for='article_select' class='lbladmin'>Article :</label>
      <select name="article_select" id='articlenom'>
        <?php foreach ($resultat3 as $key3) { $id3=$key3[ 'id_article']; $nom3=$key3[ 'nom_article']; echo "<option value='$id3'>$nom3</option>";} ?>
      </select>
      <br>
      <label class='lbladmin' for='textaffiche' class='description'>Nom :</label>
      <input type='text' id='textaffiche' placeholder='TEXTE A AFFICHER'>
      <br>
      <label class='lbladmin' for='imagearticles2'>Images :</label>
      <input class='upload-box' type='file' id='imagearticle2' accept="image/png, image/jpeg">
      <br>
    </form>
    <div class="buttonalign">
      <button id="changer_article_phare">CHANGER D'ARTICLE</button>
    </div>
  </section>
</section>
<script>
  $('#changer_article_phare').click(function(){
  articlephare();
  })
</script>
<section class="centrer_element">
  <section class='casebase2'>
    <section class='add_article' id='modification_prix'>
      <form action='' method='post'>
        <label for='article_select2' class='lbladmin'>Article :</label>
        <select name="article_select2" id='article_select'>
          <script>
  affiche_prix();
          </script>
        </select>
        <br>
        <label class='lbladmin' for='textaffiche' class='description'>Nouveau prix :</label>
        <input type='number' id='new_prix'>€
        <br>
      </form>
      <div class="buttonalign">
        <button id="button_prix">CHANGER LE PRIX</button>
      </div>
      <script>
  modifier_prix();
      </script>
    </section>
  </section>
</section>
</section>
</section>
<div class="footermarge">
  <?php include 'footer.php'?>
</div>
</body>
</html>


