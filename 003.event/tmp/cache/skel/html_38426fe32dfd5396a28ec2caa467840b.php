<?php

/*
 * Squelette : ../extensions/a2a/prive/contenu/a2a_article.html
 * Date :      Mon, 05 Dec 2011 10:20:37 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:16 GMT
 * Boucles :   _lies_both, _autorise, _lesArticlesLies, _LesLie
 */ 

/* BOUCLE articles_lies  */

 function BOUCLE_lies_bothhtml_38426fe32dfd5396a28ec2caa467840b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles_lies';
	static $id = '_lies_both';
	static $from = array('articles_lies' => 'spip_articles_lies');
	static $type = array();
	static $groupby = array();
	static $select = array("articles_lies.id_article");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles_lies.id_article_lie', sql_quote(@$Pile[0]['id_article_orig'],'','int')), 
			array('=', 'articles_lies.id_article', sql_quote($Pile[$SP-2]['id_article_lie'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/a2a/prive/contenu/a2a_article.html','html_38426fe32dfd5396a28ec2caa467840b','_lies_both',17,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('a2a:supprimer_le_lien_deux_cotes');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
			' .
(($t1 = '<form class=\'bouton_action_post ' . 'ajax' . '\' method=\'post\' action=\'' . ($u=invalideur_session($Cache, generer_action_auteur('a2a',(	'supprimer_lien/' .
		invalideur_session($Cache, $Pile[$SP]['id_article']) .
		'/' .
		invalideur_session($Cache, @$Pile[0]['id_article_orig']) .
		'/both'),invalideur_session($Cache, self())))) . '\'>'
. '<div>' . form_hidden($u)
. '<button type=\'submit\' class=\'submit\' ' . '' . '>' . $l1 . '</button>'
. '</div></form>')!=='' ?
		('<td class="arial1">' . $t1 . '</td>') :
		'') .
'
			');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE CONDITION  */

 function BOUCLE_autorisehtml_38426fe32dfd5396a28ec2caa467840b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'condition';
	static $table = 'CONDITION';
	static $id = '_autorise';
	static $from = array('CONDITION' => 'CONDITION');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(($test=invalideur_session($Cache, (((include_spip("inc/autoriser")&&autoriser('modifier', 'article', invalideur_session($Cache, @$Pile[0]['id_article_orig']))?" ":"")) ?' ' :'')))?array('tableau','1:1'):'');
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/a2a/prive/contenu/a2a_article.html','html_38426fe32dfd5396a28ec2caa467840b','_autorise',13,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('a2a:rang_moins');
	$l2 = _T('a2a:rang_plus');
	$l3 = _T('a2a:supprimer_le_lien');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
' 
			' .
(($t1 = '<form class=\'bouton_action_post ' . 'ajax' . '\' method=\'post\' action=\'' . ($u=invalideur_session($Cache, generer_action_auteur('a2a',(	'modifier_rang/' .
		invalideur_session($Cache, $Pile[$SP-1]['id_article']) .
		'/' .
		invalideur_session($Cache, @$Pile[0]['id_article_orig']) .
		'/moins'),invalideur_session($Cache, self())))) . '\'>'
. '<div>' . form_hidden($u)
. '<button type=\'submit\' class=\'submit\' ' . '' . '>' . $l1 . '</button>'
. '</div></form>')!=='' ?
		('<td class="arial1">' . $t1 . '</td>') :
		'') .
'
			' .
(($t1 = '<form class=\'bouton_action_post ' . 'ajax' . '\' method=\'post\' action=\'' . ($u=invalideur_session($Cache, generer_action_auteur('a2a',(	'modifier_rang/' .
		invalideur_session($Cache, $Pile[$SP-1]['id_article']) .
		'/' .
		invalideur_session($Cache, @$Pile[0]['id_article_orig']) .
		'/plus'),invalideur_session($Cache, self())))) . '\'>'
. '<div>' . form_hidden($u)
. '<button type=\'submit\' class=\'submit\' ' . '' . '>' . $l2 . '</button>'
. '</div></form>')!=='' ?
		('<td class="arial1">' . $t1 . '</td>') :
		'') .
'
			' .
(($t1 = '<form class=\'bouton_action_post ' . 'ajax' . '\' method=\'post\' action=\'' . ($u=invalideur_session($Cache, generer_action_auteur('a2a',(	'supprimer_lien/' .
		invalideur_session($Cache, $Pile[$SP-1]['id_article']) .
		'/' .
		invalideur_session($Cache, @$Pile[0]['id_article_orig'])),invalideur_session($Cache, self())))) . '\'>'
. '<div>' . form_hidden($u)
. '<button type=\'submit\' class=\'submit\' ' . '' . '>' . $l3 . '</button>'
. '</div></form>')!=='' ?
		('<td class="arial1">' . $t1 . '</td>') :
		'') .
'
			' .
(($t1 = BOUCLE_lies_bothhtml_38426fe32dfd5396a28ec2caa467840b($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		('
			<td class="arial1">&nbsp;</td>
			')) .
'
		');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_lesArticlesLieshtml_38426fe32dfd5396a28ec2caa467840b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_lesArticlesLies';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.statut",
		"articles.id_rubrique",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article_lie'],'','int')), 
			array('REGEXP', 'articles.statut', "'.*'"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/a2a/prive/contenu/a2a_article.html','html_38426fe32dfd5396a28ec2caa467840b','_lesArticlesLies',8,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
		<td class=\'statut\'>' .
puce_changement_statut($Pile[$SP]['id_article'],interdire_scripts($Pile[$SP]['statut']),$Pile[$SP]['id_rubrique'],'article') .
'</td>
		<td class=\'rang\'>' .
(($Pile[$SP-1]['rang'])?($Pile[$SP-1]['rang']):recuperer_numero($Pile[$SP]['titre'])) .
'</td>
		<td class=\'type_liaison\'>' .
interdire_scripts($Pile[$SP-1]['type_liaison']) .
'</td>
		<td class="arial2"><a href="' .
url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true)))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></td>
		' .
BOUCLE_autorisehtml_38426fe32dfd5396a28ec2caa467840b($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles_lies  */

 function BOUCLE_LesLiehtml_38426fe32dfd5396a28ec2caa467840b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles_lies';
	static $id = '_LesLie';
	static $from = array('articles_lies' => 'spip_articles_lies');
	static $type = array();
	static $groupby = array();
	static $select = array("articles_lies.id_article_lie",
		"articles_lies.rang",
		"articles_lies.type_liaison");
	static $orderby = array('articles_lies.rang');
	$where = 
			array(
			array('=', 'articles_lies.id_article', sql_quote(@$Pile[0]['id_article_orig'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../extensions/a2a/prive/contenu/a2a_article.html','html_38426fe32dfd5396a28ec2caa467840b','_LesLie',3,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_LesLie']['compteur_boucle'] = 0;
	$Numrows['_LesLie']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_LesLie']) ? $Pile[0]['debut_LesLie'] : _request('debut_LesLie');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_LesLie'] = quete_debut_pagination('id_article,id_article_lie',$Pile[0]['@id_article,id_article_lie'] = substr($debut_boucle,1),(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['nb'],'10'),true)))) ? $a : 10),$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_LesLie']['total']-1)/((($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['nb'],'10'),true)))) ? $a : 10)))*((($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['nb'],'10'),true)))) ? $a : 10))));
	$fin_boucle = min(($tout ? $Numrows['_LesLie']['total'] : $debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['nb'],'10'),true)))) ? $a : 10) - 1), $Numrows['_LesLie']['total'] - 1);
	$Numrows['_LesLie']['grand_total'] = $Numrows['_LesLie']['total'];
	$Numrows['_LesLie']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_LesLie']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_LesLie']['compteur_boucle'] = $debut_boucle;
	
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_LesLie']['compteur_boucle']++;
		if ($Numrows['_LesLie']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_LesLie']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
<tr class=\'tr_liste\'>
	' .
BOUCLE_lesArticlesLieshtml_38426fe32dfd5396a28ec2caa467840b($Cache, $Pile, $doublons, $Numrows, $SP) .
'
</tr>	
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../extensions/a2a/prive/contenu/a2a_article.html
// Temps de compilation total: 11.785 ms
//

function html_38426fe32dfd5396a28ec2caa467840b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><div id="editer_articles_lies-' .
@$Pile[0]['id_article_orig'] .
'" class="ajax-action nom_action">
' .
(($t1 = BOUCLE_LesLiehtml_38426fe32dfd5396a28ec2caa467840b($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		filtre_pagination_dist($Numrows["_LesLie"]["grand_total"],
 		'_LesLie',
		isset($Pile[0]['debut_LesLie'])?$Pile[0]['debut_LesLie']:intval(_request('debut_LesLie')),
		(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['nb'],'10'),true)))) ? $a : 10), false, '', '', array()) .
		'
