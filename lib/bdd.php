<?php
$bdd_serveur     = "mysql5-9";
$bdd_utilisateur = "versatilsql";
$bdd_motDePasse  = "lx5lpbsq";
$bdd_base        = "versatilsql";

if($_SERVER['SERVER_NAME'] == "dev.plateforme.org"){
	$bdd_serveur     = "localhost";
	$bdd_utilisateur = "root";
	$bdd_motDePasse  = "root";
	$bdd_base        = "MWR";
	date_default_timezone_set ("Europe/Paris");
}
$power = mysql_connect($bdd_serveur, $bdd_utilisateur, $bdd_motDePasse)
        or die("Impossible de se connecter au serveur de bases de donn�es.");
    mysql_select_db($bdd_base)
        or die("Impossible de se connecter � la base de donn�es.");
?>