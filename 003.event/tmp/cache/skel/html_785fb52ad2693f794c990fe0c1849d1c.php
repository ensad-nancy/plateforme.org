<?php

/*
 * Squelette : ../extensions/spip-bonux/formulaires/selecteur/navigateur.html
 * Date :      Mon, 05 Dec 2011 10:19:30 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:23 GMT
 * Boucles :   _rubriques_branches, _branche, _chemin, _contenu, _rub
 */ 

/* BOUCLE rubriques  */

 function BOUCLE_rubriques_brancheshtml_785fb52ad2693f794c990fe0c1849d1c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[$SP]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'rubriques';
	static $id = '_rubriques_branches';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre");
	static $orderby = array();
	$where = 
			array(sql_in('rubriques.id_rubrique', calcul_branche_in($Pile[$SP]['id_rubrique'])), 
			array('!=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])), (!(is_array($Pile[$SP]['statut'])?count($Pile[$SP]['statut']):strlen($Pile[$SP]['statut'])) ? '' : ((is_array($Pile[$SP]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote($Pile[$SP]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/navigateur.html','html_785fb52ad2693f794c990fe0c1849d1c','_rubriques_branches',3,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= vide($Pile['vars']['rubriques_branche'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['rubriques_branche'] : ""),$Pile[$SP]['id_rubrique']));
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_branchehtml_785fb52ad2693f794c990fe0c1849d1c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'rubriques';
	static $id = '_branche';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.statut",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html((@$Pile[0]['limite_branche']),true)),'','int')), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/navigateur.html','html_785fb52ad2693f794c990fe0c1849d1c','_branche',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
vide($Pile['vars']['titre_branche'] = interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'
' .
vide($Pile['vars']['rubriques_branche'] = array()) .
BOUCLE_rubriques_brancheshtml_785fb52ad2693f794c990fe0c1849d1c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE hierarchie  */

 function BOUCLE_cheminhtml_785fb52ad2693f794c990fe0c1849d1c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = '';
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_chemin';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/navigateur.html','html_785fb52ad2693f794c990fe0c1849d1c','_chemin',8,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_chemin']['compteur_boucle'] = 0;
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_chemin']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
interdire_scripts(((((entites_html((@$Pile[0]['limite_branche']),true)) AND (($Numrows['_chemin']['compteur_boucle'] == '1'))) ?' ' :'') ? '':'<span class="sep"> &gt; </span>')) .
'<a href=\'' .
parametre_url(self(),'id_r',$Pile[$SP]['id_rubrique']) .
'\' class=\'ajax\'>' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a>');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE hierarchie  */

 function BOUCLE_contenuhtml_785fb52ad2693f794c990fe0c1849d1c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = ",$id_rubrique";
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_contenu';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/navigateur.html','html_785fb52ad2693f794c990fe0c1849d1c','_contenu',10,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_contenu']['compteur_boucle'] = 0;
	$Numrows['_contenu']['total'] = @intval(sql_count($result));
	$debut_boucle = $Numrows['_contenu']['total'] - 4;;
	$fin_boucle = min($debut_boucle + 3, $Numrows['_contenu']['total'] - 1);
	$Numrows['_contenu']['grand_total'] = $Numrows['_contenu']['total'];
	$Numrows['_contenu']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_contenu']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_contenu']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_contenu']['compteur_boucle']++;
		if ($Numrows['_contenu']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_contenu']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
vide($Pile['vars']['n'] = '0') .
'<div class=\'frame' .
(($t1 = strval(min((isset($Numrows['_contenu']['grand_total'])
			? $Numrows['_contenu']['grand_total'] : $Numrows['_contenu']['total']),moins($Numrows['_contenu']['total'],'1'))))!=='' ?
		(' total_' . $t1) :
		'') .
(($t1 = strval(plus(moins($Numrows['_contenu']['compteur_boucle'],max(plus((isset($Numrows['_contenu']['grand_total'])
			? $Numrows['_contenu']['grand_total'] : $Numrows['_contenu']['total']),'1'),$Numrows['_contenu']['total'])),$Numrows['_contenu']['total'])))!=='' ?
		(' frame_' . $t1) :
		'') .
'\'>' .
(($t1 = strval(interdire_scripts((((((((entites_html((@$Pile[0]['limite_branche']),true)) ?'' :' ')) OR (in_array($Pile[$SP]['id_rubrique'],sinon(is_array($a = ($Pile["vars"])) ? $a['rubriques_branche'] : "",array())))) ?' ' :'')) ?' ' :''))))!=='' ?
		($t1 . (	'<a
		href=\'' .
	parametre_url(self(),'id_r',($Pile[$SP-1]['id_parent'] ? $Pile[$SP-1]['id_parent']:'racine')) .
	'\' class=\'frame_close ajax\'><img src=\'' .
	interdire_scripts(find_in_path('img_pack/frame-close.png')) .
	'\' alt=\'\' /></a>')) :
		'') .
'
		<h2>' .
(($Pile[$SP]['id_rubrique'] == interdire_scripts(entites_html((@$Pile[0]['limite_branche']),true))) ? interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)):(	'<a class=\'ajax\' href=\'' .
	parametre_url(self(),'id_r',$Pile[$SP]['id_rubrique']) .
	'\'>' .
	interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
	'</a>')) .
'</h2>
		' .
