<?php
session_start();
include 'connect_bdd.php';
include 'header.php';
$date = date("d-m-Y");
$heure = date("H:i");
function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ipadresse = getIp();
$nom = "";
$prenom = "";
$mail = "";
$mess="";
$message="";
$message_success="";

if($_POST){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mess = $_POST['mess'];
    if(isset($_POST['rgpd'])){
        $rgpd = $_POST['rgpd'];
    }
    else{
        $rgpd = "";
    }
    if(isset($_POST['captcha']) and !empty($_POST['captcha'])){
        if($_POST['captcha']==$_SESSION['code']){
            if(!empty($nom) and !empty($prenom) and !empty($mail) and !empty($mess) and !empty($rgpd)){
                $requete = $pdo->prepare('insert into contact (nom, prenom, email, message,rgpd,date, heure, ip) values(?, ?, ?, ?, ?, ?, ?, ?)');
                $requete ->execute(array($nom, $prenom, $mail, $mess, $rgpd, $date, $heure, $ipadresse));
                $message_success='Votre message à été bien pris en compte';

            }else{
                if(empty($nom)){
                    $message='Impossible d\'envoyer votre messages! le champ nom est obligatoire';
                }elseif(empty($prenom)){
                    $message='Impossible d\'envoyer votre messages! le champ prénom est obligatoire';
                }elseif(empty($mail)){
                    $message='Impossible d\'envoyer votre messages! le champ email est obligatoire';
                }elseif(empty($mess)){
                    $message='Impossible d\'envoyer votre messages! le champ message est obligatoire';
                }elseif(empty($rgpd)){
                    $message='Impossible d\'envoyer votre messages! vous devez accepterle régelment général';
                }

            }
        } else {
            $message='Code de vérification incorrect, veuillez saisir le code correct';

        }
    }else{
        $message='Impossible d\'envoyer votre messages! vérifiez que avez bien rempli tous les champs...';
    }    
}

?>

<div class="container-fluid f_contact">
    <?php if($message){
    echo '<div class="alert alert-danger">'.$message .'</div>'; }
    elseif($message_success){
        echo '<div class="alert alert-success">'.$message_success .'</div>'; }
    ?>

    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" value="<?php echo $nom ;?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom" value="<?php echo $prenom ; ?>"  >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mail">Mail</label>
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Votre email" value="<?php echo $mail; ?>" >
            </div>

        </div> 
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="mess">Votre message</label>
                <textarea class="form-control" id="mess" name="mess" value="<?php  echo $mess ;?>" ></textarea>
            </div>
        </div>
        <div>
            <input name="captcha" type="text">
            <img src="captcha.php" style="vertical-align: middle;"/>
        </div>
        <div>
            <label for="rgpd">
                <span class="checkbox">
                    <input type="checkbox" id="rgpd" name="rgpd" value="oui" class="box">
                    Règlement général sur la protection des données
                </span>
            </label>
        </div>


        <button type="submit" class="btn btn-primary" name="soumettre">Soumettre</button>
    </form>
</div>


<?php
include 'footer.php';
?>
