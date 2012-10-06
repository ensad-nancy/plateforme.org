<?php

/*
 * Squelette : squelettes-dist/backend.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Wed, 07 Dec 2011 10:03:39 GMT
 * Boucles :   _10recents, _tres_recents
 */ 

/* BOUCLE articles  */

 function BOUCLE_10recentshtml_6e2efe63dd9202a6371932853505f2fb(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	$in = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = ($Pile[0]['id_mot']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = ($Pile[0]['id_auteur']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	static $table = 'articles';
	static $id = '_10recents';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.date",
		"articles.id_article",
		"articles.lang",
		"articles.titre");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), (!(is_array($Pile[0]['lang'])?count($Pile[0]['lang']):strlen($Pile[0]['lang'])) ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])))), ($Pile[0]['id_rubrique'] ? sql_in('articles.id_rubrique', calcul_branche_in($Pile[0]['id_rubrique'])) : '1=1'), (!(is_array($Pile[0]['id_mot'])?count($Pile[0]['id_mot']):strlen($Pile[0]['id_mot'])) ? '' : ((is_array($Pile[0]['id_mot'])) ? sql_in('L1.id_mot',sql_quote($in1)) : 
			array('=', 'L1.id_mot', sql_quote($Pile[0]['id_mot'])))), (!(is_array($Pile[0]['id_auteur'])?count($Pile[0]['id_auteur']):strlen($Pile[0]['id_auteur'])) ? '' : ((is_array($Pile[0]['id_auteur'])) ? sql_in('L2.id_auteur',sql_quote($in2)) : 
			array('=', 'L2.id_auteur', sql_quote($Pile[0]['id_auteur'])))), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('articles','id_article'));
	static $limit = '0,10';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/backend.html','html_6e2efe63dd9202a6371932853505f2fb','_10recents',24,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-rss-item') . ', array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/backend.html\',\'html_6e2efe63dd9202a6371932853505f2fb\',\'\',25,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_tres_recentshtml_6e2efe63dd9202a6371932853505f2fb(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	$in = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = ($Pile[0]['id_mot']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = ($Pile[0]['id_auteur']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	static $table = 'articles';
	static $id = '_tres_recents';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.date",
		"articles.id_article",
		"articles.lang",
		"articles.titre");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), (!(is_array($Pile[0]['lang'])?count($Pile[0]['lang']):strlen($Pile[0]['lang'])) ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])))), ($Pile[0]['id_rubrique'] ? sql_in('articles.id_rubrique', calcul_branche_in($Pile[0]['id_rubrique'])) : '1=1'), (!(is_array($Pile[0]['id_mot'])?count($Pile[0]['id_mot']):strlen($Pile[0]['id_mot'])) ? '' : ((is_array($Pile[0]['id_mot'])) ? sql_in('L1.id_mot',sql_quote($in1)) : 
			array('=', 'L1.id_mot', sql_quote($Pile[0]['id_mot'])))), (!(is_array($Pile[0]['id_auteur'])?count($Pile[0]['id_auteur']):strlen($Pile[0]['id_auteur'])) ? '' : ((is_array($Pile[0]['id_auteur'])) ? sql_in('L2.id_auteur',sql_quote($in2)) : 
			array('=', 'L2.id_auteur', sql_quote($Pile[0]['id_auteur'])))), 
			array('<', 'LEAST((UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(articles.date))/86400,
	TO_DAYS(NOW())-TO_DAYS(articles.date),
	DAYOFMONTH(NOW())-DAYOFMONTH(articles.date)+30.4368*(MONTH(NOW())-MONTH(articles.date))+365.2422*(YEAR(NOW())-YEAR(articles.date)))', "3"), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('articles','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/backend.html','html_6e2efe63dd9202a6371932853505f2fb','_tres_recents',28,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-rss-item') . ', array(\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/backend.html\',\'html_6e2efe63dd9202a6371932853505f2fb\',\'\',29,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/backend.html
// Temps de compilation total: 196.226 ms
//

function html_6e2efe63dd9202a6371932853505f2fb($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-type: text/xml' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'><?xml 
version="1.0"' .
(($t1 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
		(' encoding="' . $t1 . '"') :
		'') .
'?>
<rss version="2.0" 
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
>

<channel' .
(($t1 = strval(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' xml:lang="' . $t1 . '"') :
		'') .
'>
	<title>' .
interdire_scripts(texte_backend(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)))) .
'</title>
	<link>' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/</link>
	' .
(($t1 = strval(interdire_scripts(texte_backend(supprimer_tags(propre($GLOBALS['meta']['descriptif_site'], $connect))))))!=='' ?
		('<description>' . $t1 . '</description>') :
		'') .
'
	<language>' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'</language>
	<generator>SPIP - www.spip.net</generator>

' .
(($t1 = strval(texte_backend(url_absolue(extraire_attribut(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'144','400')),'src')))))!=='' ?
		((	'	<image>
		<title>' .
	interdire_scripts(texte_backend(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
	'</title>
		<url>') . $t1 . (	'</url>
		<link>' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/</link>
		' .
	(($t2 = strval(extraire_attribut(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'144','400')),'height')))!=='' ?
			('<height>' . $t2 . '</height>') :
			'') .
	'
		' .
	(($t2 = strval(extraire_attribut(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'144','400')),'width')))!=='' ?
			('<width>' . $t2 . '</width>') :
			'') .
	'
	</image>
')) :
		'') .
'

' .
BOUCLE_10recentshtml_6e2efe63dd9202a6371932853505f2fb($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
BOUCLE_tres_recentshtml_6e2efe63dd9202a6371932853505f2fb($Cache, $Pile, $doublons, $Numrows, $SP) .
'

</channel>

</rss>
');

	return analyse_resultat_skel('html_6e2efe63dd9202a6371932853505f2fb', $Cache, $page, 'squelettes-dist/backend.html');
}
?>