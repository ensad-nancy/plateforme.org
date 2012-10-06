<?php

/*
 * Squelette : squelettes-dist/inc-head.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Thu, 08 Dec 2011 15:45:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/inc-head.html
// Temps de compilation total: 1.623 ms
//

function html_e9341236dfb9f88599a1193fcf6c15d3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />
' .
(($t1 = strval(interdire_scripts(generer_url_public('backend'))))!=='' ?
		((	'<link rel="alternate" type="application/rss+xml" title="' .
	_T('public/spip/ecrire:syndiquer_site') .
	'" href="') . $t1 . '" />
') :
		'') .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('spip_style.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />
') :
		'') .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('spip_formulaires.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />
') :
		'') .
insert_head_css() .
'
' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('habillage.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />
') :
		'') .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('impression.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="print" />
') :
		'') .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('perso.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />
') :
		'') .
insert_head_css().pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>
');

	return analyse_resultat_skel('html_e9341236dfb9f88599a1193fcf6c15d3', $Cache, $page, 'squelettes-dist/inc-head.html');
}
?>