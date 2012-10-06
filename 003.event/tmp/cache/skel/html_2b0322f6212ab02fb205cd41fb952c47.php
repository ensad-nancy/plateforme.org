<?php

/*
 * Squelette : squelettes/inc-pied.html
 * Date :      Tue, 06 Dec 2011 13:56:38 GMT
 * Compile :   Thu, 08 Dec 2011 15:45:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes/inc-pied.html
// Temps de compilation total: 1.604 ms
//

function html_2b0322f6212ab02fb205cd41fb952c47($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!--<div id="pied">
	<a href="http://www.spip.net/" title="' .
_T('public/spip/ecrire:site_realise_avec_spip') .
'"><img src="' .
interdire_scripts(find_in_path('spip.png')) .
'" alt="SPIP" width="48" height="16" /></a> | 
	<a href="' .
interdire_scripts(entites_html((@$Pile[0]['skel']),true)) .
'" title="' .
_T('public/spip/ecrire:voir_squelette') .
'" rel="nofollow">' .
_T('public/spip/ecrire:squelette') .
'</a>' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : "") ? ' ':'')))))!=='' ?
		('
	' . $t1 . (	'| <a href="' .
	executer_balise_dynamique('URL_LOGOUT',
	array(),
	array('squelettes/inc-pied.html','html_2b0322f6212ab02fb205cd41fb952c47','',4,$GLOBALS['spip_lang'])) .
	'" rel="nofollow">' .
	_T('public/spip/ecrire:icone_deconnecter') .
	'</a>
	')) :
		'') .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : "") ? '':' ')))))!=='' ?
		($t1 . (	'| <a href="' .
	interdire_scripts(parametre_url(generer_url_public('login'),'url',self())) .
	'" rel="nofollow" class=\'login_modal\'>' .
	_T('public/spip/ecrire:lien_connecter') .
	'</a>')) :
		'') .
(($t1 = strval(invalideur_session($Cache, (include_spip("inc/autoriser")&&autoriser('ecrire')?" ":""))))!=='' ?
		('
	' . $t1 . (	'| <a href="' .
	interdire_scripts(eval('return '.'_DIR_RESTREINT_ABS'.';')) .
	'">' .
	_T('public/spip/ecrire:espace_prive') .
	'</a>')) :
		'') .
' | 
	<a rel="contents" href="' .
interdire_scripts(generer_url_public('plan')) .
'">' .
_T('public/spip/ecrire:plan_site') .
'</a> | 
	<a href="' .
interdire_scripts(generer_url_public('backend')) .
'" rel="alternate" title="' .
_T('public/spip/ecrire:syndiquer_site') .
'"><img src="' .
interdire_scripts(find_in_path('feed.png')) .
'" alt="' .
_T('public/spip/ecrire:icone_suivi_activite') .
'" width="16" height="16" />&nbsp;RSS&nbsp;2.0</a>
</div>-->
' .
"<!-- SPIP-CRON --><div style=\"background-image: url('http://event.plateforme.org/spip.php?action=cron');\"></div>" .
'
');

	return analyse_resultat_skel('html_2b0322f6212ab02fb205cd41fb952c47', $Cache, $page, 'squelettes/inc-pied.html');
}
?>