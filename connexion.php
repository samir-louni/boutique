
<?php include 'header.php';?>
<section class = 'caserouge'>
    <div class = 'titrecaserouge'>
        Connexion - Inscription
    </div>
    <hr>
</section>
<section class = 'caseconnexioninscription'>
        <section class = 'caseinscriptionbase'>
            <div class="image_inscription">
            </div>
            <div class = 'caseinscription'>
                <div class="form_connexion" id = 'form_connexion'  autocomplete = 'off'>
                    <form action = '' method = 'post'>
                        <input type = 'text'  placeholder = 'IDENTIFIANT'  id ='login'><br>
                        <input type = 'password'  placeholder = 'PASSWORD' id ='pass'> <br>
                    </form>
                    <div class = 'button_center'>
                        <button type = 'submit' id = 'connexion_button'>CONNEXION</button>
                    </div>
                    <p id = 'inscrivez-vous'>Toujours pas inscrit ?</p>
                </div>
            <div id = 'form_inscription'>
                    <form action = '' method = 'post' autocomplete = 'off'>
                        <input type = 'email' placeholder = 'EMAIL' id ='mail' name = 'mail'>
                        <input type = 'text' placeholder = 'IDENTIFIANT' id = 'identifiant' name = 'identifiant ' ><br>
                        <input  type = 'text' placeholder = 'NOM' id = 'nom' name = 'nom'>
                        <input   type = 'text' placeholder = 'PRENOM' id = 'prenom' name = 'prenom'><br>
                        <input type = 'password' placeholder = 'PASSWORD' id ='password-inscription' name = 'password-inscription'> 
                        <input type = 'password' placeholder = 'PASSWORD' id = 'confirm-password' name = 'confirm-password'> <br>
                    </form>
                    <div class = 'button_center'>
                        <button type = 'submit' id = 'inscription_button'>INSCRIPTION</button>
                    </div>
                    <p id = 'connectez-vous'>Se connecter</p>
            </div>
          </div>
        </section>
    </section>
<?php include 'footer.php';?>
</body>
</html>

<script>
    inscription();
    connexion();
</script>
<script src = 'javascript/style.js'></script>