<?php

/*
 * Squelette : squelettes-dist/inc-rss-item.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Wed, 07 Dec 2011 10:03:40 GMT
 * Boucles :   _mots_rss, _rubrique_mf, _mots_mf, _documents, _un_article
 */ 

/* BOUCLE mots  */

 function BOUCLE_mots_rsshtml_8fba40f8f67880596aee4ec8acaacc11(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots_rss';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-rss-item.html','html_8fba40f8f67880596aee4ec8acaacc11','_mots_rss',14,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
		' .
(($t1 = strval(interdire_scripts(texte_backend(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))))))!=='' ?
		('<dc:subject>' . $t1 . '</dc:subject>') :
		''));
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubrique_mfhtml_8fba40f8f67880596aee4ec8acaacc11(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubrique_mf';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-rss-item.html','html_8fba40f8f67880596aee4ec8acaacc11','_rubrique_mf',23,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'-
' .
(($t1 = strval(interdire_scripts(texte_backend(supprimer_tags(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect)))))))!=='' ?
		((	'&lt;a href="' .
	url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true)))) .
	'" rel="directory"&gt;') . $t1 . '&lt;/a&gt;') :
		'') .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_mots_mfhtml_8fba40f8f67880596aee4ec8acaacc11(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots_mf';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-rss-item.html','html_8fba40f8f67880596aee4ec8acaacc11','_mots_mf',25,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t1 = (
'
' .
(($t1 = strval(interdire_scripts(texte_backend(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))))))!=='' ?
		((	'&lt;a href="' .
	url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true)))) .
	'" rel="tag"&gt;') . $t1 . '&lt;/a&gt;') :
		''));
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_documentshtml_8fba40f8f67880596aee4ec8acaacc11(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'documents';
	static $id = '_documents';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("documents.id_document",
		"documents.taille",
		"L2.mime_type");
	static $orderby = array();
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_article'])), 
			array('=', 'L1.objet', sql_quote('article')), 
			array('=', 'documents.mode', "'document'"), 
			array(sql_in('documents.id_document', $doublons[$doublons_index[]= ('documents')], 'NOT')));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-rss-item.html','html_8fba40f8f67880596aee4ec8acaacc11','_documents',50,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (
(($t1 = strval(unique(url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))))))!=='' ?
		('
		<enclosure url="' . $t1 . (	'"' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['taille'])))!=='' ?
			(' length="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts($Pile[$SP]['mime_type'])))!=='' ?
			(' type="' . $t2 . '"') :
			'') .
	' />')) :
		'') .
'
		');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_un_articlehtml_8fba40f8f67880596aee4ec8acaacc11(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_un_article';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.lang",
		"articles.titre",
		"articles.date",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.url_site",
		"articles.nom_site",
		"articles.ps");
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
		 array('squelettes-dist/inc-rss-item.html','html_8fba40f8f67880596aee4ec8acaacc11','_un_article',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	<item' .
(($t1 = strval(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' xml:lang="' . $t1 . '"') :
		'') .
'>
		<title>' .
interdire_scripts(texte_backend(supprimer_tags(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))))) .
'</title>
		<link>' .
url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true)))) .
'</link>
		' .
(($t1 = strval(url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))))))!=='' ?
		('<guid isPermaLink="true">' . $t1 . '</guid>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<dc:date>' . $t1 . '</dc:date>') :
		'') .
'
		<dc:format>text/html</dc:format>
		' .
(($t1 = strval(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		('<dc:language>' . $t1 . '</dc:language>') :
		'') .
'
		' .
(($t1 = strval(texte_backend(supprimer_tags(recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes-dist/inc-rss-item.html','html_8fba40f8f67880596aee4ec8acaacc11','_un_article',7,$GLOBALS['spip_lang'])), '')))))!=='' ?
		('<dc:creator>' . $t1 . '</dc:creator>') :
		'') .
'

' .
BOUCLE_mots_rsshtml_8fba40f8f67880596aee4ec8acaacc11($Cache, $Pile, $doublons, $Numrows, $SP) .
'

		<description>' .
interdire_scripts(texte_backend(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))) .
'

' .
BOUCLE_rubrique_mfhtml_8fba40f8f67880596aee4ec8acaacc11($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = BOUCLE_mots_mfhtml_8fba40f8f67880596aee4ec8acaacc11($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
/ ' . $t1) :
		'') .
'

		</description>

' .
(($t1 = strval(interdire_scripts(((lire_config('syndication_integrale',null,false) == 'oui') ? ' ':''))))!=='' ?
		('
' . $t1 . (	'<content:encoded>' .
	(($t2 = strval(texte_backend(filtrer('image_graver', filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" align=\"right\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'150','150')))))!=='' ?
			($t2 . '
		') :
			'') .
	(($t2 = strval(interdire_scripts(texte_backend(traiter_doublons_documents($doublons, propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect))))))!=='' ?
			('&lt;div class=\'rss_chapo\'&gt;' . $t2 . '&lt;/div&gt;
		') :
			'') .
	(($t2 = strval(interdire_scripts(texte_backend(filtrer('image_graver', filtrer('image_reduire',traiter_doublons_documents($doublons, propre($Pile[$SP]['texte'], $connect)),'500','0'))))))!=='' ?
			('&lt;div class=\'rss_texte\'&gt;' . $t2 . '&lt;/div&gt;
		') :
			'') .
	(($t2 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
			((	'&lt;div class="hyperlien"&gt;' .
		html2unicode(_T('public/spip/ecrire:voir_en_ligne')) .
		' : &lt;a href="') . $t2 . (	'" class="spip_out"&gt;' .
		interdire_scripts(texte_backend(((($a = traiter_doublons_documents($doublons, typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) OR (!is_array($a) AND strlen($a))) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80')))) .
		'&lt;/a&gt;&lt;/div&gt;
		')) :
			'') .
	(($t2 = strval(interdire_scripts(texte_backend(calculer_notes()))))!=='' ?
			('&lt;hr /&gt;
		&lt;div class=\'rss_notes\'&gt;' . $t2 . '&lt;/div&gt;
		') :
			'') .
	(($t2 = strval(interdire_scripts(texte_backend(traiter_doublons_documents($doublons, propre($Pile[$SP]['ps'], $connect))))))!=='' ?
			('&lt;div class=\'rss_ps\'&gt;' . $t2 . '&lt;/div&gt;') :
			'') .
	'
		</content:encoded>
')) :
		'') .
'

		' .
BOUCLE_documentshtml_8fba40f8f67880596aee4ec8acaacc11($Cache, $Pile, $doublons, $Numrows, $SP) .
'

	</item>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/inc-rss-item.html
// Temps de compilation total: 43.110 ms
//

function html_8fba40f8f67880596aee4ec8acaacc11($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_un_articlehtml_8fba40f8f67880596aee4ec8acaacc11($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_8fba40f8f67880596aee4ec8acaacc11', $Cache, $page, 'squelettes-dist/inc-rss-item.html');
}
?>