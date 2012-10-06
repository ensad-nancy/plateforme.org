<?php

/*
 * Squelette : ../prive/infos/article.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:16 GMT
 * Boucles :   _art
 */ 

/* BOUCLE articles  */

 function BOUCLE_arthtml_13e2af6a0f5c84e0f28b80bbf4097365(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		"articles.id_rubrique",
		"articles.statut",
		"articles.visites",
		"articles.id_version");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.id_article', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)),'','int')), (!(is_array($Pile[0]['statut'])?count($Pile[0]['statut']):strlen($Pile[0]['statut'])) ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('articles.statut',sql_quote($in)) : 
			array('=', 'articles.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/infos/article.html','html_13e2af6a0f5c84e0f28b80bbf4097365','_art',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:info_numero_article');
	$l2 = _T('info_historique_lien');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<div class=\'infos\'>
<div class=\'numero\'>' .
$l1 .
'<p>' .
$Pile[$SP]['id_article'] .
'</p></div>


' .
instituer_article($Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'],interdire_scripts($Pile[$SP]['statut'])) .
'



' .
voir_en_ligne('article',$Pile[$SP]['id_article'],interdire_scripts($Pile[$SP]['statut']),'racine-24.gif','0','0') .
'







' .
interdire_scripts((((((lire_config('activer_statistiques',null,false) == 'oui') ? interdire_scripts($Pile[$SP]['statut']):'') == 'publie') ? invalideur_session($Cache, (include_spip("inc/autoriser")&&autoriser('voirstats', 'article', invalideur_session($Cache, $Pile[$SP]['id_article']))?" ":"")):'') ? interdire_scripts(bouton_lien_statistiques($Pile[$SP]['visites'],$Pile[$SP]['id_article'])):'')) .
'




' .
interdire_scripts(((((lire_config('articles_versions',null,false) == 'oui') ? $Pile[$SP]['id_version']:'') ? invalideur_session($Cache, (include_spip("inc/autoriser")&&autoriser('voirrevisions', 'article', invalideur_session($Cache, $Pile[$SP]['id_article']))?" ":"")):'') ? (	icone_horizontale($l2,(	'?exec=articles_versions&amp;id_article=' .
		$Pile[$SP]['id_article']),'historique-24.gif','rien.gif','0') .
	'
'):'')) .
'

</div>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../prive/infos/article.html
// Temps de compilation total: 5.505 ms
//

function html_13e2af6a0f5c84e0f28b80bbf4097365($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_arthtml_13e2af6a0f5c84e0f28b80bbf4097365($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_13e2af6a0f5c84e0f28b80bbf4097365', $Cache, $page, '../prive/infos/article.html');
}
?>