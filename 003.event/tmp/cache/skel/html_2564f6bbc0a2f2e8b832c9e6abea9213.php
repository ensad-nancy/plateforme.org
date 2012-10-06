<?php

/*
 * Squelette : ../prive/modeles/doc.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Tue, 06 Dec 2011 14:57:43 GMT
 * Boucles :   _doc
 */ 

/* BOUCLE documents  */

 function BOUCLE_dochtml_2564f6bbc0a2f2e8b832c9e6abea9213(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_doc';
	static $from = array('documents' => 'spip_documents','L1' => 'spip_types_documents');
	static $type = array();
	static $groupby = array();
	static $select = array("documents.mode",
		"documents.id_document",
		"documents.largeur",
		"documents.hauteur",
		"L1.titre AS type_document",
		"documents.taille",
		"L1.mime_type",
		"documents.titre",
		"documents.descriptif");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote($Pile[0]['id_document'],'','int')));
	static $join = array('L1' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/modeles/doc.html','html_2564f6bbc0a2f2e8b832c9e6abea9213','_doc',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'

' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['mode'] == 'image')) ?' ' :''))))!=='' ?
		($t1 . (	'
	' .
	vide($Pile['vars']['fichier'] = vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))) .
	vide($Pile['vars']['width'] = interdire_scripts($Pile[$SP]['largeur'])) .
	vide($Pile['vars']['height'] = interdire_scripts($Pile[$SP]['hauteur'])) .
	vide($Pile['vars']['url'] = interdire_scripts(entites_html((@$Pile[0]['lien']),true))))) :
		'') .
'
' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['mode'] == 'image')) ?'' :' '))))!=='' ?
		($t1 . (	'
	' .
	vide($Pile['vars']['fichier'] = extraire_attribut(quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'src')) .
	'
	' .
	vide($Pile['vars']['width'] = extraire_attribut(quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'width')) .
	'
	' .
	vide($Pile['vars']['height'] = extraire_attribut(quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'height')) .
	'
	' .
	vide($Pile['vars']['url'] = interdire_scripts(entites_html(sinon(@$Pile[0]['lien'],vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))),true))))) :
		'') .
'

<dl class=\'spip_document_' .
$Pile[$SP]['id_document'] .
' spip_documents' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
		(' spip_documents_' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['class']),true))))!=='' ?
		(' ' . $t1) :
		'') .
' spip_lien_ok\'' .
(($t1 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
		(' style=\'float:' . $t1 . (	';' .
	(($t2 = strval(max(min((is_array($a = ($Pile["vars"])) ? $a['width'] : ""),'350'),'120')))!=='' ?
			('width:' . $t2) :
			'') .
	'px;\'')) :
		'') .
'>
<dt>' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['url'] : "")))!=='' ?
		('<a href="' . $t1 . (	'"' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['lien_class']),true))))!=='' ?
			(' class="' . $t2 . '"') :
			'') .
	' title=\'' .
	interdire_scripts($Pile[$SP]['type_document']) .
	' - ' .
	interdire_scripts(texte_backend(taille_en_octets($Pile[$SP]['taille']))) .
	'\'' .
	(($t2 = strval(interdire_scripts((entites_html((@$Pile[0]['lien']),true) ? '':(	'type="' .
		interdire_scripts($Pile[$SP]['mime_type']) .
		'"')))))!=='' ?
			(' ' . $t2) :
			'') .
	'>')) :
		'') .
'<img src=\'' .
(is_array($a = ($Pile["vars"])) ? $a['fichier'] : "") .
'\' width=\'' .
(is_array($a = ($Pile["vars"])) ? $a['width'] : "") .
'\' height=\'' .
(is_array($a = ($Pile["vars"])) ? $a['height'] : "") .
'\' alt=\'' .
interdire_scripts($Pile[$SP]['type_document']) .
' - ' .
interdire_scripts(texte_backend(taille_en_octets($Pile[$SP]['taille']))) .
'\' />' .
((is_array($a = ($Pile["vars"])) ? $a['url'] : "") ? '</a>':'') .
'</dt>' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect))))!=='' ?
		((	'
<dt class=\'' .
	'spip_doc_titre\'' .
	(($t2 = strval(max(min((is_array($a = ($Pile["vars"])) ? $a['width'] : ""),'350'),'120')))!=='' ?
			(' style=\'width:' . $t2 . 'px;\'') :
			'') .
	'><strong>') . $t1 . '</strong></dt>') :
		'') .
(($t1 = strval(interdire_scripts(PtoBR(propre($Pile[$SP]['descriptif'], $connect)))))!=='' ?
		((	'
<dd class=\'' .
	'spip_doc_descriptif\'' .
	(($t2 = strval(max(min((is_array($a = ($Pile["vars"])) ? $a['width'] : ""),'350'),'120')))!=='' ?
			(' style=\'width:' . $t2 . 'px;\'') :
			'') .
	'>') . $t1 . (	interdire_scripts(PtoBR(calculer_notes())) .
	'</dd>')) :
		'') .
'
</dl>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../prive/modeles/doc.html
// Temps de compilation total: 8.294 ms
//

function html_2564f6bbc0a2f2e8b832c9e6abea9213($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_dochtml_2564f6bbc0a2f2e8b832c9e6abea9213($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_2564f6bbc0a2f2e8b832c9e6abea9213', $Cache, $page, '../prive/modeles/doc.html');
}
?>