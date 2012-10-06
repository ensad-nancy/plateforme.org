<?php

/*
 * Squelette : squelettes-dist/modeles/article_mots.html
 * Date :      Mon, 05 Dec 2011 10:08:56 GMT
 * Compile :   Mon, 05 Dec 2011 15:01:50 GMT
 * Boucles :   _mots
 */ 

/* BOUCLE mots  */

 function BOUCLE_motshtml_3d11a847ede2647aa021615741f3bdf7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot");
	static $orderby = array('mots.titre');
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[0]['id_article'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/modeles/article_mots.html','html_3d11a847ede2647aa021615741f3bdf7','_mots',10,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
		<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" rel="tag">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
		');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/modeles/article_mots.html
// Temps de compilation total: 3.774 ms
//

function html_3d11a847ede2647aa021615741f3bdf7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_motshtml_3d11a847ede2647aa021615741f3bdf7($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="menu"' .
		(($t3 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
				(' style=\'float:' . $t3 . ';\'') :
				'') .
		'>
	<h2>' .
		_T('public/spip/ecrire:mots_clefs') .
		'</h2>
	<ul>
		') . $t1 . '
	</ul>
</div>
') :
		'') .
'
');

	return analyse_resultat_skel('html_3d11a847ede2647aa021615741f3bdf7', $Cache, $page, 'squelettes-dist/modeles/article_mots.html');
}
?>