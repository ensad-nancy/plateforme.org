<?php

/*
 * Squelette : ../extensions/spip-bonux/formulaires/selecteur/inc-nav-rubriques.html
 * Date :      Mon, 05 Dec 2011 10:19:26 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:23 GMT
 * Boucles :   _articles_fils, _rubs_filles, _enfants
 */ 

/* BOUCLE articles  */

 function BOUCLE_articles_filshtml_b4e337efabbe85c682cfe76280da1760(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = (interdire_scripts(entites_html(sinon(@$Pile[0]['statut'],array('0' => 'prop', '1' => 'publie', '2' => 'prepa')),true))))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'articles';
	static $id = '_articles_fils';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.lang",
		"articles.titre");
	$orderby = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(articles.statut,' . sql_quote($in) . ')')));
	$where = 
			array(
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')), sql_in('articles.statut',sql_quote($in)));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/inc-nav-rubriques.html','html_b4e337efabbe85c682cfe76280da1760','_articles_fils',6,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['articles'],'0'),true)) ?' ' :''))))!=='' ?
		($t1 . (	'<a class=\'ajax\' href=\'' .
	parametre_url(self(),'id_r',$Pile[$SP-1]['id_rubrique']) .
	'\'>' .
	(($t2 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['rubriques'],'0'),true)) ?'' :' '))))!=='' ?
			(interdire_scripts(typo($Pile[$SP-1]['titre'], "TYPO", $connect)) . $t2) :
			'') .
	'<img class=\'ouvrir\' src=\'' .
	interdire_scripts(find_in_path('img_pack/deplier-droite.png')) .
	'\' alt=\'\' /></a>')) :
		'');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubs_filleshtml_b4e337efabbe85c682cfe76280da1760(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubs_filles';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.lang",
		"rubriques.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '0,1';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/inc-nav-rubriques.html','html_b4e337efabbe85c682cfe76280da1760','_rubs_filles',6,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'<a class=\'ajax\' href=\'' .
parametre_url(self(),'id_r',$Pile[$SP-1]['id_rubrique']) .
'\'>' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['rubriques'],'0'),true)) ?'' :' '))))!=='' ?
		(interdire_scripts(typo($Pile[$SP-1]['titre'], "TYPO", $connect)) . $t1) :
		'') .
'<img class=\'ouvrir\' src=\'' .
interdire_scripts(find_in_path('img_pack/deplier-droite.png')) .
'\' alt=\'\' /></a>');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_enfantshtml_b4e337efabbe85c682cfe76280da1760(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$senstri = '';
	$tri = (($t=(isset($Pile[0]['tri'.'_enfants']))?$Pile[0]['tri'.'_enfants']:interdire_scripts(entites_html(sinon(@$Pile[0]['tri'],'id_rubrique'),true)))?tri_protege_champ($t):'');
	if ($tri){
		$senstri = ((intval($t=(isset($Pile[0]['sens'.'_enfants']))?$Pile[0]['sens'.'_enfants']:(is_array($s=1)?(isset($s[$st=(($t=(isset($Pile[0]['tri'.'_enfants']))?$Pile[0]['tri'.'_enfants']:interdire_scripts(entites_html(sinon(@$Pile[0]['tri'],'id_rubrique'),true)))?tri_protege_champ($t):'')])?$s[$st]:reset($s)):$s))==-1 OR $t=='inverse')?-1:1);
		$senstri = ($senstri<0)?' DESC':'';
	};
	
	static $table = 'rubriques';
	static $id = '_enfants';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	$select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"".tri_champ_select($tri)."",
		"rubriques.lang");
	$orderby = array(tri_champ_order($tri,'rubriques','a:16:{i:0;s:11:"id_rubrique";i:1;s:9:"id_parent";i:2;s:5:"titre";i:3;s:10:"descriptif";i:4;s:5:"texte";i:5;s:10:"id_secteur";i:6;s:3:"maj";i:7;s:6:"export";i:8;s:9:"id_import";i:9;s:6:"statut";i:10;s:4:"date";i:11;s:4:"lang";i:12;s:14:"langue_choisie";i:13;s:5:"extra";i:14;s:10:"statut_tmp";i:15;s:8:"date_tmp";}').$senstri);
	$where = 
			array(
			array('=', 'rubriques.id_parent', sql_quote($Pile[0]['id_rubrique'],'','int')), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote($Pile[0]['statut'])))), 
			array('REGEXP', 'rubriques.lang', sql_quote((
'^' .
interdire_scripts(((($a = trim(entites_html((@$Pile[0]['filtrer_langue_rubrique']),true))) OR (!is_array($a) AND strlen($a))) ? $a : '.*')) .
'$'))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/inc-nav-rubriques.html','html_b4e337efabbe85c682cfe76280da1760','_enfants',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_enfants']['compteur_boucle'] = 0;
	$Numrows['_enfants']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")]) ? $Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")] : _request('debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : ""));
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")] = quete_debut_pagination('id_rubrique',$Pile[0]['@id_rubrique'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_enfants']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_enfants']['total'] : $debut_boucle + 9), $Numrows['_enfants']['total'] - 1);
	$Numrows['_enfants']['grand_total'] = $Numrows['_enfants']['total'];
	$Numrows['_enfants']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_enfants']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_enfants']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_enfants']['compteur_boucle']++;
		if ($Numrows['_enfants']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_enfants']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<li class=\'rubrique\'>' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['rubriques'],'0'),true)) ?' ' :''))))!=='' ?
		($t1 . (	'<a href=\'#\' onclick="jQuery(this).item_pick(\'rubrique|' .
	$Pile[$SP]['id_rubrique'] .
	'\',\'' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['name'],'id_item'),true)) .
	'\',\'' .
	interdire_scripts(replace(texte_script(attribut_html(extraire_multi($Pile[$SP]['titre']))),'&#39;',concat('\\\\',interdire_scripts(eval('return '.'chr(39)'.';'))))) .
	'\',\'rubrique\');return false;"
><img class=\'add\' src=\'' .
	interdire_scripts(find_in_path('img_pack/item-add.png')) .
	'\' alt=\'\' /></a>' .
	interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)))) :
		'') .
(($t1 = BOUCLE_rubs_filleshtml_b4e337efabbe85c682cfe76280da1760($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		(BOUCLE_articles_filshtml_b4e337efabbe85c682cfe76280da1760($Cache, $Pile, $doublons, $Numrows, $SP))) .
'</li>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../extensions/spip-bonux/formulaires/selecteur/inc-nav-rubriques.html
// Temps de compilation total: 4.249 ms
//

function html_b4e337efabbe85c682cfe76280da1760($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars']['p'] = (	'pr_' .
	@$Pile[0]['id_rubrique'])) .
(($t1 = BOUCLE_enfantshtml_b4e337efabbe85c682cfe76280da1760($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_enfants"]["grand_total"],
 		(is_array($a = ($Pile["vars"])) ? $a['p'] : ""),
		isset($Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")])?$Pile[0]['debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : "")]:intval(_request('debut'.(is_array($a = ($Pile["vars"])) ? $a['p'] : ""))),
		10, true, '', '', array())))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'
<ul class=\'items\'>
') . $t1 . '
</ul>
') :
		''));

	return analyse_resultat_skel('html_b4e337efabbe85c682cfe76280da1760', $Cache, $page, '../extensions/spip-bonux/formulaires/selecteur/inc-nav-rubriques.html');
}
?>