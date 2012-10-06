<?php

/*
 * Squelette : ../extensions/a2a/formulaires/inc-recherche_libre.html
 * Date :      Mon, 05 Dec 2011 10:20:27 GMT
 * Compile :   Thu, 08 Dec 2011 15:45:38 GMT
 * Boucles :   _Recherche
 */ 

/* BOUCLE articles  */

 function BOUCLE_Recherchehtml_c7516fb6e25c7bddfa46e362a90af317(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = (interdire_scripts(entites_html((@$Pile[0]['exclure']),true))))))
		$in[]= $a;
	else $in = array_merge($in, $a); 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "articles", "","", "true");
	
	static $table = 'articles';
	static $id = '_Recherche';
	static $from = array('articles' => 'spip_articles','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("articles.id_article",
		"$rech_select",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), $rech_where?$rech_where:'', 
			array('NOT', sql_in('articles.id_article',sql_quote($in))));
	static $join = array('resultats' => array('articles','id','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/a2a/formulaires/inc-recherche_libre.html','html_c7516fb6e25c7bddfa46e362a90af317','_Recherche',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('a2a:voir');
	$l2 = _T('a2a:lier_cet_article');
	$l3 = _T('a2a:lier_cet_article_deux_cotes');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
	<li>
		' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect))))!=='' ?
		('<span class="titre">' . $t1 . '</span>') :
		'') .
'
		<span class="actions">
			<a href="' .
url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true)))) .
'">' .
$l1 .
'</a> - 
                        <a href="' .
invalideur_session($Cache, generer_action_auteur('a2a',(	'lier_article/' .
	invalideur_session($Cache, $Pile[$SP]['id_article']) .
	'/' .
	invalideur_session($Cache, @$Pile[0]['id_article_orig']) .
	'/uni/' .
	interdire_scripts(invalideur_session($Cache, entites_html((@$Pile[0]['type_liaison']),true)))),invalideur_session($Cache, self()))) .
'" class="ajax">' .
$l2 .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['type_liaison']),true))))!=='' ?
		(' (' . $t1 . ')') :
		'') .
'</a> -
                        <a href="' .
invalideur_session($Cache, generer_action_auteur('a2a',(	'lier_article/' .
	invalideur_session($Cache, $Pile[$SP]['id_article']) .
	'/' .
	invalideur_session($Cache, @$Pile[0]['id_article_orig']) .
	'/both/' .
	interdire_scripts(invalideur_session($Cache, entites_html((@$Pile[0]['type_liaison']),true)))),invalideur_session($Cache, self()))) .
'" class="ajax">' .
$l3 .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['type_liaison']),true))))!=='' ?
		(' (' . $t1 . ')') :
		'') .
'</a>
		</span>
	</li>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../extensions/a2a/formulaires/inc-recherche_libre.html
// Temps de compilation total: 5.720 ms
//

function html_c7516fb6e25c7bddfa46e362a90af317($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_Recherchehtml_c7516fb6e25c7bddfa46e362a90af317($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
	<ul class="resultats">
' . $t1 . '
	</ul>
') :
		((	'
	' .
	interdire_scripts((@$Pile[0]['message_erreur'])) .
	'
'))) .
'
');

	return analyse_resultat_skel('html_c7516fb6e25c7bddfa46e362a90af317', $Cache, $page, '../extensions/a2a/formulaires/inc-recherche_libre.html');
}
?>