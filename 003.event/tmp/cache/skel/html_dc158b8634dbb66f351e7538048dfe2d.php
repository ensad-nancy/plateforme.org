<?php

/*
 * Squelette : squelettes/auteur.html
 * Date :      Tue, 06 Dec 2011 13:56:35 GMT
 * Compile :   Tue, 06 Dec 2011 15:06:11 GMT
 * Boucles :   _articles, _principale
 */ 

/* BOUCLE articles  */

 function BOUCLE_articleshtml_dc158b8634dbb66f351e7538048dfe2d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.popularite",
		"articles.titre",
		"articles.id_article",
		"articles.lang");
	static $orderby = array('articles.popularite DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', "1"), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','_articles',35,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
                
                <p><a title="' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'500','800')) .
'</a></p>
                ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_principalehtml_dc158b8634dbb66f351e7538048dfe2d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		"auteurs.nom_site");
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
		 array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','_principale',1,$GLOBALS['spip_lang']));
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

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_dc158b8634dbb66f351e7538048dfe2d\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


' .

	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/favicon', array('favicon' => 
((!is_array($l = quete_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')) ,'lang' => $GLOBALS["spip_lang"] ,'id_auteur'=>$Pile[$SP]['id_auteur'],'id'=>$Pile[$SP]['id_auteur'],'recurs'=>(++$recurs)), array('compil'=>array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','_principale',10,$GLOBALS['spip_lang']), 'trim'=>true), ''))
 .
'


<link rel="alternate" type="application/rss+xml" title="' .
interdire_scripts(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_auteur',$Pile[$SP]['id_auteur'])) .
'" />
</head>

<body class="page_auteur">

		' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-barrehaute') . ', array(\'skel\' => ' . argumenter_squelette('squelettes/auteur.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_dc158b8634dbb66f351e7538048dfe2d\',\'\',18,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<div class="col">	
		<div class="vcard">
        <div class="cartouche">
        <h1 class="fn">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</h1>
            ' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'200','200')) .
'
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

</div><!--#page-->

       
        <div class="col">
         ' .
(($t1 = BOUCLE_articleshtml_dc158b8634dbb66f351e7538048dfe2d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
                ' . $t1 . '
        ') :
		'') .
'
        </div>
        

  
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-pied') . ', array(\'skel\' => ' . argumenter_squelette('squelettes/auteur.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes/auteur.html\',\'html_dc158b8634dbb66f351e7538048dfe2d\',\'\',45,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


</body>
</html>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/auteur.html
// Temps de compilation total: 8.706 ms
//

function html_dc158b8634dbb66f351e7538048dfe2d($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_principalehtml_dc158b8634dbb66f351e7538048dfe2d($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_dc158b8634dbb66f351e7538048dfe2d', $Cache, $page, 'squelettes/auteur.html');
}
?>