<div class="cadre cadre-liste"><table width="100%" cellpadding="2" cellspacing="0" border="0">
') . $t1 . (	'
</table>
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_LesLie"]["grand_total"],
 		'_LesLie',
		isset($Pile[0]['debut_LesLie'])?$Pile[0]['debut_LesLie']:intval(_request('debut_LesLie')),
		(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['nb'],'10'),true)))) ? $a : 10), true, 'prive', '', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class=\'pagination\'>' . $t3 . '</p>') :
				'') .
		'</div>
')) :
		((	'
' .
	_T('a2a:pas_articles_lies') .
	'
'))) .
'
<div id="pave_a2a_depliable" class="bloc_depliable blocreplie">
	<p id="type_recherche_a2a">
		<a href="#" id="recherche_texte" class="on">' .
_T('a2a:recherche_texte') .
'</a> | 
		<a href="#" id="recherche_arbo">' .
_T('a2a:recherche_arbo') .
'</a>
	</p>
	' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE_A2A',
	array(@$Pile[0]['id_article_orig']),
	array('../extensions/a2a/prive/contenu/a2a_article.html','html_38426fe32dfd5396a28ec2caa467840b','',36,$GLOBALS['spip_lang'])) .
executer_balise_dynamique('FORMULAIRE_NAVIGATEUR_A2A',
	array(@$Pile[0]['id_article_orig']),
	array('../extensions/a2a/prive/contenu/a2a_article.html','html_38426fe32dfd5396a28ec2caa467840b','',36,$GLOBALS['spip_lang'])) .
'</div>
<script type="text/javascript">
(function($){
	$(function(){
		$(\'#formulaire_navigateur_a2a\').hide();
		$(\'#type_recherche_a2a a\').click(function(){
			$(\'#pave_a2a_depliable .formulaire_spip\').toggle(\'slow\');
			$(\'#type_recherche_a2a a\').toggleClass(\'on\');
			return false;
		});
	});
})(jQuery);
</script>
</div>
');

	return analyse_resultat_skel('html_38426fe32dfd5396a28ec2caa467840b', $Cache, $page, '../extensions/a2a/prive/contenu/a2a_article.html');
}
?>