<?php
	define('HOTE','localhost');	
	define('BDD','electro_bdd');	
	define('UTIL','root');	
	define('PORT', '3306');	
	define('MDP','');	

	try {
		$pdo = new PDO('mysql:host=' . HOTE . ';dbname=' . BDD . ';port=' .PORT. ';cherset=UTF8',UTIL,MDP);
		$pdo->exec("set character set utf8");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch (PDOException $e){
		echo 'La connexion a échouée, vérifiez les paramètres de connexion...! : ' . $e->getMessage();
		exit(1);
	}

?>
