<?php

/*
 * Squelette : ../extensions/spip-bonux/formulaires/selecteur/inc-sel-articles.html
 * Date :      Mon, 05 Dec 2011 10:19:26 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:16 GMT
 * Boucles :   _sel
 */ 

/* BOUCLE articles  */

 function BOUCLE_selhtml_25aa8b7fcfa4c05ae8f744ca8f9edf86(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = (interdire_scripts(picker_selected(entites_html((@$Pile[0]['selected']),true),'article'))))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	static $table = 'articles';
	static $id = '_sel';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.lang",
		"articles.titre");
	$orderby = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(articles.id_article,' . sql_quote($in) . ')')));
	$where = 
			array(sql_in('articles.id_article',sql_quote($in)), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('articles.statut',sql_quote($in1)) : 
			array('=', 'articles.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/inc-sel-articles.html','html_25aa8b7fcfa4c05ae8f744ca8f9edf86','_sel',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<li class=\'article\'><input type="hidden" name="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['name'],'id_item'),true)) .
'[]" value="article|' .
$Pile[$SP]['id_article'] .
'" />' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['afficher_langue'],'0'),true)) ?' ' :''))))!=='' ?
		($t1 . (	(($t2 = strval(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
			('&#91;' . $t2 . '&#93;') :
			'') .
	' ')) :
		'') .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['select'],''),true)) ?'' :' '))))!=='' ?
		($t1 . (	'
<a href=\'#\' onclick=\'jQuery(this).item_unpick();return false;\'><img src=\'' .
	interdire_scripts(entites_html((@$Pile[0]['img_unpick']),true)) .
	'\' alt=\'\' /></a>')) :
		'') .
'<span class="sep">, </span></li>');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../extensions/spip-bonux/formulaires/selecteur/inc-sel-articles.html
// Temps de compilation total: 1.255 ms
//

function html_25aa8b7fcfa4c05ae8f744ca8f9edf86($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_selhtml_25aa8b7fcfa4c05ae8f744ca8f9edf86($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_25aa8b7fcfa4c05ae8f744ca8f9edf86', $Cache, $page, '../extensions/spip-bonux/formulaires/selecteur/inc-sel-articles.html');
}
?>