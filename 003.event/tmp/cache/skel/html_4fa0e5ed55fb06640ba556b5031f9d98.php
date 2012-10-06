<?php

/*
 * Squelette : extensions/filtres_images/modeles/favicon.html
 * Date :      Mon, 05 Dec 2011 10:08:56 GMT
 * Compile :   Tue, 06 Dec 2011 13:40:39 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette extensions/filtres_images/modeles/favicon.html
// Temps de compilation total: 0.699 ms
//

function html_4fa0e5ed55fb06640ba556b5031f9d98($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(interdire_scripts(((($a = extraire_attribut(filtrer('image_graver', filtrer('image_format',filtrer('image_recadre',filtrer('image_passe_partout',((($a = ((($a = (@$Pile[0]['favicon'])) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(find_in_path('favicon.ico')))) OR (!is_array($a) AND strlen($a))) ? $a : 
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />'))),'32','32'),'32','32','center'),'ico')),'src')) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(find_in_path('spip.ico'))))))!=='' ?
		('<link rel="shortcut icon" href="' . $t1 . '" type="image/x-icon" />') :
		'') .
'
');

	return analyse_resultat_skel('html_4fa0e5ed55fb06640ba556b5031f9d98', $Cache, $page, 'extensions/filtres_images/modeles/favicon.html');
}
?>