<?php

/*
 * Squelette : ../prive/formulaires/editer_rubrique.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Wed, 07 Dec 2011 13:14:49 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/formulaires/editer_rubrique.html
// Temps de compilation total: 4.016 ms
//

function html_773d67db28b60efca30f084f720e688e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'formulaire_spip formulaire_editer formulaire_editer_rubrique formulaire_editer_rubrique-' .
interdire_scripts(entites_html(sinon(@$Pile[0]['id_rubrique'],'nouveau'),true)) .
'\'>
	' .
(($t1 = strval((@$Pile[0]['message_ok'])))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['editable']),true))))!=='' ?
		($t1 . (	'
	<form method=\'post\' action=\'' .
	interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
	'\' enctype=\'multipart/form-data\'><div>
		
		' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div>' .
	'<input type=\'hidden\' name=\'id_rubrique\' value=\'' .
	interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true)) .
	'\' />
	  <ul>
	    <li class="editer_titre obligatoire' .
	((table_valeur((@$Pile[0]['erreurs']),'titre'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
				<label for="titre">' .
	_T('public/spip/ecrire:info_titre') .
	'<em class="aide">' .
	interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('titre','../prive/formulaires/editer_rubrique.html', $Pile[0]):'')) .
	'</em></label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'titre')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'titre\' id=\'titre\' value="' .
	sinon(@$Pile[0]['titre'],_T(concat('','titre_nouvelle_rubrique'))) .
	'"
				' .
	(($t2 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['titre'],''),true) ? '':' '))))!=='' ?
			($t2 . 'onfocus="if(!antifocus){this.value=\'\';antifocus=true;}"') :
			'') .
	'/>
	    </li>

	 	' .
	(($t2 = strval(chercher_rubrique('',interdire_scripts(intval(entites_html((@$Pile[0]['id_rubrique']),true))),interdire_scripts(entites_html((@$Pile[0]['id_parent']),true)),'rubrique',interdire_scripts(entites_html((@$Pile[0]['id_secteur']),true)),table_valeur((@$Pile[0]['config']),'restreint'),'0','form_simple')))!=='' ?
			((	'<li class="editer_parent' .
		((table_valeur((@$Pile[0]['erreurs']),'id_parent'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
				<label for="id_parent">' .
		_T('public/spip/ecrire:titre_cadre_interieur_rubrique') .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('id_parent','../prive/formulaires/editer_rubrique.html', $Pile[0]):'')) .
		'</em></label>
				') . $t2 . '
	    </li>') :
			'') .
	'
	    
	  	' .
	(((table_valeur((@$Pile[0]['config']),'rubriques_descriptif') == 'non') ? sinon(@$Pile[0]['descriptif'],''):' ')  ?
			(' ' . (	'
	    <li class="editer_descriptif' .
		((table_valeur((@$Pile[0]['erreurs']),'descriptif'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
				<label for="descriptif">' .
		_T('public/spip/ecrire:texte_descriptif_rapide') .
		'</label><div class=\'explication\'>' .
		_T('public/spip/ecrire:entree_contenu_rubrique') .
		'</div>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'descriptif')))!=='' ?
				('
				<span class=\'erreur_message\'>' . $t3 . '</span>
				') :
				'') .
		'<textarea name=\'descriptif\' id=\'descriptif\' rows=\'2\' cols=\'40\'>' .
		(@$Pile[0]['descriptif']) .
		'</textarea>
	    </li>')) :
			'') .
	'
	  	' .
	(((table_valeur((@$Pile[0]['config']),'rubriques_texte') == 'non') ? sinon(@$Pile[0]['texte'],''):' ')  ?
			(' ' . (	'
	    <li class="editer_texte' .
		((table_valeur((@$Pile[0]['erreurs']),'texte'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
				<label for="text_area">' .
		_T('public/spip/ecrire:info_texte_explicatif') .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('text_area','../prive/formulaires/editer_rubrique.html', $Pile[0]):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'texte')))!=='' ?
				('
				<span class=\'erreur_message\'>' . $t3 . '</span>
				') :
				'') .
		(($t3 = strval(sinon(@$Pile[0]['_texte_trop_long'],'')))!=='' ?
				($t3 . '
				') :
				'') .
		'<textarea name=\'texte\' id=\'text_area\' rows=\'' .
		plus(table_valeur((@$Pile[0]['config']),'lignes'),'2') .
		'\' cols=\'40\'>' .
		(@$Pile[0]['texte']) .
		'</textarea>
	    </li>')) :
			'') .
	'
	  </ul>
	  ' .
	'
	  <!--extra-->
	  <p class="boutons"><input type=\'submit\' class=\'submit\' value=\'' .
	_T('public/spip/ecrire:bouton_enregistrer') .
	'\' /></p>
	</div></form>
	')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_773d67db28b60efca30f084f720e688e', $Cache, $page, '../prive/formulaires/editer_rubrique.html');
}
?>