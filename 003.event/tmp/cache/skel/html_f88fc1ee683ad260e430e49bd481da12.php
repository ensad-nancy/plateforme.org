<?php

/*
 * Squelette : ../prive/formulaires/editer_auteur.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Mon, 05 Dec 2011 10:37:54 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/formulaires/editer_auteur.html
// Temps de compilation total: 6.736 ms
//

function html_f88fc1ee683ad260e430e49bd481da12($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_editer formulaire_editer_auteur formulaire_editer_auteur-' .
interdire_scripts(entites_html(sinon(@$Pile[0]['id_auteur'],'nouveau'),true)) .
'">
	' .
(($t1 = strval((@$Pile[0]['message_ok'])))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . (	' ' .
	_T('public/spip/ecrire:info_recommencer') .
	'</p>')) :
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
	'<input type=\'hidden\' name=\'id_auteur\' value=\'' .
	interdire_scripts(entites_html((@$Pile[0]['id_auteur']),true)) .
	'\' />
	  ' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['lier_id_article']),true))))!=='' ?
			('<input type=\'hidden\' name=\'lier_id_article\' value=\'' . $t2 . '\' />') :
			'') .
	'
	  ' .
	(($t2 = strval((@$Pile[0]['redirect'])))!=='' ?
			('<input type=\'hidden\' name=\'redirect\' value=\'' . $t2 . '\' />') :
			'') .
	'
	  <ul>
	    <li class="editer_nom obligatoire' .
	((table_valeur((@$Pile[0]['erreurs']),'nom'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
				<label for="nom">' .
	_T('public/spip/ecrire:titre_cadre_signature_obligatoire') .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'nom')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	'<p class=\'explication\'>' .
	_T('public/spip/ecrire:entree_nom_pseudo') .
	'</p>
				<input type=\'text\' class=\'text\' name=\'nom\' id=\'nom\' value="' .
	sinon(@$Pile[0]['nom'],_T('ecrire:item_nouvel_auteur')) .
	'"
				' .
	(($t2 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['nom'],''),true) ? '':' '))))!=='' ?
			($t2 . 'onfocus="if(!antifocus){this.value=\'\';antifocus=true;}"') :
			'') .
	'/>
	    </li>
	    
	    <li class="editer_email' .
	((table_valeur((@$Pile[0]['erreurs']),'email'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
				<label for="email">' .
	_T('public/spip/ecrire:entree_adresse_email') .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'email')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	'<input type=\'text\' class=\'text' .
	(((is_array($a = ($Pile["vars"])) ? $a['disable'] : ""))  ?
			(' ' . ' ' . 'disabled') :
			'') .
	'\' name=\'email\' id=\'email\' value="' .
	(@$Pile[0]['email']) .
	'" ' .
	(is_array($a = ($Pile["vars"])) ? $a['disable'] : "") .
	'/>
	    </li>
	    <li class="editer_bio' .
	((table_valeur((@$Pile[0]['erreurs']),'bio'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
				<label for="bio">' .
	_T('public/spip/ecrire:entree_infos_perso') .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'bio')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	'<p class="explication">' .
	_T('public/spip/ecrire:entree_biographie') .
	'</p>
				<textarea name=\'bio\' id=\'bio\' rows=\'4\' cols=\'40\'>' .
	(@$Pile[0]['bio']) .
	'</textarea>
	    </li>
	    		  
		<li class="editer_pgp' .
	((table_valeur((@$Pile[0]['erreurs']),'pgp'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
			<label for="pgp">' .
	_T('public/spip/ecrire:entree_cle_pgp') .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'pgp')))!=='' ?
			('
			<span class=\'erreur_message\'>' . $t2 . '</span>
			') :
			'') .
	'<textarea name=\'pgp\' id=\'pgp\' rows=\'4\' cols=\'40\'>' .
	(@$Pile[0]['pgp']) .
	'</textarea>
		</li>
		
		' .
	(($t2 = strval(instituer_auteur_ici(table_valeur((@$Pile[0]['config']),'auteur'))))!=='' ?
			('<li class=\'editer_statut\'>' . $t2 . '</li>') :
			'') .
	'
		' .
	'
		<li class=\'editer_liens_sites fieldset\'>
		<fieldset>
		<h3 class="legend">' .
	_T('public/spip/ecrire:info_site_web') .
	'</h3>
		<ul>
			<li class="editer_nom_site' .
	((table_valeur((@$Pile[0]['erreurs']),'nom_site_auteur'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
				<label for="nom_site">' .
	_T('public/spip/ecrire:entree_nom_site') .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'nom_site_auteur')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'nom_site\' id=\'nom_site\' value="' .
	(@$Pile[0]['nom_site']) .
	'" />
			</li>
			<li class="editer_url_site' .
	((table_valeur((@$Pile[0]['erreurs']),'url_site'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
					<label for="url_site">' .
	_T('public/spip/ecrire:entree_url') .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'url_site')))!=='' ?
			('
					<span class=\'erreur_message\'>' . $t2 . '</span>
					') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'url_site\' id=\'url_site\' value="' .
	(@$Pile[0]['url_site']) .
	'" />
			</li>
		</ul>
		</fieldset>
		</li>

		' .
	'
		<li class=\'editer_identification fieldset\'>
			<fieldset>
				<h3 class="legend">' .
	_T('public/spip/ecrire:entree_identifiants_connexion') .
	'</h3>
				
				' .
	(($t2 = strval(interdire_scripts(((((((((table_valeur(entites_html((@$Pile[0]['config']),true),'edit_login')) OR (interdire_scripts(table_valeur(entites_html((@$Pile[0]['config']),true),'edit_pass')))) ?' ' :'')) AND (interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : "") == interdire_scripts(invalideur_session($Cache, entites_html((@$Pile[0]['id_auteur']),true)))))))) ?' ' :'')) ?' ' :''))))!=='' ?
			($t2 . (	'
					<em class=\'attention\'>' .
		_T('public/spip/ecrire:texte_login_precaution') .
		'</em>
				')) :
			'') .
	'
				<ul>
				' .
	'
				<li class=\'editer_new_login' .
	((table_valeur((@$Pile[0]['erreurs']),'login'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'\'>
					' .
	(($t2 = strval(interdire_scripts(((table_valeur(entites_html((@$Pile[0]['config']),true),'edit_login')) ?' ' :''))))!=='' ?
			($t2 . (	'
							<label for=\'new_login\'>' .
		_T('public/spip/ecrire:item_login') .
		'</label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'login')))!=='' ?
				('
							<span class=\'erreur_message\'>' . $t3 . '</span>
							') :
				'') .
		'<p class=\'explication\'>(' .
		_T('public/spip/ecrire:texte_plus_trois_car') .
		')</p>
							<input autocomplete="off" type=\'text\' class=\'text\' name=\'new_login\' id=\'new_login\' value="' .
		(@$Pile[0]['login']) .
		'" />
					')) :
			'') .
	'
					' .
	(($t2 = strval(interdire_scripts(((table_valeur(entites_html((@$Pile[0]['config']),true),'edit_login')) ?'' :' '))))!=='' ?
			($t2 . (	'
							<label for=\'login\'>' .
		_T('public/spip/ecrire:item_login') .
		'
							</label><p class=\'explication\'>(' .
		_T('public/spip/ecrire:info_non_modifiable') .
		')</p>
							<input type=\'text\' class=\'text\' disabled=\'disabled\' name=\'login\' id=\'login\' value="' .
		(@$Pile[0]['login']) .
		'" />
					')) :
			'') .
	'				
				</li>
				' .
	(($t2 = strval(interdire_scripts(((table_valeur(entites_html((@$Pile[0]['config']),true),'edit_pass')) ?' ' :''))))!=='' ?
			($t2 . (	'
					<li class=\'editer_new_pass' .
		((table_valeur((@$Pile[0]['erreurs']),'new_pass'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'\'>
							<label for=\'new_pass\'>' .
		_T('public/spip/ecrire:entree_nouveau_passe') .
		'</label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'new_pass')))!=='' ?
				('
							<span class=\'erreur_message\'>' . $t3 . '</span>
							') :
				'') .
		'<p class=\'explication\'>(' .
		_T('public/spip/ecrire:info_plus_cinq_car') .
		')</p>
							<input type=\'password\' autocomplete="off" class=\'password\' name=\'new_pass\' id=\'new_pass\' value="" />
					</li>
					<li class=\'editer_new_pass2\'>
							<label for=\'new_pass2\'>' .
		_T('public/spip/ecrire:info_confirmer_passe') .
		'</label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'new_pass2')))!=='' ?
				('
							<span class=\'erreur_message\'>' . $t3 . '</span>
							') :
				'') .
		'<input type=\'password\' autocomplete="off" class=\'password\' name=\'new_pass2\' id=\'new_pass2\' value="" />
					</li>			
				')) :
			'') .
	'
				</ul>			
			</fieldset>
		</li>

		</ul>
	  ' .
	'
	  <!--extra-->
	  <p class=\'boutons\'><input type=\'submit\' class=\'submit\' value=\'' .
	_T('public/spip/ecrire:bouton_enregistrer') .
	'\' /></p>
	</div></form>
	')) :
		'') .
'

</div>
');

	return analyse_resultat_skel('html_f88fc1ee683ad260e430e49bd481da12', $Cache, $page, '../prive/formulaires/editer_auteur.html');
}
?>