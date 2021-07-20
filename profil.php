

<?php include 'header.php';?>
<?php $user->acces_connect(); ?>
<section class = 'caserouge'>
    <div class = 'titrecaserouge'>
        Mon profil
    </div>
    <hr>
</section>
    <section class = 'centrer'>

    <!-- Contenue de gauche  -->
    
        <section class = 'caseprofil'>
            <div class="gauche_liste">
            <p class="option-profil" id ='mon-comptes'>
                Mon compte
            </p>
            <p class="option-profil" id = 'modif'>
                Information
            </p>
            <p class="option-profil" id = 'modif-mdp'>
                Password
            </p>
            <?php if($_SESSION['id_droit'] == '3')
            {
            echo "<p class='option-profil'>
            <a href='admin.php'>Admin</a>  
            </p>";}
            ?>
            <p class="option-profil" id = 'deconnexion'>
               Deconnexion
            </p>
        </div>
            <div class = 'caseprofil2'>
                <img class = 'logouser2' src="images-boutique/man-user"><br>
                <!-- Mon comptes -->
                <section class = "info">
                    <div class = "gauche">
                        <p class = 'indication'>
                        Identifiant :<br>
                        <br>
                        E-mail :<br>
                        <br>
                        Nom :<br>
                        <br>
                        Prenom : 
                        </p>
                    </div>
                    <div class = "droite">
                        <span id = 'loginsession'><?php echo $_SESSION['login'];?></span><br>
                        <br>
                        <span id = 'emailsession'><?php echo $_SESSION['email'];?></span><br>
                        <br>
                        <span id = 'nomsession'><?php echo $_SESSION['nom'];?></span><br>
                        <br>
                        <span id = 'prenomsession'><?php echo $_SESSION['prenom'];?></span>
                    </div>
                </section>
                  <!-- Modifier les informations -->
                <section class="modif-info" id = 'modif-info'>
                <p> Login : <input type="text" value = '<?php echo $_SESSION['login']; ?>' id = 'logininfo' placeholder = 'LOGIN'></p><br>
               <p> Email : <input type="text" value = '<?php echo $_SESSION['email']; ?>' id = 'emailinfo' placeholder = 'EMAIL'></p><br>
               <p> Nom : <input type="text" value = '<?php echo $_SESSION['nom']; ?>' id = 'nominfo' placeholder = 'NOM'></p><br>
              <p> Prenom : <input type="text" value = '<?php echo $_SESSION['prenom']; ?>' id = 'prenominfo' placeholder = 'PRENOM'></p> <br>
              <div class = 'button_center'>
                        <button type = 'submit' id = 'modification_button'>MODIFIER</button>
                    </div>
                </section>

                <!-- Modifier le mot de passe -->
                <section class="modif-pass" id = 'modif-pass'>
                    <input type="password" placeholder = 'ANCIEN PASSWORD' id = 'ancien_pass' ></p><br>
                    <input type="password"  placeholder = 'PASSWORD' id = 'new_pass'></p><br>
                    <input type="password"placeholder = 'CONFIRMER' id = 'confirm_pass'></p><br>
                    <div class = 'button_center'>
                        <button type = 'submit' id = 'password_button'>MODIFIER</button>
                    </div>
                </section>  
            </div> 
<script>
    style();
    modifier_info();
    deconnexion_profil()
    modifier_pass();
</script>
        </section>
    </section>
    <?php include 'commande.php'; ?>
    <?php include 'footer.php';?>
</body>
</html>

