<?php
session_start();
include 'connect_bdd.php';
include 'header.php';
$login = "";
$message="";
$message_success="";
if(isset($_POST['ajouter'])){
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    if(!empty($login) and !empty($mdp)){
        $mdph = md5($mdp);
        $requete = $pdo->prepare('insert into admin (login, mdp) values(?,?)');
        $requete->execute(array($login, $mdph));
        $message_success='Votre message à été bien pris en compte';

    }else{
        if(empty($login)){
            $message='le champ nom est obligatoire';
        }elseif(empty($mdp)){
            $message='le champ mot de passe est obligatoire';
        }

    }

}

?>
Vous etes connecté en tant que: <b style = "text-transform:uppercase;"><?php echo $_SESSION['login'];?></b>
<div>
    <p>Ajouter un nouvel administrateur</p>
</div>
<?php if($message){
    echo '<div class="alert alert-danger">'.$message .'</div>'; }
elseif($message_success){
    echo '<div class="alert alert-success">'.$message_success .'</div>'; }
?>

<form action="" method="post">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Entrez le Login" value="<?php echo $login?>" >
        </div>
        <div class="form-group col-md-4">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez le mot de passe" value="">
        </div>
    </div>    


    <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
</form>

<di></di>
<div class="lien_retour">
    <a href="pageadmin.php"><b>Retour à la liste des contacts</b></a>
</div>
<div calss=tail style="height:200px"></div>



<?php 
    include 'footer.php';
?>