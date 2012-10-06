<?php

/*
 * Squelette : ../extensions/a2a/formulaires/navigateur_a2a.html
 * Date :      Mon, 05 Dec 2011 10:20:28 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:16 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../extensions/a2a/formulaires/navigateur_a2a.html
// Temps de compilation total: 0.486 ms
//

function html_3084798b521187004cf4573319ea7a51($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_navigateur_a2a ajax" id="formulaire_navigateur_a2a">
<br class=\'bugajaxie\' />
<form method=\'post\' action=\'' .
interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
'#formulaire_recherche_a2a\' enctype=\'multipart/form-data\'>
	<div>
		' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><div class="cadre_padding">
			<p class="explication">' .
_T('a2a:explication_navigateur') .
'</p>
			' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/selecteur/articles') . ', array(\'selected\' => ' . argumenter_squelette(interdire_scripts(entites_html((@$Pile[0]['parents']),true))) . ',
	\'name\' => ' . argumenter_squelette('parents') . ',
	\'articles\' => ' . argumenter_squelette('1') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'../extensions/a2a/formulaires/navigateur_a2a.html\',\'html_3084798b521187004cf4573319ea7a51\',\'\',8,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>' .
'
		</div>
		<p class=\'boutons\'><input type="submit" name="ok" value="' .
_T('a2a:lier_cet_article') .
'" /></p>
	</div>
</form>
</div>
');

	return analyse_resultat_skel('html_3084798b521187004cf4573319ea7a51', $Cache, $page, '../extensions/a2a/formulaires/navigateur_a2a.html');
}
?>