<?php

/*
 * Squelette : notifications/article_publie.html
 * Date :      Mon, 05 Dec 2011 10:08:59 GMT
 * Compile :   Mon, 05 Dec 2011 11:47:44 GMT
 * Boucles :   _art
 */ 

/* BOUCLE articles  */

 function BOUCLE_arthtml_b912a2c9cbc1fc4c60ef9d2128f3ac80(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
	static $select = array("articles.id_article",
		"articles.titre",
		"articles.date",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('articles.statut',sql_quote($in)) : 
			array('=', 'articles.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('notifications/article_publie.html','html_b912a2c9cbc1fc4c60ef9d2128f3ac80','_art',8,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
vide($Pile['vars']['auteurs'] = recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('notifications/article_publie.html','html_b912a2c9cbc1fc4c60ef9d2128f3ac80','_art',0,$GLOBALS['spip_lang'])), '')) .
nettoyer_titre_email(_T('info_publie_1',array('nom_site_spip' => interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)), 'titre' => interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect))))) .
'

' .
_T('public/spip/ecrire:info_publie_2') .
'

' .
_T('info_publie_01',array('titre' => interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)), 'connect_nom' => interdire_scripts(invalideur_session($Cache, (is_array($a = ($GLOBALS["visiteur_session"])) ? $a['nom'] : ""))))) .
'

' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect))))!=='' ?
		('** ' . $t1 . ' **') :
		'') .
(((is_array($a = ($Pile["vars"])) ? $a['auteurs'] : ""))  ?
		(' ' . (	'
' .
	_T('info_les_auteurs_1',array('les_auteurs' => (is_array($a = ($Pile["vars"])) ? $a['auteurs'] : ""))))) :
		'') .
(($t1 = strval(_T('date_fmt_nomjour_date',array('nomjour' => interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))), 'date' => interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))))!=='' ?
		('
' . $t1) :
		'') .
'

' .
interdire_scripts(textebrut(couper(concat(propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect),interdire_scripts(propre($Pile[$SP]['texte'], $connect))),'700'))) .
'

' .
(($t1 = strval(url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))))))!=='' ?
		('-> ' . $t1) :
		'') .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette notifications/article_publie.html
// Temps de compilation total: 4.472 ms
//

function html_b912a2c9cbc1fc4c60ef9d2128f3ac80($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-type: text/plain' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
' .
BOUCLE_arthtml_b912a2c9cbc1fc4c60ef9d2128f3ac80($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
'<' . '?php header("X-Spip-Filtre: '.'supprimer_tags|filtrer_entites|trim' . '"); ?'.'>');

	return analyse_resultat_skel('html_b912a2c9cbc1fc4c60ef9d2128f3ac80', $Cache, $page, 'notifications/article_publie.html');
}
?>