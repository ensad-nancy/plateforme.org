<?php

/*
 * Squelette : prive/aide_menu.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Mon, 05 Dec 2011 11:31:30 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette prive/aide_menu.html
// Temps de compilation total: 2.724 ms
//

function html_71329fd3538fe8db4752d6b75143f88e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
'/**************************************************************************/
/*  SPIP, Systeme de publication pour l\'internet                          */
/*                                                                        */
/*  Copyright (c) 2001-2010                                               */
/*  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James */
/*                                                                        */
/*  Ce programme est un logiciel libre distribue sous licence GNU/GPL.    */
/*  Pour plus de details voir le fichier COPYING.txt ou l\'aide en ligne.  */ 
/**************************************************************************/

' .
vide($Pile['vars']['left'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','left','right'))) .
vide($Pile['vars']['right'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','right','left'))) .
vide($Pile['vars']['rtl'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','','_rtl'))) .
vide($Pile['vars']['chemin_img_pack'] = interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';'))) .
'a {text-decoration: none; }
A:Hover {text-decoration: underline;}

.article-inactif {
		float: ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
		text-align: ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
		width: 80%;
		background: url(' .
(is_array($a = ($Pile["vars"])) ? $a['chemin_img_pack'] : "") .
'triangle' .
(is_array($a = ($Pile["vars"])) ? $a['rtl'] : "") .
'.gif) ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
' center no-repeat;
		margin: 2px;
		padding: 0px;
		padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 20px;
		font-family: Arial, Sans, sans-serif;
		font-size: 12px;
}

.article-actif {
		float: ' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';
		text-align: ' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';
		width: 80%;
		background:  url(' .
(is_array($a = ($Pile["vars"])) ? $a['chemin_img_pack'] : "") .
'triangle' .
(is_array($a = ($Pile["vars"])) ? $a['rtl'] : "") .
'.gif) ' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
' center no-repeat;
		margin: 4px;
		padding: 0px;
		padding-' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
': 20px;
		font-family: Arial, Sans, sans-serif;
		font-size: 12px;
		font-weight: bold;
		color: black;
}

.article-actif:hover {
		text-decoration: none;
}
.rubrique {
		width: 90%;
		margin: 0px;
		margin-top: 6px;
		margin-bottom: 4px;
		padding: 4px;
		font-family: Trebuchet MS, Arial, Sans, sans-serif;
		font-size: 14px;
		font-weight: bold;
		color: black;
		background-color: #EEEECC;
}
');

	return analyse_resultat_skel('html_71329fd3538fe8db4752d6b75143f88e', $Cache, $page, 'prive/aide_menu.html');
}
?>