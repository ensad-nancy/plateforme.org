<?php

/*
 * Squelette : squelettes-dist/sommaire.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Tue, 06 Dec 2011 13:39:30 GMT
 * Boucles :   _articles_recents, _breves, _forums_liens, _syndic
 */ 

/* BOUCLE articles  */

 function BOUCLE_articles_recentshtml_3066a391ddd809c8c3e68ff791f1ae93(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_recents';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.titre",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/sommaire.html','html_3066a391ddd809c8c3e68ff791f1ae93','_articles_recents',29,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles_recents']['compteur_boucle'] = 0;
	$Numrows['_articles_recents']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_articles_recents']) ? $Pile[0]['debut_articles_recents'] : _request('debut_articles_recents');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles_recents'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),5,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles_recents']['total']-1)/(5))*(5)));
	$fin_boucle = min(($tout ? $Numrows['_articles_recents']['total'] : $debut_boucle + 4), $Numrows['_articles_recents']['total'] - 1);
	$Numrows['_articles_recents']['grand_total'] = $Numrows['_articles_recents']['total'];
	$Numrows['_articles_recents']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles_recents']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_articles_recents']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles_recents']['compteur_boucle']++;
		if ($Numrows['_articles_recents']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles_recents']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<li class="hentry">
					' .
filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'], 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'150','100')) .
'
					<h3 class="entry-title"><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" rel="bookmark">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></h3>
					<small><abbr class="published"' .
(($t1 = strval(interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(' title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
'</abbr>' .
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes-dist/sommaire.html','html_3066a391ddd809c8c3e68ff791f1ae93','_articles_recents',35,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur') .
	' ') . $t1) :
		'') .
'</small>
					' .
(($t1 = strval(interdire_scripts(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))!=='' ?
		((	'<div class="introduction entry-content">') . $t1 . '</div>') :
		'') .
'
				</li>
				');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breveshtml_3066a391ddd809c8c3e68ff791f1ae93(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.titre",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
	static $where = 
			array(
			array('=', 'breves.statut', '\'publie\''));
	static $join = array();
	static $limit = '0,5';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/sommaire.html','html_3066a391ddd809c8c3e68ff791f1ae93','_breves',48,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
				<li>' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' &ndash; ') :
		'') .
'<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
				');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forums_lienshtml_3066a391ddd809c8c3e68ff791f1ae93(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums_liens';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.date_heure",
		"forum.date_heure AS date",
		"forum.id_forum",
		"forum.titre",
		"forum.texte");
	static $orderby = array('forum.date_heure DESC');
	static $where = 
			array(
			array('=', 'forum.statut', '\'publie\''));
	static $join = array();
	static $limit = '0,8';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/sommaire.html','html_3066a391ddd809c8c3e68ff791f1ae93','_forums_liens',60,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
				<li>' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' &ndash; ') :
		'') .
'<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_forum'], 'forum', '', '', true))) .
'"' .
(($t1 = strval(interdire_scripts(couper(attribut_html(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect))),'80'))))!=='' ?
		(' title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(couper(safehtml(propre(post_autobr($Pile[$SP]['texte']), $connect)),'80')) .
'</a></li>
				');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndic_articles  */

 function BOUCLE_syndichtml_3066a391ddd809c8c3e68ff791f1ae93(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic_articles';
	static $id = '_syndic';
	static $from = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic_articles.date",
		"syndic_articles.url",
		"L1.url_site",
		"L1.nom_site",
		"syndic_articles.titre");
	static $orderby = array('syndic_articles.date DESC');
	static $where = 
			array(
			array('=', 'syndic_articles.statut', '\'publie\''), 
			array('<', 'LEAST((UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(syndic_articles.date))/86400,
	TO_DAYS(NOW())-TO_DAYS(syndic_articles.date),
	DAYOFMONTH(NOW())-DAYOFMONTH(syndic_articles.date)+30.4368*(MONTH(NOW())-MONTH(syndic_articles.date))+365.2422*(YEAR(NOW())-YEAR(syndic_articles.date)))', "180"), 
			array('=', 'L1.statut', '\'publie\''));
	static $join = array('L1' => array('syndic_articles','id_syndic'));
	static $limit = '0,6';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/sommaire.html','html_3066a391ddd809c8c3e68ff791f1ae93','_syndic',72,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
				<li>' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' &ndash; ') :
		'') .
