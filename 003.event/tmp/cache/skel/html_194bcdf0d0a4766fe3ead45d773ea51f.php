<?php

/*
 * Squelette : ../extensions/porte_plume/prive/porte_plume_preview.html
 * Date :      Mon, 05 Dec 2011 10:08:56 GMT
 * Compile :   Mon, 05 Dec 2011 11:28:08 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../extensions/porte_plume/prive/porte_plume_preview.html
// Temps de compilation total: 1.114 ms
//

function html_194bcdf0d0a4766fe3ead45d773ea51f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . (	'Content-Type: text/html; charset=' .
	filtre_pp_charset('')) . '"); ?'.'>
<div class="preview">
' .
interdire_scripts(liens_absolus(filtrer('image_graver', filtrer('image_reduire',traitements_previsu((@$Pile[0]['data']),interdire_scripts((@$Pile[0]['champ'])),interdire_scripts((@$Pile[0]['objet']))),'500','0')))) .
'
' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		('<hr style=\'clear:both;\' /><div class="notes">' . $t1 . '</div>') :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_194bcdf0d0a4766fe3ead45d773ea51f', $Cache, $page, '../extensions/porte_plume/prive/porte_plume_preview.html');
}
?>