recuperer_fond( 'formulaires/selecteur/inc-nav-rubriques' , array_merge($Pile[0],array('id_rubrique' => $Pile[$SP]['id_rubrique'] )), array('compil'=>array('../extensions/spip-bonux/formulaires/selecteur/navigateur.html','html_785fb52ad2693f794c990fe0c1849d1c','_contenu',17,$GLOBALS['spip_lang'])), '') .
'
		' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['articles'],'0'),true)) ?' ' :''))))!=='' ?
		($t1 . (	' ' .
	recuperer_fond( 'formulaires/selecteur/inc-nav-articles' , array_merge($Pile[0],array('id_rubrique' => $Pile[$SP]['id_rubrique'] ,
	'id_article' => @$Pile[0]['id_article'] )), array('compil'=>array('../extensions/spip-bonux/formulaires/selecteur/navigateur.html','html_785fb52ad2693f794c990fe0c1849d1c','_contenu',17,$GLOBALS['spip_lang'])), '') .
	' ')) :
		'') .
'
		</div>
		');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubhtml_785fb52ad2693f794c990fe0c1849d1c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
	static $select = array("rubriques.id_parent",
		"rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html(sinon(@$Pile[0]['id_r'],interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true))),true)),'','int')), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/spip-bonux/formulaires/selecteur/navigateur.html','html_785fb52ad2693f794c990fe0c1849d1c','_rub',5,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		<div class=\'chemin\'>
			' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['limite_branche']),true)) ?'' :' '))))!=='' ?
		($t1 . (	'<a href=\'' .
	parametre_url(self(),'id_r','0') .
	'\' class=\'ajax\'>' .
	_T('public/spip/ecrire:info_racine_site') .
	'</a>')) :
		'') .
'
			' .
BOUCLE_cheminhtml_785fb52ad2693f794c990fe0c1849d1c($Cache, $Pile, $doublons, $Numrows, $SP) .
interdire_scripts(((entites_html((@$Pile[0]['limite_branche']),true) == $Pile[$SP]['id_rubrique']) ? '':'<span class="sep"> &gt; </span>')) .
'<strong class=\'on\'>' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</strong>
		</div>' .
vide($Pile['vars']['n'] = '0') .
(($t1 = BOUCLE_contenuhtml_785fb52ad2693f794c990fe0c1849d1c($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		
		' .
		(($t3 = strval(interdire_scripts(((entites_html((@$Pile[0]['limite_branche']),true)) ?'' :' '))))!=='' ?
				($t3 . (	(($t4 = strval(((((isset($Numrows['_contenu']['grand_total'])
			? $Numrows['_contenu']['grand_total'] : $Numrows['_contenu']['total']) < $Numrows['_contenu']['total'])) ?' ' :'')))!=='' ?
					($t4 . (	'
		<div class=\'frame' .
				(($t5 = strval(max((isset($Numrows['_contenu']['grand_total'])
			? $Numrows['_contenu']['grand_total'] : $Numrows['_contenu']['total']),moins($Numrows['_contenu']['total'],'1'))))!=='' ?
						(' total_' . $t5) :
						'') .
				' frame_0\'><h2>' .
				(($t5 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['rubriques'],'0'),true)) ?' ' :''))))!=='' ?
						('<a' . $t5 . (	' href=\'#\' onclick="jQuery(this).item_pick(\'rubrique|0\',\'' .
					interdire_scripts(entites_html(sinon(@$Pile[0]['name'],'id_item'),true)) .
					'\',\'' .
					attribut_html(texte_script(_T('public/spip/ecrire:info_racine_site'))) .
					'\',\'rubrique\');return false;"
><img class=\'add\' src=\'' .
					interdire_scripts(find_in_path('img_pack/item-add.png')) .
					'\' alt=\'\' /></a>')) :
						'') .
				_T('public/spip/ecrire:info_racine_site') .
				'</h2>
		' .
				recuperer_fond( 'formulaires/selecteur/inc-nav-rubriques' , array_merge($Pile[0],array('id_rubrique' => '0' )), array('compil'=>array('../extensions/spip-bonux/formulaires/selecteur/navigateur.html','html_785fb52ad2693f794c990fe0c1849d1c','_rub',12,$GLOBALS['spip_lang'])), ''))) :
					'') .
			'</div>')) :
				'') .
		'
		') . $t1) :
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
// Fonction principale du squelette ../extensions/spip-bonux/formulaires/selecteur/navigateur.html
// Temps de compilation total: 9.666 ms
//

function html_785fb52ad2693f794c990fe0c1849d1c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_branchehtml_785fb52ad2693f794c990fe0c1849d1c($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	' .
(($t1 = BOUCLE_rubhtml_785fb52ad2693f794c990fe0c1849d1c($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
	<div class=\'chemin\'><strong class=\'on\'>' .
	sinon(is_array($a = ($Pile["vars"])) ? $a['titre_branche'] : "",_T('public/spip/ecrire:info_racine_site')) .
	'</strong></div>
	<div class=\'frame total_0 frame_0\'><h2>' .
	sinon(is_array($a = ($Pile["vars"])) ? $a['titre_branche'] : "",_T('public/spip/ecrire:info_racine_site')) .
	'</h2>' .
	recuperer_fond( 'formulaires/selecteur/inc-nav-rubriques' , array_merge($Pile[0],array('id_rubrique' => interdire_scripts(entites_html(sinon(@$Pile[0]['limite_branche'],'0'),true)) )), array('compil'=>array('../extensions/spip-bonux/formulaires/selecteur/navigateur.html','html_785fb52ad2693f794c990fe0c1849d1c','',25,$GLOBALS['spip_lang'])), '') .
	'</div>
	'))));

	return analyse_resultat_skel('html_785fb52ad2693f794c990fe0c1849d1c', $Cache, $page, '../extensions/spip-bonux/formulaires/selecteur/navigateur.html');
}
?>