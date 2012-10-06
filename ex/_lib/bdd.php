<?php
$bdd_serveur     = "mysql5-9";
$bdd_utilisateur = "versatilsql";
$bdd_motDePasse  = "lx5lpbsq";
$bdd_base        = "versatilsql";

$zone = explode('.',$_SERVER['SERVER_NAME']);
if($zone[0] == "dev") {
	$bdd_serveur     = "localhost";
	$bdd_utilisateur = "root";
	$bdd_motDePasse  = "root";
	$bdd_base        = "MWR";
}

$power = mysql_connect($bdd_serveur, $bdd_utilisateur, $bdd_motDePasse)
        or die("Impossible de se connecter au serveur de bases de donnŽes.");
    mysql_select_db($bdd_base)
        or die("Impossible de se connecter ˆ la base de donnŽes.");
?>