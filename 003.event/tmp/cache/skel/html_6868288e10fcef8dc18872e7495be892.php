<?php

/*
 * Squelette : prive/informer_auteur.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Mon, 05 Dec 2011 10:35:38 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette prive/informer_auteur.html
// Temps de compilation total: 0.791 ms
//

function html_6868288e10fcef8dc18872e7495be892($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . 'Content-Type: text/plain' . '"); ?'.'>' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
interdire_scripts(informer_auteur(normaliser_date(@$Pile[0]['date']))));

	return analyse_resultat_skel('html_6868288e10fcef8dc18872e7495be892', $Cache, $page, 'prive/informer_auteur.html');
}
?>