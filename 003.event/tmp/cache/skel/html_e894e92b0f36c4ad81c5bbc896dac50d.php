<?php

/*
 * Squelette : ../prive/contenu/article.html
 * Date :      Mon, 05 Dec 2011 10:08:58 GMT
 * Compile :   Mon, 05 Dec 2011 10:36:16 GMT
 * Boucles :   _afficher_contenu
 */ 

/* BOUCLE articles  */

 function BOUCLE_afficher_contenuhtml_e894e92b0f36c4ad81c5bbc896dac50d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'articles';
	static $id = '_afficher_contenu';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.surtitre",
		"articles.lang",
		"articles.titre",
		"articles.soustitre",
		"articles.descriptif",
		"articles.chapo",
		"articles.nom_site",
		"articles.url_site",
		"articles.texte",
		"articles.ps");
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
		 array('../prive/contenu/article.html','html_e894e92b0f36c4ad81c5bbc896dac50d','_afficher_contenu',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<div class="champ contenu_surtitre' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['surtitre']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:texte_sur_titre') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'surtitre\'>' .
interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect)) .
'</div>
</div>
<div class="champ contenu_titre' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['titre']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_titre') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'titre\'>' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</div>
</div>
<div class="champ contenu_soustitre' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['soustitre']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:texte_sous_titre') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'soustitre\'>' .
interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect)) .
'</div>
</div>
<div class="champ contenu_descriptif' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['descriptif']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_descriptif') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'descriptif\'>' .
interdire_scripts(propre($Pile[$SP]['descriptif'], $connect)) .
'</div>
</div>
<div class="champ contenu_chapo' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['chapo']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_chapeau') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'chapo\'>' .
interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect),'500','0'))) .
'</div>
</div>
<div class="champ contenu_nom_site' .
(($t1 = strval(interdire_scripts((strlen(((($a = $Pile[$SP]['nom_site']) OR (!is_array($a) AND strlen($a))) ? $a : $Pile[$SP]['url_site'])) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:lien_voir_en_ligne') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'nom_site\'>' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		('<a href=\'' . $t1 . '\'>') :
		'') .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
((calculer_url($Pile[$SP]['url_site'],'','url', $connect))  ?
		(' ' . '</a>') :
		'') .
'</div>
</div>
<div class="champ contenu_texte' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['texte']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_texte') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'texte\'>' .
interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['texte'], $connect),'500','0'))) .
'</div>
</div>
<div class="champ contenu_ps' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['ps']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_post_scriptum') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'ps\'>' .
interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['ps'], $connect),'500','0'))) .
'</div>
</div>
' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="champ contenu_notes">
<div class=\'label\'>' .
	_T('public/spip/ecrire:info_notes') .
	'</div>
<div dir=\'' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'\' class=\'' .
	'notes\'>') . $t1 . '</div>
</div>') :
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
// Fonction principale du squelette ../prive/contenu/article.html
// Temps de compilation total: 5.064 ms
//

function html_e894e92b0f36c4ad81c5bbc896dac50d($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_afficher_contenuhtml_e894e92b0f36c4ad81c5bbc896dac50d($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_e894e92b0f36c4ad81c5bbc896dac50d', $Cache, $page, '../prive/contenu/article.html');
}
?>