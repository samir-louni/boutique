<?php include 'header.php';?>
<section class='caserouge'>
    <div class='titrecaserouge'>
        Admin
    </div>
    <hr>
</section>
<section class="centrer_element">
    <table class = 'tableau2' >
        <thead>
            <tr>
                <td class = 'th2'><p class="detailcommande">payer 0/1<p></th>
                <td class = 'th2'><p class="detailcommande">N° Commande<p></th>
                <td class = 'th2'><p class="detailcommande">Quantité<p></th>
                <td class = 'th2'><p class="detailcommande">prix total<p></th>
                <td class = 'th2'><p class="detailcommande">Nom<p></th>
                <td class = 'th2'><p class="detailcommande">Prénom<p></th>
                <td class = 'th2'><p class="detailcommande">Pays<p></th>
                <td class = 'th2'><p class="detailcommande">Ville<p></th>
                <td class = 'th2'><p class="detailcommande">C-P<p></th>
                <td class = 'th2'><p class="detailcommande">tèl<p></th>
                <td class = 'th2'><p class="detailcommande">adresse<p></th>
                <td class = 'th2'><p class="detailcommande">e-mail<p></th>
                <td class = 'th2'><p class="detailcommande">nom article<p></th>
                <td class = 'th2'><p class="detailcommande">login user<p></th>
                <td class ='th2'><p class="detailcommande">Expédié<p></th>
            </tr>
        </thead>
        <tbody id = 'table-commande'>
        </tbody>
    </table>
</section>

<div class="footermarge">
    <?php include 'footer.php'?>
</div>


<script>
afficher_commande();
</script>

