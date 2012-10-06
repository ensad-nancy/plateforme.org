<?php

/*
 * Squelette : squelettes-dist/formulaires/administration.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Thu, 08 Dec 2011 15:45:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/formulaires/administration.html
// Temps de compilation total: 3.071 ms
//

function html_90c120fc3bf86e0004ad5547788a4c51($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
' <div' .
(($t1 = strval(interdire_scripts(entites_html(sinon(@$Pile[0]['divclass'],'spip-admin-bloc'),true))))!=='' ?
		(' class="' . $t1 . '"') :
		'') .
' id="spip-admin" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['analyser']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons"
		id="analyser">' .
	_T('public/spip/ecrire:analyse_xml') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['xhtml_error']),true))))!=='' ?
			(' (' . $t2 . ')') :
			'') .
	'</a>')) :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_article']),true))))!=='' ?
		((	'<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_article']),true)) .
	'" class="spip-admin-boutons"
		id="voir_article">' .
	_T('public/spip/ecrire:article') .
	'&nbsp;') . $t1 . '</a>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_breve']),true))))!=='' ?
		((	'<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_breve']),true)) .
	'" class="spip-admin-boutons"
		id="voir_breve">' .
	_T('public/spip/ecrire:breve') .
	'&nbsp;') . $t1 . '</a>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true))))!=='' ?
		((	'<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_rubrique']),true)) .
	'" class="spip-admin-boutons"
		id="voir_rubrique">' .
	_T('public/spip/ecrire:rubrique') .
	'&nbsp;') . $t1 . '</a>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_mot']),true))))!=='' ?
		((	'<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_mot']),true)) .
	'" class="spip-admin-boutons"
		id="voir_mot">' .
	_T('public/spip/ecrire:mots_clef') .
	'&nbsp;') . $t1 . '</a>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['id_syndic']),true)) ?' ' :''))))!=='' ?
		($t1 . (($t2 = strval(invalideur_session($Cache, (((include_spip("inc/autoriser")&&autoriser('modifier', 'site', interdire_scripts(invalideur_session($Cache, entites_html((@$Pile[0]['id_syndic']),true))))?" ":"")) ?' ' :''))))!=='' ?
			($t2 . (	'
	<a href="' .
		interdire_scripts(entites_html((@$Pile[0]['voir_site']),true)) .
		'" class="spip-admin-boutons"
		id="voir_site">' .
		_T('public/spip/ecrire:info_site') .
		'&nbsp;' .
		interdire_scripts(entites_html((@$Pile[0]['id_syndic']),true)) .
		'</a>')) :
			'')) :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id_auteur']),true))))!=='' ?
		((	'<a href="' .
	interdire_scripts(entites_html((@$Pile[0]['voir_auteur']),true)) .
	'" class="spip-admin-boutons"
		id="voir_auteur">' .
	_T('public/spip/ecrire:auteur') .
	'&nbsp;') . $t1 . '</a>') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['ecrire']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons" id="ecrire">' .
	_T('public/spip/ecrire:espace_prive') .
	'</a>')) :
		'') .
'
	<a href="' .
parametre_url(self(),'var_mode',interdire_scripts(entites_html((@$Pile[0]['calcul']),true))) .
'" class="spip-admin-boutons"
		id="var_mode">' .
_T('public/spip/ecrire:admin_recalculer') .
interdire_scripts(entites_html((@$Pile[0]['use_cache']),true)) .
'</a>' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['statistiques']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons"
		id="statistiques">' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['visites']),true))))!=='' ?
			((	_T('public/spip/ecrire:info_visites') .
		'&nbsp;') . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['popularite']),true))))!=='' ?
			((	';&nbsp;' .
		_T('public/spip/ecrire:info_popularite_5') .
		'&nbsp;') . $t2) :
			'') .
	'</a>')) :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['preview']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons"
		id="preview">' .
	_T('public/spip/ecrire:previsualisation') .
	'</a>')) :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['debug']),true))))!=='' ?
		('
	<a href="' . $t1 . (	'" class="spip-admin-boutons" id="debug">' .
	_T('public/spip/ecrire:admin_debug') .
	'</a>')) :
		'') .
'
</div>');

	return analyse_resultat_skel('html_90c120fc3bf86e0004ad5547788a4c51', $Cache, $page, 'squelettes-dist/formulaires/administration.html');
}
?>