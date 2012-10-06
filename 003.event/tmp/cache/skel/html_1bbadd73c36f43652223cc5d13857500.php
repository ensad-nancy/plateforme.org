<?php

/*
 * Squelette : ../extensions/a2a/prive/style_prive_plugin_a2a.html
 * Date :      Mon, 05 Dec 2011 10:20:38 GMT
 * Compile :   Mon, 05 Dec 2011 10:22:44 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../extensions/a2a/prive/style_prive_plugin_a2a.html
// Temps de compilation total: 1.258 ms
//

function html_1bbadd73c36f43652223cc5d13857500($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
vide($Pile['vars']['claire'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_claire'],'edf3fe'),true)))) .
vide($Pile['vars']['foncee'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_foncee'],'3874b0'),true)))) .
vide($Pile['vars']['left'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','left','right'))) .
vide($Pile['vars']['right'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','right','left'))) .
'#formulaire_recherche_a2a .resultats li { padding: 5px 10px; border-bottom: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
'; }
#formulaire_recherche_a2a .resultats li .titre,
#formulaire_recherche_a2a .resultats li .actions { display: block; }
#formulaire_recherche_a2a .resultats li .actions { margin-top: 4px; text-align: ' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
'; }');

	return analyse_resultat_skel('html_1bbadd73c36f43652223cc5d13857500', $Cache, $page, '../extensions/a2a/prive/style_prive_plugin_a2a.html');
}
?>