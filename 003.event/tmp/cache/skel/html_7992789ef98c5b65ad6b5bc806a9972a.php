<?php

/*
 * Squelette : squelettes/inc-barrehaute.html
 * Date :      Tue, 06 Dec 2011 13:56:37 GMT
 * Compile :   Thu, 08 Dec 2011 15:45:50 GMT
 * Boucles :   _articles_recents
 */ 

/* BOUCLE articles  */

 function BOUCLE_articles_recentshtml_7992789ef98c5b65ad6b5bc806a9972a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_recents';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.titre",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', "1"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/inc-barrehaute.html','html_7992789ef98c5b65ad6b5bc806a9972a','_articles_recents',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'<a title="' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'"><img src="' .
extraire_attribut(filtrer('image_graver', filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'300','300')),'src') .
'" height="100%"/></a>');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/inc-barrehaute.html
// Temps de compilation total: 1.083 ms
//

function html_7992789ef98c5b65ad6b5bc806a9972a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_articles_recentshtml_7992789ef98c5b65ad6b5bc806a9972a($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<div id="barreHaute">' . $t1 . '</div>
') :
		'');

	return analyse_resultat_skel('html_7992789ef98c5b65ad6b5bc806a9972a', $Cache, $page, 'squelettes/inc-barrehaute.html');
}
?>