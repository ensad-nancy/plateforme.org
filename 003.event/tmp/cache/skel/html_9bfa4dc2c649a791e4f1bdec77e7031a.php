<?php

/*
 * Squelette : ../extensions/spip-bonux/formulaires/selecteur/articles.html
 * Date :      Mon, 05 Dec 2011 10:19:25 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:16 GMT
 * Boucles :   _art
 */ 

/* BOUCLE articles  */

 function BOUCLE_arthtml_9bfa4dc2c649a791e4f1bdec77e7031a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'articles';
	static $id = '_art';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_rubrique",
		"articles.lang",
		"articles.titre");
	static $orderby = array();
	$where = 
			array((!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('articles.statut',sql_quote($in)) : 
			array('=', 'articles.statut', sql_quote($Pile[0]['statut'])))), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/articles.html','html_9bfa4dc2c649a791e4f1bdec77e7031a','_art',12,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= vide($Pile['vars']['id_rubrique'] = $Pile[$SP]['id_rubrique']);
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../extensions/spip-bonux/formulaires/selecteur/articles.html
// Temps de compilation total: 1.837 ms
//

function html_9bfa4dc2c649a791e4f1bdec77e7031a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<script type=\'text/javascript\'>var img_unpick=\'' .
interdire_scripts(find_in_path('img_pack/item-remove.png')) .
'\';</script>
<script type=\'text/javascript\' src=\'' .
interdire_scripts(find_in_path('formulaires/selecteur/jquery.picker.js')) .
'\'></script>

' .
'<ul class=\'item_picked' .
(($t1 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['select'],''),true) ? 'select':''))))!=='' ?
		(' ' . $t1) :
		'') .
'\'>
' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['rubriques'],'0'),true)) ?' ' :''))))!=='' ?
		($t1 . 
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/selecteur/inc-sel-rubriques') . ', array(\'name\' => ' . argumenter_squelette(@$Pile[0]['name']) . ',
	\'selected\' => ' . argumenter_squelette(@$Pile[0]['selected']) . ',
	\'select\' => ' . argumenter_squelette(@$Pile[0]['select']) . ',
	\'img_unpick\' => ' . argumenter_squelette(interdire_scripts(find_in_path('img_pack/item-remove.png'))) . ',
	\'afficher_langue\' => ' . argumenter_squelette(@$Pile[0]['afficher_langue']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'../extensions/spip-bonux/formulaires/selecteur/articles.html\',\'html_9bfa4dc2c649a791e4f1bdec77e7031a\',\'\',5,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>') :
		'') .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/selecteur/inc-sel-articles') . ', array(\'name\' => ' . argumenter_squelette(@$Pile[0]['name']) . ',
	\'selected\' => ' . argumenter_squelette(@$Pile[0]['selected']) . ',
	\'select\' => ' . argumenter_squelette(@$Pile[0]['select']) . ',
	\'img_unpick\' => ' . argumenter_squelette(interdire_scripts(find_in_path('img_pack/item-remove.png'))) . ',
	\'afficher_langue\' => ' . argumenter_squelette(@$Pile[0]['afficher_langue']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'../extensions/spip-bonux/formulaires/selecteur/articles.html\',\'html_9bfa4dc2c649a791e4f1bdec77e7031a\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</ul>

' .
vide($Pile['vars']['id_rubrique'] = interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true))) .
BOUCLE_arthtml_9bfa4dc2c649a791e4f1bdec77e7031a($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
'
<div class=\'item_picker\'>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/selecteur/picker-ajax') . ', array_merge('.var_export($Pile[0],1).',array(\'id_rubrique\' => ' . argumenter_squelette((is_array($a = ($Pile["vars"])) ? $a['id_rubrique'] : "")) . ',
	\'id_article\' => ' . argumenter_squelette(@$Pile[0]['id_article']) . ',
	\'articles\' => ' . argumenter_squelette('1') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../extensions/spip-bonux/formulaires/selecteur/articles.html\',\'html_9bfa4dc2c649a791e4f1bdec77e7031a\',\'\',16,$GLOBALS[\'spip_lang\']),"ajax"=>true), _request("connect"));
?'.'>
</div>
');

	return analyse_resultat_skel('html_9bfa4dc2c649a791e4f1bdec77e7031a', $Cache, $page, '../extensions/spip-bonux/formulaires/selecteur/articles.html');
}
?>