<?php
session_start();
include 'connect_bdd.php';
include 'header.php';
$id = intval($_GET['id']);
$requete = $pdo->prepare('select * from contact where id=?');
$requete->execute(array($id));
$lignes = $requete->fetch();

?>

<div class="alert alert-warning user">
    <p>Utilisateur: <b><?php echo $lignes['nom'] .' '. $lignes['prenom'] ;?></b> </p>
</div>
<div class="tab_liste2">
    <b>Détail des informations: </b>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Adresse mail</th>
                <th scope="col">Le contenu du message</th>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col">Ip adresse</th>
            </tr>
        </thead>
        <tbody>
            <tr class="st" scope="row">
                <td> <?php echo $lignes['nom']; ?></td>
                <td> <?php echo $lignes['prenom']; ?></td>
                <td> <?php echo $lignes['email']; ?></td>
                <td> <?php echo $lignes['message']; ?></td>
                <td> <?php echo $lignes['date']; ?></td>
                <td> <?php echo $lignes['heure']; ?></td>
                <td> <?php echo $lignes['ip']; ?></td>
            </tr>  
        </tbody>
    </table>
    <div class="lien_retour">
        <a href="pageadmin.php"><b>Retour à la liste des contacts</b></a>
    </div>
</div>

<?php 
include 'footer.php';
?>