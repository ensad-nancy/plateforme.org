<?php

/*
 * Squelette : ../prive/editer/article.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:05 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/editer/article.html
// Temps de compilation total: 1.995 ms
//

function html_62d8cbe642ba19cfe729462fc053a6d0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<div class=\'cadre-formulaire-editer\'>
<div class="entete-formulaire">
	' .
(@$Pile[0]['icone_retour']) .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
		((	_T('public/spip/ecrire:texte_modifier_article') .
	'
	<h1>') . $t1 . '</h1>') :
		'') .
'
</div>
' .
executer_balise_dynamique('FORMULAIRE_EDITER_ARTICLE',
	array(interdire_scripts(entites_html((@$Pile[0]['new']),true)),interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true)),interdire_scripts(entites_html((@$Pile[0]['redirect']),true)),interdire_scripts(entites_html((@$Pile[0]['lier_trad']),true)),interdire_scripts(entites_html((@$Pile[0]['config_fonc']),true)),interdire_scripts(entites_html((@$Pile[0]['row']),true))),
	array('../prive/editer/article.html','html_62d8cbe642ba19cfe729462fc053a6d0','',7,$GLOBALS['spip_lang'])) .
'</div>
');

	return analyse_resultat_skel('html_62d8cbe642ba19cfe729462fc053a6d0', $Cache, $page, '../prive/editer/article.html');
}
?>