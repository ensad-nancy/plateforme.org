<?php

/*
 * Squelette : ../extensions/a2a/formulaires/recherche_a2a.html
 * Date :      Mon, 05 Dec 2011 10:20:29 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:16 GMT
 * Boucles :   _doublons
 */ 

/* BOUCLE articles_lies  */

 function BOUCLE_doublonshtml_415cb5caa504bb5a8d8fccd967daf3fd(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles_lies';
	static $id = '_doublons';
	static $from = array('articles_lies' => 'spip_articles_lies');
	static $type = array();
	static $groupby = array();
	static $select = array("articles_lies.id_article_lie");
	static $orderby = array();
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
		 array('../extensions/a2a/formulaires/recherche_a2a.html','html_415cb5caa504bb5a8d8fccd967daf3fd','_doublons',25,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
	' .
vide($Pile['vars']['exclure'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['exclure'] : ""),$Pile[$SP]['id_article_lie'])));
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../extensions/a2a/formulaires/recherche_a2a.html
// Temps de compilation total: 2.930 ms
//

function html_415cb5caa504bb5a8d8fccd967daf3fd($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_recherche_a2a ajax" id="formulaire_recherche_a2a">
<br class=\'bugajaxie\' />
<form method=\'post\' action=\'' .
interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
'#formulaire_recherche_a2a\' enctype=\'multipart/form-data\'>
	<div>
		' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><ul>
			<li class="recherche_a2a">
				<input type="hidden" id="a2a_article_orig" name="id_article" value="' .
@$Pile[0]['id_article_orig'] .
'" />
				<label for="recherche_a2a">' .
_T('a2a:rechercher_un_article_a_lier') .
'</label>
				<p class="explication">' .
_T('a2a:rechercher_tip_articles_ids') .
'</p>
				<input type="text" class="text" name="recherche" id="recherche_a2a" />
			</li>
			<li class="">
				<div class=\'choix\'>
					<input type="checkbox" name="recherche_titre" id="recherche_titre_a2a"' .
(($t1 = strval(interdire_scripts((((@$Pile[0]['recherche_titre'])) ?' ' :''))))!=='' ?
		(' ' . $t1 . ' checked="checked"') :
		'') .
'/>
					<label for="recherche_titre_a2a">' .
_T('a2a:rechercher_seulement_titres') .
'</label>
				</div>
			</li>
		</ul>
		<p class=\'boutons\'><input type="submit" name="ok" value="' .
_T('a2a:rechercher') .
'" /></p>
	</div>
</form>

	' .
vide($Pile['vars']['exclure'] = array('0' => @$Pile[0]['id_article_orig'])) .
BOUCLE_doublonshtml_415cb5caa504bb5a8d8fccd967daf3fd($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	' .
(($t1 = strval(interdire_scripts(((match((@$Pile[0]['recherche']),'^art\\d+$')) ?' ' :''))))!=='' ?
		($t1 . (	'
		' .
	vide($Pile['vars']['recherche'] = interdire_scripts(substr(entites_html((@$Pile[0]['recherche']),true),'3'))) .
	'
		' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-recherche_id') . ', array(\'id_article_orig\' => ' . argumenter_squelette(@$Pile[0]['id_article_orig']) . ',
	\'recherche\' => ' . argumenter_squelette((is_array($a = ($Pile["vars"])) ? $a['recherche'] : "")) . ',
	\'type_liaison\' => ' . argumenter_squelette(@$Pile[0]['type_liaison']) . ',
	\'exclure\' => ' . argumenter_squelette((is_array($a = ($Pile["vars"])) ? $a['exclure'] : "")) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'../extensions/a2a/formulaires/recherche_a2a.html\',\'html_415cb5caa504bb5a8d8fccd967daf3fd\',\'\',30,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>')) :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(((match((@$Pile[0]['recherche']),'^art\\d+$')) ?'' :' '))))!=='' ?
		($t1 . (	'
		' .
	(($t2 = strval(interdire_scripts((((@$Pile[0]['recherche'])) ?' ' :''))))!=='' ?
			($t2 . (	'
			' .
		(($t3 = strval(interdire_scripts((((@$Pile[0]['recherche_titre'])) ?' ' :''))))!=='' ?
				($t3 . (	'
				' .
			
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-recherche_titre') . ', array(\'id_article_orig\' => ' . argumenter_squelette(@$Pile[0]['id_article_orig']) . ',
	\'recherche\' => ' . argumenter_squelette(@$Pile[0]['recherche']) . ',
	\'type_liaison\' => ' . argumenter_squelette(@$Pile[0]['type_liaison']) . ',
	\'exclure\' => ' . argumenter_squelette((is_array($a = ($Pile["vars"])) ? $a['exclure'] : "")) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'../extensions/a2a/formulaires/recherche_a2a.html\',\'html_415cb5caa504bb5a8d8fccd967daf3fd\',\'\',32,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>')) :
				'') .
		'
			' .
		(($t3 = strval(interdire_scripts((((@$Pile[0]['recherche_titre'])) ?'' :' '))))!=='' ?
				($t3 . (	'
				' .
			
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/inc-recherche_libre') . ', array(\'id_article_orig\' => ' . argumenter_squelette(@$Pile[0]['id_article_orig']) . ',
	\'recherche\' => ' . argumenter_squelette(@$Pile[0]['recherche']) . ',
	\'type_liaison\' => ' . argumenter_squelette(@$Pile[0]['type_liaison']) . ',
	\'exclure\' => ' . argumenter_squelette((is_array($a = ($Pile["vars"])) ? $a['exclure'] : "")) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'../extensions/a2a/formulaires/recherche_a2a.html\',\'html_415cb5caa504bb5a8d8fccd967daf3fd\',\'\',33,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>')) :
				''))) :
			''))) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_415cb5caa504bb5a8d8fccd967daf3fd', $Cache, $page, '../extensions/a2a/formulaires/recherche_a2a.html');
}
?>