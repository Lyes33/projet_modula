<?php
session_start();
include 'connect_bdd.php';
include 'header.php';
 if(isset($_SESSION['id'])){ 
$liste = $pdo->prepare('select * from contact ORDER BY date DESC');
$liste->execute();
$exist = $liste->rowCount();
if($exist > 0){
    $rows =  $liste->fetchAll(PDO::FETCH_ASSOC);

}else{
    $rows='';
    $message='Aucun utilisateur n\'est disponible dans la base!';
}
?>

<?php if($rows != ""){
?>
<div class="tab_liste">
    <span class="titre_liste"><b>Liste des utilisateurs: </b></span>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col">Adresse mail</th>
            </tr>
        </thead>
        <tbody>
            <?php 
    foreach($rows as $row): 
            ?>
            <tr class="st" scope="row">
                <td> <?php echo $row['date']; ?></td>
                <td> <?php echo $row['heure']; ?></td>
                <td><a href="detailclient.php?id=<?php echo $row['id']; ?>"><?php echo $row['email']; ?></a></td>
            </tr>   
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>
<?php  
}
else{
?>
<div class="liste_vide">
    <div class="alert alert-danger"><?php echo $message; ?></div>
</div>
<?php } 
 } 
else{ header('location:index.php');}
?>

<?php 
include 'footer.php';
?>