<?php

/*
 * Squelette : ../prive/infos/auteur.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Mon, 05 Dec 2011 10:37:54 GMT
 * Boucles :   _arts, _forum, _auteur
 */ 

/* BOUCLE articles  */

 function BOUCLE_artshtml_7b45e67ce9aeab79113068def59581c0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_arts';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])), 
			array('NOT', 
			array('=', 'articles.statut', "'poubelle'")));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/auteur.html','html_7b45e67ce9aeab79113068def59581c0','_arts',5,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_arts']['total'] = @intval(array_shift(sql_fetch($result)));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_arts']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forumhtml_7b45e67ce9aeab79113068def59581c0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forum';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forum.id_parent', 0), 
			array('=', 'forum.id_auteur', sql_quote($Pile[$SP]['id_auteur'],'','int')), 
			array('NOT', 
			array('=', 'forum.statut', "'poubelle'")));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/auteur.html','html_7b45e67ce9aeab79113068def59581c0','_forum',10,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_forum']['total'] = @intval(array_shift(sql_fetch($result)));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat(' ', $Numrows['_forum']['total']);
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_auteurhtml_7b45e67ce9aeab79113068def59581c0(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'auteurs';
	static $id = '_auteur';
	static $from = array('auteurs' => 'spip_auteurs');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.id_auteur",
		"auteurs.statut");
	static $orderby = array();
	$where = 
			array(
			array('=', 'auteurs.id_auteur', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)),'','int')), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('auteurs.statut',sql_quote($in)) : 
			array('=', 'auteurs.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/auteur.html','html_7b45e67ce9aeab79113068def59581c0','_auteur',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:titre_cadre_numero_auteur');
	$l2 = _T('public/spip/ecrire:info_article');
	$l3 = _T('public/spip/ecrire:info_message_2');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<div class=\'infos\'>
<div class=\'numero\'>' .
$l1 .
'<p>' .
$Pile[$SP]['id_auteur'] .
'</p></div>
<div class=\'nb_elements\'>
' .
(($t1 = BOUCLE_artshtml_7b45e67ce9aeab79113068def59581c0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
' .
		(($t3 = strval(interdire_scripts((($Pile[$SP]['statut'] <> '6forum') ? ' ':''))))!=='' ?
				($t3 . (($t4 = strval(singulier_ou_pluriel($Numrows['_arts']['total'],'info_articles_un','info_articles_nb')))!=='' ?
					('<div>' . $t4 . '</div>') :
					'')) :
				'') .
		'
')) :
		((	'
' .
	(($t2 = strval(interdire_scripts((($Pile[$SP]['statut'] <> '6forum') ? ' ':''))))!=='' ?
			($t2 . (	'<div class="noinfo">' .
		$Numrows['_arts']['total'] .
		' ' .
		$l2 .
		'</div>')) :
			'') .
	'
'))) .
'
' .
(($t1 = BOUCLE_forumhtml_7b45e67ce9aeab79113068def59581c0($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
' .
		(($t3 = strval(singulier_ou_pluriel($Numrows['_forum']['total'],'info_messages_un','info_messages_nb')))!=='' ?
				('<div>' . $t3 . '</div>') :
				'') .
		'
')) :
		((	'
<div class="noinfo">' .
	$Numrows['_forum']['total'] .
	' ' .
	strtolower($l3) .
	'</div>
'))) .
'
</div>
</div>

' .
voir_en_ligne('auteur',$Pile[$SP]['id_auteur'],interdire_scripts($Pile[$SP]['statut']),'racine-24.gif','0','0') .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../prive/infos/auteur.html
// Temps de compilation total: 8.198 ms
//

function html_7b45e67ce9aeab79113068def59581c0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_auteurhtml_7b45e67ce9aeab79113068def59581c0($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_7b45e67ce9aeab79113068def59581c0', $Cache, $page, '../prive/infos/auteur.html');
}
?>