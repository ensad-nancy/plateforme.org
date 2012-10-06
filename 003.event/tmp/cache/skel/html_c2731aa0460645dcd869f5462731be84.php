<?php

/*
 * Squelette : ../prive/editer/rubrique.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Wed, 07 Dec 2011 13:14:49 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/editer/rubrique.html
// Temps de compilation total: 2.335 ms
//

function html_c2731aa0460645dcd869f5462731be84($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'cadre-formulaire-editer\'>
<div class="entete-formulaire">
	' .
(@$Pile[0]['icone_retour']) .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
		((	_T('public/spip/ecrire:info_modifier_rubrique') .
	'
	<h1>') . $t1 . '</h1>') :
		'') .
'
</div>
' .
executer_balise_dynamique('FORMULAIRE_EDITER_RUBRIQUE',
	array(interdire_scripts(entites_html((@$Pile[0]['new']),true)),interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true)),interdire_scripts(entites_html((@$Pile[0]['redirect']),true)),interdire_scripts(entites_html((@$Pile[0]['lier_trad']),true)),interdire_scripts(entites_html((@$Pile[0]['config_fonc']),true))),
	array('../prive/editer/rubrique.html','html_c2731aa0460645dcd869f5462731be84','',6,$GLOBALS['spip_lang'])) .
'</div>
');

	return analyse_resultat_skel('html_c2731aa0460645dcd869f5462731be84', $Cache, $page, '../prive/editer/rubrique.html');
}
?>