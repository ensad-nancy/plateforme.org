<?php

/*
 * Squelette : prive/modeles/img.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Thu, 08 Dec 2011 15:45:50 GMT
 * Boucles :   _document
 */ 

/* BOUCLE documents  */

 function BOUCLE_documenthtml_5627e6aff5d501501d3d0e2a5d0ce6a2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['mode']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'documents';
	static $id = '_document';
	static $from = array('documents' => 'spip_documents','L1' => 'spip_types_documents');
	static $type = array();
	static $groupby = array();
	static $select = array("documents.id_document",
		"documents.mode",
		"documents.largeur",
		"documents.hauteur",
		"documents.titre",
		"L1.mime_type",
		"L1.titre AS type_document");
	static $orderby = array();
	$where = 
			array(
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote($Pile[0]['id_document'],'','int')), (!(is_array($Pile[0]['mode'])?count($Pile[0]['mode']):strlen($Pile[0]['mode'])) ? '' : ((is_array($Pile[0]['mode'])) ? sql_in('documents.mode',sql_quote($in)) : 
			array('=', 'documents.mode', sql_quote($Pile[0]['mode'])))));
	static $join = array('L1' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('prive/modeles/img.html','html_5627e6aff5d501501d3d0e2a5d0ce6a2','_document',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'

' .
vide($Pile['vars']['image'] = interdire_scripts((((($a = match($Pile[$SP]['mode'],'image|vignette')) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(entites_html((@$Pile[0]['embed']),true))) ? ' ':''))) .
(((is_array($a = ($Pile["vars"])) ? $a['image'] : ""))  ?
		(' ' . (	'
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['class']),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
			(' style=\'float:' . $t2 . (	';' .
		(($t3 = strval(interdire_scripts($Pile[$SP]['largeur'])))!=='' ?
				(' width:' . $t3 . 'px;') :
				'') .
		'\'')) :
			'') .
	'>
' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['lien']),true))))!=='' ?
			('<a href="' . $t2 . (	'"' .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['lien_class']),true))))!=='' ?
				(' class="' . $t3 . '"') :
				'') .
		'>')) :
			'') .
	'<img src=\'' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'\'' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['largeur'])))!=='' ?
			(' width="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts($Pile[$SP]['hauteur'])))!=='' ?
			(' height="' . $t2 . '"') :
			'') .
	' alt="' .
	interdire_scripts(texte_backend(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
	'"' .
	(($t2 = strval(interdire_scripts(texte_backend(typo($Pile[$SP]['titre'], "TYPO", $connect)))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' />' .
	interdire_scripts((entites_html((@$Pile[0]['lien']),true) ? '</a>':'')) .
	'</span>
')) :
		'') .
(!((is_array($a = ($Pile["vars"])) ? $a['image'] : ""))  ?
		(' ' . (	'
	' .
	vide($Pile['vars']['fichier'] = extraire_attribut(quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'src')) .
	'
	' .
	vide($Pile['vars']['width'] = extraire_attribut(quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'width')) .
	'
	' .
	vide($Pile['vars']['height'] = extraire_attribut(quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'height')) .
	'
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['class']),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
			(' style=\'float:' . $t2 . (	';' .
		(($t3 = strval((is_array($a = ($Pile["vars"])) ? $a['width'] : "")))!=='' ?
				(' width:' . $t3 . 'px;') :
				'') .
		'\'')) :
			'') .
	'><a href="' .
	interdire_scripts(((($a = entites_html((@$Pile[0]['lien']),true)) OR (!is_array($a) AND strlen($a))) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))))) .
	'"' .
	(($t2 = strval(interdire_scripts((entites_html((@$Pile[0]['lien']),true) ? '':(	'type="' .
		interdire_scripts($Pile[$SP]['mime_type']) .
		'"')))))!=='' ?
			(' ' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(texte_backend(typo($Pile[$SP]['titre'], "TYPO", $connect)))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'><img src=\'' .
	(is_array($a = ($Pile["vars"])) ? $a['fichier'] : "") .
	'\' width=\'' .
	(is_array($a = ($Pile["vars"])) ? $a['width'] : "") .
	'\' height=\'' .
	(is_array($a = ($Pile["vars"])) ? $a['height'] : "") .
	'\' alt=\'' .
	interdire_scripts(attribut_html((strlen(typo($Pile[$SP]['titre'], "TYPO", $connect)) ? (	interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
		' {' .
		interdire_scripts($Pile[$SP]['type_document']) .
		'}'):interdire_scripts($Pile[$SP]['type_document'])))) .
	'\' /></a></span>
')) :
		''));
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette prive/modeles/img.html
// Temps de compilation total: 8.480 ms
//

function html_5627e6aff5d501501d3d0e2a5d0ce6a2($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_documenthtml_5627e6aff5d501501d3d0e2a5d0ce6a2($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_5627e6aff5d501501d3d0e2a5d0ce6a2', $Cache, $page, 'prive/modeles/img.html');
}
?>