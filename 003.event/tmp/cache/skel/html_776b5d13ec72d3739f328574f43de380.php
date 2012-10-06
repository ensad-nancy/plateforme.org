<?php

/*
 * Squelette : squelettes/article.html
 * Date :      Tue, 06 Dec 2011 13:56:34 GMT
 * Compile :   Thu, 08 Dec 2011 15:45:50 GMT
 * Boucles :   _article_lie, _les_articles_lies, _principale
 */ 

/* BOUCLE articles  */

 function BOUCLE_article_liehtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_article_lie';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.titre",
		"articles.texte",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article_lie'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_article_lie',26,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				         	<h1 class="entry-title">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</h1>
							' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['texte'], $connect),'500','0')))))!=='' ?
		((	'<div class="texte entry-content">') . $t1 . '</div>') :
		'') .
'
				         ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles_lies  */

 function BOUCLE_les_articles_lieshtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles_lies';
	static $id = '_les_articles_lies';
	static $from = array('articles_lies' => 'spip_articles_lies');
	static $type = array();
	static $groupby = array();
	static $select = array("articles_lies.id_article_lie",
		"articles_lies.rang");
	static $orderby = array('articles_lies.rang');
	$where = 
			array(
			array('=', 'articles_lies.id_article', sql_quote($Pile[$SP]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_les_articles_lies',24,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
				         ' .
BOUCLE_article_liehtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				 ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_principalehtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_principale';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.lang",
		"articles.titre",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.date");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_principale',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
(($t1 = strval(interdire_scripts(textebrut(typo($Pile[$SP]['titre'], "TYPO", $connect)))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(attribut_html(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], intval('150'), $connect)))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>

<body class="page_article">
	    ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-barrehaute') . ', array(\'skel\' => ' . argumenter_squelette('squelettes/article.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',11,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	    <div class="col">
			 <div class="contenu">
				<h1 class="entry-title">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</h1>
				<h2>' .
recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_principale',15,$GLOBALS['spip_lang'])), '') .
'</h2>
	            <p><small><abbr class="published" title="' .
interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date']))) .
'">
	            ' .
(($t1 = strval(interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' ') :
		'') .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'</abbr></small></p>
		
				' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['texte'], $connect),'500','0')))))!=='' ?
		((	'<div class="texte entry-content">') . $t1 . '</div>') :
		'') .
'
			 </div>
		</div>
		<div class="col">
			 <div class="contenu">
				 ' .
(($t1 = BOUCLE_les_articles_lieshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
				 ' . $t1 . '
				 ') :
		'') .
'
			 </div>
		</div>
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-pied') . ', array(\'skel\' => ' . argumenter_squelette('squelettes/article.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/article.html\',\'html_776b5d13ec72d3739f328574f43de380\',\'\',34,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</body>
</html>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/article.html
// Temps de compilation total: 4.396 ms
//

function html_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_principalehtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_776b5d13ec72d3739f328574f43de380', $Cache, $page, 'squelettes/article.html');
}
?>