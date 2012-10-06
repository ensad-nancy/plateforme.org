<?php

/*
 * Squelette : ../extensions/spip-bonux/formulaires/selecteur/picker-ajax.html
 * Date :      Mon, 05 Dec 2011 10:19:31 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:16 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../extensions/spip-bonux/formulaires/selecteur/picker-ajax.html
// Temps de compilation total: 1.648 ms
//

function html_7fb214a135f353c442092d57de26e4a3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars']['bouton_modif'] = interdire_scripts(_T((entites_html(sinon(@$Pile[0]['select'],''),true) ? 'bouton_modifier':'bouton_ajouter')))) .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['picker'],''),true)) ?'' :' '))))!=='' ?
		($t1 . (	'
<div class=\'picker_bouton\'>&#91;<a href=\'' .
	parametre_url(self(),'picker','1') .
	'\' class=\'ajax\'>' .
	(is_array($a = ($Pile["vars"])) ? $a['bouton_modif'] : "") .
	'</a>&#93;</div>
')) :
		'') .
'
' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['picker'],''),true)) ?' ' :''))))!=='' ?
		($t1 . (	'
<div class=\'picker_bouton\'>&#91;<a class=\'close\'
href=\'' .
	parametre_url(self(),'picker','0') .
	'\' 
onclick="jQuery(this).parent().picker_toggle();return false;"
>' .
	_T('spip_bonux:bouton_fermer') .
	'</a><a class=\'edit\'
href=\'' .
	parametre_url(self(),'picker','1') .
	'\' 
onclick="jQuery(this).parent().picker_toggle();return false;"
style=\'display:none;\'>' .
	(is_array($a = ($Pile["vars"])) ? $a['bouton_modif'] : "") .
	'</a>&#93;</div>

' .
	'
<div class=\'browser\'>
	<div class="choix choix_rapide">
		<label for="picker_id">' .
	_T('spip_bonux:id_rapide') .
	'</label>
		<input type="text" value="" id="picker_id" size="10" />
		<a href="#"
			 onclick="jQuery.ajax({\'url\':\'' .
	interdire_scripts(generer_url_public('ajax_item_pick',(	'rubriques=' .
		interdire_scripts(entites_html((@$Pile[0]['rubriques']),true)) .
		'&articles=' .
		interdire_scripts(entites_html((@$Pile[0]['articles']),true)) .
		'&ref='))) .
	'\'+jQuery(\'#picker_id\').attr(\'value\'),
			 \'success\':function(r){
					eval(\'r = \'+r); // JSON envoye par ajax_item_pick.html
					if (r){
						jQuery(\'#picker_id\').item_pick(r.id,\'' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['name'],'id_item'),true)) .
	'\',r.titre,r.type);
					}
					jQuery(\'#picker_id\').attr(\'value\',\'\');
			 }
		 });return false;">' .
	(is_array($a = ($Pile["vars"])) ? $a['bouton_modif'] : "") .
	'</a>
	</div>
	' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/selecteur/navigateur') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../extensions/spip-bonux/formulaires/selecteur/picker-ajax.html\',\'html_7fb214a135f353c442092d57de26e4a3\',\'\',28,$GLOBALS[\'spip_lang\']),"ajax"=>true), _request("connect"));
?'.'>
</div>
')) :
		''));

	return analyse_resultat_skel('html_7fb214a135f353c442092d57de26e4a3', $Cache, $page, '../extensions/spip-bonux/formulaires/selecteur/picker-ajax.html');
}
?>