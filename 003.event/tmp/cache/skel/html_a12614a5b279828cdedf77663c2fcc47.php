<?php

/*
 * Squelette : ../prive/infos/rubrique.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Mon, 05 Dec 2011 10:37:26 GMT
 * Boucles :   _arts, _breves, _sites, _docs, _rubs, _rub
 */ 

/* BOUCLE articles  */

 function BOUCLE_artshtml_a12614a5b279828cdedf77663c2fcc47(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_arts';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/rubrique.html','html_a12614a5b279828cdedf77663c2fcc47','_arts',12,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_arts']['total'] = @intval(array_shift(sql_fetch($result)));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_arts']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breveshtml_a12614a5b279828cdedf77663c2fcc47(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/rubrique.html','html_a12614a5b279828cdedf77663c2fcc47','_breves',13,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_breves']['total'] = @intval(array_shift(sql_fetch($result)));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_breves']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_siteshtml_a12614a5b279828cdedf77663c2fcc47(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/rubrique.html','html_a12614a5b279828cdedf77663c2fcc47','_sites',14,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_sites']['total'] = @intval(array_shift(sql_fetch($result)));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_sites']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_docshtml_a12614a5b279828cdedf77663c2fcc47(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_docs';
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
		','L1' => 'spip_documents_liens');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("1");
	static $orderby = array();
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')));
	static $join = array('L1' => array('documents','id_document'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/rubrique.html','html_a12614a5b279828cdedf77663c2fcc47','_docs',15,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_docs']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_docs']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubshtml_a12614a5b279828cdedf77663c2fcc47(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubs';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/rubrique.html','html_a12614a5b279828cdedf77663c2fcc47','_rubs',16,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_rubs']['total'] = @intval(array_shift(sql_fetch($result)));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_rubs']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubhtml_a12614a5b279828cdedf77663c2fcc47(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'rubriques';
	static $id = '_rub';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.statut");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)),'','int')), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/rubrique.html','html_a12614a5b279828cdedf77663c2fcc47','_rub',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:titre_numero_rubrique');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<div class=\'infos\'>
<div class=\'numero\'>' .
$l1 .
'<p>' .
$Pile[$SP]['id_rubrique'] .
'</p></div>


' .
'
<div class=\'nb_elements\'>
' .
(($t1 = BOUCLE_artshtml_a12614a5b279828cdedf77663c2fcc47($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		singulier_ou_pluriel($Numrows['_arts']['total'],'info_articles_un','info_articles_nb') .
		'</div>')) :
		'') .
'
' .
(($t1 = BOUCLE_breveshtml_a12614a5b279828cdedf77663c2fcc47($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		singulier_ou_pluriel($Numrows['_breves']['total'],'info_breves_un','info_breves_nb') .
		'</div>')) :
		'') .
'
' .
(($t1 = BOUCLE_siteshtml_a12614a5b279828cdedf77663c2fcc47($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		singulier_ou_pluriel($Numrows['_sites']['total'],'info_sites_un','info_sites_nb') .
		'</div>')) :
		'') .
'
' .
(($t1 = BOUCLE_docshtml_a12614a5b279828cdedf77663c2fcc47($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		singulier_ou_pluriel($Numrows['_docs']['total'],'info_documents_un','info_documents_nb') .
		'</div>')) :
		'') .
'
' .
(($t1 = BOUCLE_rubshtml_a12614a5b279828cdedf77663c2fcc47($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		singulier_ou_pluriel($Numrows['_rubs']['total'],'info_rubriques_un','info_rubriques_nb') .
		'</div>')) :
		'') .
'
' .
(($t1 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['n_forums'],''),true) ? ' ':''))))!=='' ?
		('<p class=\'forums\'>' . $t1 . (	_T('icone_suivi_forum',array('nb_forums' => interdire_scripts(entites_html((@$Pile[0]['n_forums']),true)))) .
	'</p>')) :
		'') .
'
</div>


' .
voir_en_ligne('rubrique',$Pile[$SP]['id_rubrique'],interdire_scripts($Pile[$SP]['statut']),'racine-24.gif','0','0') .
'




</div>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../prive/infos/rubrique.html
// Temps de compilation total: 13.354 ms
//

function html_a12614a5b279828cdedf77663c2fcc47($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_rubhtml_a12614a5b279828cdedf77663c2fcc47($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_a12614a5b279828cdedf77663c2fcc47', $Cache, $page, '../prive/infos/rubrique.html');
}
?>