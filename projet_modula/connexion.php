<?php
session_start();
include 'connect_bdd.php';
include 'header.php';
$login="";
$mdp="";
$message="";

if(isset($_POST['connexion'])){
    $login = $_POST['login'];
    $mdp = md5($_POST['mdp']);
    if(!empty($login) and!empty($mdp)){
        $req = $pdo->prepare('select * from admin where login = ? and mdp = ?'); 
        $req->execute(array($login, $mdp)); 
        $existe = $req->rowCount();
        if($existe > 0 ){
            $donnees = $req->fetch();
            $_SESSION['id'] = $donnees['id'];
            $_SESSION['login'] = $donnees['login'];
            $_SESSION['mdp'] = $donnees['mdp'];

            header('location:pageadmin.php?id='.$_SESSION['id']); 

        } else{
            $message='Votre identifiant ou mot de passe incorrect';
        }
    }else{
        if(empty($login)){
            $message='le champs login ne doit pas etre vide';
        }elseif(empty($mdp)){
            $message='le champs mot de passe ne doit pas etre vide';
        }else{
            $message='Vous devez remplir tous les champs';
        }
    }
}

?>
<div class="container-fluid content">

    <?php if($message){
    echo '<div class="alert alert-danger">'.$message .'</div>'; } ?>

    <div class="formconnect">
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Votre login" value="<?php echo $login ?>" >
                </div>
                <div class="form-group col-md-6">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Votre mot de passe" value="<?php ?>"  >
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>
        </form>
    </div>
</div>

<?php
    include 'footer.php';
?>
