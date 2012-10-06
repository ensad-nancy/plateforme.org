<?php

/*
 * Squelette : squelettes-dist/inc-documents.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Mon, 05 Dec 2011 15:01:50 GMT
 * Boucles :   _documents_portfolio, _afficher_document, _documents_joints, _documents_decompte
 */ 

/* BOUCLE documents  */

 function BOUCLE_documents_portfoliohtml_085aea6f1d96f979df9af18786791478(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	$in = array();
	$in[]= 'png';
	$in[]= 'jpg';
	$in[]= 'gif';
	static $table = 'documents';
	static $id = '_documents_portfolio';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"documents.fichier");
	static $orderby = array('num', 'documents.date');
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_article'])), 
			array('=', 'L1.objet', sql_quote('article')), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in)), 
			array('=', 'L1.vu', "'non'"), 
			array(sql_in('documents.id_document', $doublons[$doublons_index[]= ('documents')], 'NOT')));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-documents.html','html_085aea6f1d96f979df9af18786791478','_documents_portfolio',2,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))))!=='' ?
		('
	<a href="' . $t1 . (	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'" onclick="location.href=\'' .
	parametre_url(vider_url(urlencode_1738(generer_url_entite(@$Pile[0]['id_article'], 'article', '', '', true))),'id_document',$Pile[$SP]['id_document']) .
	'#documents_portfolio\';return false;"' .
	(($t2 = strval(interdire_scripts(@$Pile[0]['exposer'])))!=='' ?
			(' class="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))),'80'))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>' .
	interdire_scripts(inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',get_spip_doc($Pile[$SP]['fichier']),'0','100')),'class','spip_logos'),'alt',interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))),'80')))) .
	'</a>
	')) :
		'');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_afficher_documenthtml_085aea6f1d96f979df9af18786791478(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	$in[]= 'png';
	$in[]= 'jpg';
	$in[]= 'gif';
	static $table = 'documents';
	static $id = '_afficher_document';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("documents.id_document");
	$orderby = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(documents.extension,' . sql_quote($in) . ')')));
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote($Pile[0]['id_document'],'','int')), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_article'])), 
			array('=', 'L1.objet', sql_quote('article')), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in)));
	static $join = array('L1' => array('documents','id_document'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-documents.html','html_085aea6f1d96f979df9af18786791478','_afficher_document',19,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
' .
filtrer('image_graver',filtrer('image_reduire',
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/emb', array('lang' => $GLOBALS["spip_lang"] ,'id_document'=>$Pile[$SP]['id_document'],'id'=>$Pile[$SP]['id_document'],'recurs'=>(++$recurs)), array('compil'=>array('squelettes-dist/inc-documents.html','html_085aea6f1d96f979df9af18786791478','_afficher_document',20,$GLOBALS['spip_lang']), 'trim'=>true), ''))
,'500','0')) .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_documents_jointshtml_085aea6f1d96f979df9af18786791478(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	$in[]= 'gif';
	$in[]= 'jpg';
	$in[]= 'png';
	static $table = 'documents';
	static $id = '_documents_joints';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"L2.titre AS type_document",
		"documents.taille",
		"documents.descriptif");
	static $orderby = array('num', 'documents.date');
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_article'])), 
			array('=', 'L1.objet', sql_quote('article')), sql_in('documents.extension',sql_quote($in),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-documents.html','html_085aea6f1d96f979df9af18786791478','_documents_joints',37,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:bouton_telecharger');
	$l2 = _T('public/spip/ecrire:info_document');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
(($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))))!=='' ?
		('
		<li>
			<strong><a href="' . $t1 . (	'" title="' .
	$l1 .
	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'">' .
	interdire_scripts(((($a = traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))) OR (!is_array($a) AND strlen($a))) ? $a : $l2)) .
	'</a></strong>
			<small>(<span>' .
	interdire_scripts($Pile[$SP]['type_document']) .
	(($t2 = strval(interdire_scripts(taille_en_octets($Pile[$SP]['taille']))))!=='' ?
			(' &ndash; ' . $t2) :
			'') .
	'</span>)</small>
			' .
	interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))) .
	'
		')) :
		'') .
'</li>
		');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_documents_decomptehtml_085aea6f1d96f979df9af18786791478(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	$in[]= 'gif';
	$in[]= 'jpg';
	$in[]= 'png';
	static $table = 'documents';
	static $id = '_documents_decompte';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("documents.id_document",
		"documents.id_document");
	static $select = array("documents.id_document");
	static $orderby = array();
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L2.id_article', sql_quote($Pile[0]['id_article'])), 
			array('=', 'documents.mode', "'document'"), 
			array('=', 'L2.texte', "''"), sql_in('documents.extension',sql_quote($in),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	$join = array('L1' => array('documents','id_document'), 'L2' => array('L1','id_article','id_objet','L1.objet='.sql_quote('article')));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-documents.html','html_085aea6f1d96f979df9af18786791478','_documents_decompte',28,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_documents_decompte']['total'] = @intval(sql_count($result));
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (($t1 = strval((($Numrows['_documents_decompte']['total'] == '1') ? trim(recuperer_fond( 'modeles/emb' , array('id_document' => $Pile[$SP]['id_document'] ), array('compil'=>array('squelettes-dist/inc-documents.html','html_085aea6f1d96f979df9af18786791478','_documents_decompte',30,$GLOBALS['spip_lang'])), '')):'')))!=='' ?
		('
' . $t1) :
		'');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/inc-documents.html
// Temps de compilation total: 42.897 ms
//

function html_085aea6f1d96f979df9af18786791478($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(($t1 = BOUCLE_documents_portfoliohtml_085aea6f1d96f979df9af18786791478($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div id="documents_portfolio">
	<h2>' .
		_T('public/spip/ecrire:info_portfolio') .
		'</h2>
	') . $t1 . '
</div>
') :
		'') .
'


' .
BOUCLE_afficher_documenthtml_085aea6f1d96f979df9af18786791478($Cache, $Pile, $doublons, $Numrows, $SP) .
'



' .
(($t1 = BOUCLE_documents_decomptehtml_085aea6f1d96f979df9af18786791478($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'



' .
	(($t2 = BOUCLE_documents_jointshtml_085aea6f1d96f979df9af18786791478($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
	<div class="menu" id="documents_joints">
	<h2>' .
			_T('public/spip/ecrire:titre_documents_joints') .
			'</h2>
	<ul>
		') . $t2 . '
	</ul>
	</div>
') :
			'') .
	'

'))));

	return analyse_resultat_skel('html_085aea6f1d96f979df9af18786791478', $Cache, $page, 'squelettes-dist/inc-documents.html');
}
?>