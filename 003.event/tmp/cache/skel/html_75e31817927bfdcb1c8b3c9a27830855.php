<?php

/*
 * Squelette : ../prive/editer/auteur.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Mon, 05 Dec 2011 10:37:54 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/editer/auteur.html
// Temps de compilation total: 2.228 ms
//

function html_75e31817927bfdcb1c8b3c9a27830855($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'cadre-formulaire-editer\'>
<div class="entete-formulaire">
	' .
(@$Pile[0]['icone_retour']) .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
		((	_T('public/spip/ecrire:info_modifier_auteur') .
	'
	<h1>') . $t1 . '</h1>') :
		'') .
'
</div>
' .
executer_balise_dynamique('FORMULAIRE_EDITER_AUTEUR',
	array(interdire_scripts(entites_html((@$Pile[0]['new']),true)),interdire_scripts(entites_html((@$Pile[0]['redirect']),true)),interdire_scripts(entites_html((@$Pile[0]['lier_id_article']),true)),interdire_scripts(entites_html((@$Pile[0]['config_fonc']),true)),(@$Pile[0]['auteur'])),
	array('../prive/editer/auteur.html','html_75e31817927bfdcb1c8b3c9a27830855','',6,$GLOBALS['spip_lang'])) .
'</div>
');

	return analyse_resultat_skel('html_75e31817927bfdcb1c8b3c9a27830855', $Cache, $page, '../prive/editer/auteur.html');
}
?>