'<a href="' .
vider_url($Pile[$SP]['url']) .
'"' .
(($t1 = strval(interdire_scripts(couper(attribut_html(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))),'80'))))!=='' ?
		(' title="' . $t1 . '"') :
		'') .
' class="spip_out">' .
interdire_scripts(safehtml($Pile[$SP]['titre'])) .
'</a></li>
				');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/sommaire.html
// Temps de compilation total: 716.317 ms
//

function html_3066a391ddd809c8c3e68ff791f1ae93($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 3600"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(textebrut(couper(propre($GLOBALS['meta']['descriptif_site'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/sommaire.html\',\'html_3066a391ddd809c8c3e68ff791f1ae93\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>

<body class="page_sommaire">
<div id="page">

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-entete') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/sommaire.html\',\'html_3066a391ddd809c8c3e68ff791f1ae93\',\'\',14,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	
	<div class="hfeed" id="conteneur">
	<div id="contenu">
		
		<div class="cartouche invisible">
			<h1 class="invisible">' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</h1>
		</div>
		
		' .
(($t1 = strval(interdire_scripts(propre($GLOBALS['meta']['descriptif_site'], $connect))))!=='' ?
		('<div class="chapo">' . $t1 . '</div>') :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_articles_recentshtml_3066a391ddd809c8c3e68ff791f1ae93($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu articles">
			' .
		filtre_pagination_dist($Numrows["_articles_recents"]["grand_total"],
 		'_articles_recents',
		isset($Pile[0]['debut_articles_recents'])?$Pile[0]['debut_articles_recents']:intval(_request('debut_articles_recents')),
		5, false, '', '', array()) .
		'
			<h2>' .
		_T('public/spip/ecrire:derniers_articles') .
		'</h2>
			<ul>
				') . $t1 . (	'
			</ul>
			' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles_recents"]["grand_total"],
 		'_articles_recents',
		isset($Pile[0]['debut_articles_recents'])?$Pile[0]['debut_articles_recents']:intval(_request('debut_articles_recents')),
		5, true, '', '', array())))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
		</div>
		')) :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_breveshtml_3066a391ddd809c8c3e68ff791f1ae93($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
			<h2>' .
		_T('public/spip/ecrire:dernieres_breves') .
		'</h2>
			<ul>
				') . $t1 . '
			</ul>
		</div>
		') :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_forums_lienshtml_3066a391ddd809c8c3e68ff791f1ae93($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
			<h2>' .
		_T('public/spip/ecrire:derniers_commentaires') .
		'</h2>
			<ul>
				') . $t1 . '
			</ul>
		</div>
		') :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_syndichtml_3066a391ddd809c8c3e68ff791f1ae93($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
			<h2>' .
		_T('public/spip/ecrire:nouveautes_web') .
		'</h2>
			<ul>
				') . $t1 . '
			</ul>
		</div>
		') :
		'') .
'
	
	</div><!--#contenu-->
	</div><!--#conteneur-->
	
	
	<div id="navigation">
		
		
		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-rubriques') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/sommaire.html\',\'html_3066a391ddd809c8c3e68ff791f1ae93\',\'\',90,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('squelettes-dist/sommaire.html','html_3066a391ddd809c8c3e68ff791f1ae93','',92,$GLOBALS['spip_lang'])) .
'

    </div><!--#navigation-->
	
	
	<div id="extra">
		
		
		' .
executer_balise_dynamique('FORMULAIRE_INSCRIPTION',
	array(),
	array('squelettes-dist/sommaire.html','html_3066a391ddd809c8c3e68ff791f1ae93','',100,$GLOBALS['spip_lang'])) .
'
		
	</div><!--#extra-->
	
	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-pied') . ', array(\'skel\' => ' . argumenter_squelette('squelettes-dist/sommaire.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/sommaire.html\',\'html_3066a391ddd809c8c3e68ff791f1ae93\',\'\',105,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	
</div><!--#page-->
</body>
</html>
');

	return analyse_resultat_skel('html_3066a391ddd809c8c3e68ff791f1ae93', $Cache, $page, 'squelettes-dist/sommaire.html');
}
?>