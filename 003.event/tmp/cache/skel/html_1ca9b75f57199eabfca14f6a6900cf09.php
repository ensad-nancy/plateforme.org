<?php

/*
 * Squelette : ../extensions/spip-bonux/formulaires/selecteur/inc-nav-articles.html
 * Date :      Mon, 05 Dec 2011 10:19:25 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:25 GMT
 * Boucles :   _articles
 */ 

/* BOUCLE articles  */

 function BOUCLE_articleshtml_1ca9b75f57199eabfca14f6a6900cf09(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.titre",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')), 
			array('REGEXP', 'articles.lang', sql_quote((
'^' .
interdire_scripts(((($a = trim(entites_html((@$Pile[0]['filtrer_langue_article']),true))) OR (!is_array($a) AND strlen($a))) ? $a : '.*')) .
'$'))), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('articles.statut',sql_quote($in)) : 
			array('=', 'articles.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/inc-nav-articles.html','html_1ca9b75f57199eabfca14f6a6900cf09','_articles',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles']['compteur_boucle'] = 0;
	$Numrows['_articles']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")]) ? $Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")] : _request('debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : ""));
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_articles']['total'] : $debut_boucle + 9), $Numrows['_articles']['total'] - 1);
	$Numrows['_articles']['grand_total'] = $Numrows['_articles']['total'];
	$Numrows['_articles']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_articles']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles']['compteur_boucle']++;
		if ($Numrows['_articles']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<li class=\'article' .
(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '')  ?
		(' ' . 'on') :
		'') .
'\'>' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['picker_article'],'1'),true)) ?' ' :''))))!=='' ?
		($t1 . (	'<a href=\'#\' onclick="jQuery(this).item_pick(\'article|' .
	$Pile[$SP]['id_article'] .
	'\',\'' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['name'],'id_item'),true)) .
	'\',\'' .
	interdire_scripts(replace(texte_script(attribut_html($Pile[$SP]['titre'])),'&#39;',concat('\\\\',interdire_scripts(eval('return '.'chr(39)'.';'))))) .
	'\',\'article\');return false;"
><img class=\'add\' src=\'' .
	interdire_scripts(find_in_path('img_pack/item-add.png')) .
	'\' alt=\'\' />')) :
		'') .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['picker_article'],'1'),true)) ?'' :' '))))!=='' ?
		($t1 . (	'<a href=\'' .
	generer_url_entite($Pile[$SP]['id_article'],'article') .
	'\'>')) :
		'') .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../extensions/spip-bonux/formulaires/selecteur/inc-nav-articles.html
// Temps de compilation total: 4.900 ms
//

function html_1ca9b75f57199eabfca14f6a6900cf09($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars']['p'] = (	'pa_' .
	@$Pile[0]['id_rubrique'])) .
(($t1 = BOUCLE_articleshtml_1ca9b75f57199eabfca14f6a6900cf09($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		(is_array($a = ($Pile["vars"])) ? $a['p'] : ""),
		isset($Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")])?$Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")]:intval(_request('debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : ""))),
		10, true, '', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
<ul>
') . $t1 . '
</ul>
') :
		'') .
'
');

	return analyse_resultat_skel('html_1ca9b75f57199eabfca14f6a6900cf09', $Cache, $page, '../extensions/spip-bonux/formulaires/selecteur/inc-nav-articles.html');
}
?>