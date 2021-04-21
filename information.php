<?php include 'header.php';?>
<?php $user->accesconnect(); ?>
    <main>
        <section class = 'caserouge'>
            <div class = 'caserougeinformation'>
                Information
            </div>
            <hr class="line-case">
        </section>
        <div class="position-cadre">
            <div class="cadre-information">
                <div class = 'casenoirinformation'>
                    Mes information de livraison
                </div>
                <hr class="line-information">
                <form method="POST" action="">
                    <div class="input-align">
                        <label class="label1" for="nom">Nom : </label>
                        <input class="input1" type='text' name='nom' placeholder="Nom">
                        <label class="label2" for="prenom">Prénom : </label>
                        <input class="input2" type='text' name='prenom' placeholder="Prénom">
                    </div>
                    <div class="input-align">
                        <label class="label1" for="pays">Pays : </label>
                        <input class="input1" type='text' name='pays' placeholder="Pays">
                        <label class="label2" for="ville">Ville : </label>
                        <input class="input2" type='text' name='ville'placeholder="Ville">
                    </div>
                    <div class="input-align">
                        <label class="label1" for="code-postal">C-P : </label>
                        <input class="input1" type='number' name='code-postal' placeholder="Code postal">
                        <label class="label2" for="phone">Téléphone : </label>
                        <input class="input2" type='number' name='phone' placeholder="Téléphone">
                    </div>
                    <div class="input-align">
                        <label class="label3" for="adresse">Adresse : </label>
                        <input class="input3" type='text' name='adresse' placeholder="Adresse">
                    </div>
                    <div class="input-align">
                        <label class="label4" for="email">E-mail : </label>
                        <input class="input4" type='email' name='email' placeholder="E-mail">
                    </div>
                </form>
            </div>
        </div>
        <button class="butt-valider-info">Valider information</button>
    </main>
    <?php include 'footer.php';?>
    </body>
</html>