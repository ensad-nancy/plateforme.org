<?php

/*
 * Squelette : squelettes-dist/auteur.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Tue, 06 Dec 2011 13:40:39 GMT
 * Boucles :   _articles, _auteurs, _principale
 */ 

/* BOUCLE articles  */

 function BOUCLE_articleshtml_4d74904308497f080356f5626c4e8811(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.popularite",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.popularite DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/auteur.html','html_4d74904308497f080356f5626c4e8811','_articles',40,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles']['compteur_boucle'] = 0;
	$Numrows['_articles']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_articles']) ? $Pile[0]['debut_articles'] : _request('debut_articles');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_articles']['total'] : $debut_boucle + 9), $Numrows['_articles']['total'] - 1);
	$Numrows['_articles']['grand_total'] = $Numrows['_articles']['total'];
	$Numrows['_articles']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_articles']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles']['compteur_boucle']++;
		if ($Numrows['_articles']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
                <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
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



/* BOUCLE auteurs  */

 function BOUCLE_auteurshtml_4d74904308497f080356f5626c4e8811(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.nom",
		"auteurs.id_auteur");
	static $orderby = array('auteurs.nom');
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/auteur.html','html_4d74904308497f080356f5626c4e8811','_auteurs',74,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_auteurs']['compteur_boucle'] = 0;
	$Numrows['_auteurs']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_auteurs']) ? $Pile[0]['debut_auteurs'] : _request('debut_auteurs');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_auteurs'] = quete_debut_pagination('id_auteur',$Pile[0]['@id_auteur'] = substr($debut_boucle,1),20,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_auteurs']['total']-1)/(20))*(20)));
	$fin_boucle = min(($tout ? $Numrows['_auteurs']['total'] : $debut_boucle + 19), $Numrows['_auteurs']['total'] - 1);
	$Numrows['_auteurs']['grand_total'] = $Numrows['_auteurs']['total'];
	$Numrows['_auteurs']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_auteurs']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_auteurs']['compteur_boucle'] = $debut_boucle;
	
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_auteurs']['compteur_boucle']++;
		if ($Numrows['_auteurs']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_auteurs']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
                <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'"' .
(calcul_exposer($Pile[$SP]['id_auteur'], 'id_auteur', $Pile[0], '', 'id_auteur', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>' .
interdire_scripts(couper(typo($Pile[$SP]['nom'], "TYPO", $connect),'80')) .
'</a></li>
                ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_principalehtml_4d74904308497f080356f5626c4e8811(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_principale';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.id_auteur",
		"auteurs.lang",
		"auteurs.nom",
		"auteurs.bio",
		"auteurs.url_site",
		"auteurs.nom_site",
		"auteurs.email");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''), 
			array('=', 'auteurs.id_auteur', sql_quote($Pile[0]['id_auteur'],'','int')));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/auteur.html','html_4d74904308497f080356f5626c4e8811','_principale',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
(($t1 = strval(interdire_scripts(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect)))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(attribut_html(couper(propre($Pile[$SP]['bio'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/auteur.html\',\'html_4d74904308497f080356f5626c4e8811\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


' .

	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/favicon', array('favicon' => 
((!is_array($l = quete_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')) ,'lang' => $GLOBALS["spip_lang"] ,'id_auteur'=>$Pile[$SP]['id_auteur'],'id'=>$Pile[$SP]['id_auteur'],'recurs'=>(++$recurs)), array('compil'=>array('squelettes-dist/auteur.html','html_4d74904308497f080356f5626c4e8811','_principale',10,$GLOBALS['spip_lang']), 'trim'=>true), ''))
 .
'


<link rel="alternate" type="application/rss+xml" title="' .
interdire_scripts(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_auteur',$Pile[$SP]['id_auteur'])) .
'" />
</head>

<body class="page_auteur">
<div id="page">

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-entete') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/auteur.html\',\'html_4d74904308497f080356f5626c4e8811\',\'\',20,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	
    <div id="conteneur">
    <div id="contenu">
    
        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site') .
'</a> &gt; ' .
_T('public/spip/ecrire:info_auteurs') .
(($t1 = strval(interdire_scripts(couper(typo($Pile[$SP]['nom'], "TYPO", $connect),'80'))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</div>

		<div class="vcard">
        <div class="cartouche">
            ' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'200','200')) .
'
            <h1 class="fn">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</h1>
        </div>

        ' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['bio'], $connect))))!=='' ?
		((	'<div class="texte note">') . $t1 . '</div>') :
		'') .
'
        ' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<p class="hyperlien">' .
	_T('public/spip/ecrire:voir_en_ligne') .
	' : <a href="') . $t1 . (	'" class="url org spip_out">' .
	interdire_scripts(((($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) OR (!is_array($a) AND strlen($a))) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80'))) .
	'</a></p>')) :
		'') .
'
		</div>

        
        ' .
(($t1 = BOUCLE_articleshtml_4d74904308497f080356f5626c4e8811($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu articles">
            ' .
		filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, false, '', '', array()) .
		'
            <h2>' .
		_T('public/spip/ecrire:articles_auteur') .
		' (' .
		(isset($Numrows['_articles']['grand_total'])
			? $Numrows['_articles']['grand_total'] : $Numrows['_articles']['total']) .
		')</h2>
            <ul>
                ') . $t1 . (	'
            </ul>
            ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, true, '', '', array())))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
        </div>
        ')) :
		'') .
'

        ' .
executer_balise_dynamique('FORMULAIRE_ECRIRE_AUTEUR',
	array($Pile[$SP]['id_auteur'],@$Pile[0]['id_article'],$Pile[$SP]['email']),
	array('squelettes-dist/auteur.html','html_4d74904308497f080356f5626c4e8811','_principale',53,$GLOBALS['spip_lang'])) .
'

        ' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes"><h2>' .
	_T('public/spip/ecrire:info_notes') .
	'</h2>') . $t1 . '</div>') :
		'') .
'

	</div><!--#contenu-->
	</div><!--#conteneur-->

    
    <div id="navigation">

        
        ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-rubriques') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/auteur.html\',\'html_4d74904308497f080356f5626c4e8811\',\'\',64,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('squelettes-dist/auteur.html','html_4d74904308497f080356f5626c4e8811','_principale',66,$GLOBALS['spip_lang'])) .
'

    </div><!--#navigation-->
    
    
    <div id="extra">

        
        ' .
(($t1 = BOUCLE_auteurshtml_4d74904308497f080356f5626c4e8811($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            ' .
		filtre_pagination_dist($Numrows["_auteurs"]["grand_total"],
 		'_auteurs',
		isset($Pile[0]['debut_auteurs'])?$Pile[0]['debut_auteurs']:intval(_request('debut_auteurs')),
		20, false, '', '', array()) .
		'
            <h2>' .
		_T('public/spip/ecrire:info_auteurs') .
		'</h2>
            <ul>
                ') . $t1 . (	'
            </ul>
            ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_auteurs"]["grand_total"],
 		'_auteurs',
		isset($Pile[0]['debut_auteurs'])?$Pile[0]['debut_auteurs']:intval(_request('debut_auteurs')),
		20, true, '', '', array())))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
        </div>
        ')) :
		'') .
'

    </div><!--#extra-->

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-pied') . ', array(\'skel\' => ' . argumenter_squelette('squelettes-dist/auteur.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/auteur.html\',\'html_4d74904308497f080356f5626c4e8811\',\'\',90,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div><!--#page-->
</body>
</html>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/auteur.html
// Temps de compilation total: 227.455 ms
//

function html_4d74904308497f080356f5626c4e8811($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_principalehtml_4d74904308497f080356f5626c4e8811($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_4d74904308497f080356f5626c4e8811', $Cache, $page, 'squelettes-dist/auteur.html');
}
?>