<?php

/*
 * Squelette : squelettes-dist/inc-entete.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Tue, 06 Dec 2011 13:37:04 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/inc-entete.html
// Temps de compilation total: 1.840 ms
//

function html_dc3dae177a4dedb727d6a881885c7da0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div id="entete">
<a rel="start home" href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/" title="' .
_T('public/spip/ecrire:accueil_site') .
'" class="accueil">' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'300','100'))))!=='' ?
		($t1 . ' ') :
		'') .
'<strong id="nom_site_spip">' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</strong></a>
' .
executer_balise_dynamique('MENU_LANG',
	array(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])),
	array('squelettes-dist/inc-entete.html','html_dc3dae177a4dedb727d6a881885c7da0','',3,$GLOBALS['spip_lang'])) .
'
</div>
');

	return analyse_resultat_skel('html_dc3dae177a4dedb727d6a881885c7da0', $Cache, $page, 'squelettes-dist/inc-entete.html');
}
?>