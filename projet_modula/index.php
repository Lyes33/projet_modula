<?php
session_start();
include 'connect_bdd.php';
include 'header.php';
$rows="";

if(isset($_POST['recherche'])){
    if(isset($_POST['nom'])){

        $nom = htmlspecialchars($_POST['nom']);

        if(!empty($nom)){
            $req = $pdo->prepare('select * from produit where nom like ?');
            $nom = $nom . '%';
            $req->execute(array($nom));
            //$rows = $req->fetchAll();
            $existe = $req->rowCount();
            if($existe > 0){
                $rows =  $req->fetchAll(PDO::FETCH_ASSOC);

            }else{
                $message='Aucun résultat ne correspond à votre recherche!';
            }

        }else{
            $message= 'Veuillez saisir votre recherche!';
        }
    }
}


?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="image/caros5.jpg" class="d-block w-100" alt="caros5">
        </div>
        <div class="carousel-item">
            <img src="image/caros6.jpg" class="d-block w-100" alt="caros6">
        </div>
        <div class="carousel-item">
            <img src="image/caros3.jpg" class="d-block w-100" alt="caros3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<center class="blocserch">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><span class="logo">mon Electroménager en ligne</span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <?php 
            if(isset($message)){
                echo '<div class="alert alert-danger">'.$message.'</div>';
            }
            ?>
            <form action="" method="post">
                <input type="search" class="champserch" name="nom" placeholder="Rechercher un article ex: cuisine / four / frigo /micro onde">
                <button class="btnrech" name="recherche"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</center>


<?php
if(isset($_POST['recherche']) and !empty($nom) and !empty($rows)){?>
<center>
    <div class="alert alert-success" style="width:50%"><strong>Le résultat de votre recherche: </strong></div> 
</center>
<div class="rech">
    <div class="row">

        <?php 
    foreach($rows as $ligne_tabs): 
        ?>
        <div class="col-sx-12 col-sm-12 col-md-3 col-lg-3">
            <img src="<?php  echo $ligne_tabs['lien']; ?>" class="fot" alt=""><br>
            <p><?php echo $ligne_tabs['descr'];?></p>
            <span><b>Prix: <?php echo $ligne_tabs['prix'];?> euros</b></span>
        </div>
        <?php endforeach;  ?>
    </div>
</div>
<?php } 
else{ ?>


<div class="container presentation">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><img src="image/acc1.jpg" style="width:100%"alt="acc2">
            <span><b>Notre collection de cafetières</b></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit illo quibusdam odio, possimus in mollitia. Dolorem voluptate, error, alias cum placeat cumque blanditiis voluptatum laudantium hic, illo minus laborum animi.</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><img src="image/acc2.jpg" style="width:100%"alt="acc2">
            <span><b>Ensomble pour cuisine</b></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus veniam, eos omnis. Ipsa, iusto, maiores? Hic facilis laborum, eum aperiam pariatur ipsum voluptatem praesentium soluta quas odit adipisci repellat, totam!</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><img src="image/accc2.jpg" style="width:100%"alt="acc2">
            <span><b>Notre gamme de Micro-ondes et Friteuses</b></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, hic nulla culpa quod natus necessitatibus dolores soluta odio dolore molestiae iusto! Voluptatum quia fugit maiores, consectetur eos ea repellendus molestiae.</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><img src="image/acc6.jpg" style="width:100%"alt="acc2">
            <span><b>Soyez les prmièrs à vous offrire le nouveau Micro-onde</b></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, vel fugiat expedita ipsum eos, debitis aliquid, sapiente, quia dolore repellendus amet. Iusto voluptatum provident consequuntur eius quia natus molestiae nihil.</p>

        </div>
    </div>
</div>

<?php ;}?>


<?php
include 'footer.php';
?>
