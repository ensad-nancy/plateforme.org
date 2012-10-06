<?php

/*
 * Squelette : squelettes-dist/inc-forum.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Mon, 05 Dec 2011 15:01:50 GMT
 * Boucles :   _decompte, _doc, _doc2, _forums_boucle, _forums_fils, _forums
 */ 

/* BOUCLE forums  */

 function BOUCLE_decomptehtml_ab565b9466c321dade757df8c8ba6791(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['id_rubrique']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = ($Pile[0]['id_article']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = ($Pile[0]['id_breve']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = ($Pile[0]['id_syndic']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	static $table = 'forum';
	static $id = '_decompte';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), (!(is_array($Pile[0]['id_rubrique'])?count($Pile[0]['id_rubrique']):strlen($Pile[0]['id_rubrique'])) ? '' : ((is_array($Pile[0]['id_rubrique'])) ? sql_in('forum.id_rubrique',sql_quote($in)) : 
			array('=', 'forum.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')))), (!(is_array($Pile[0]['id_article'])?count($Pile[0]['id_article']):strlen($Pile[0]['id_article'])) ? '' : ((is_array($Pile[0]['id_article'])) ? sql_in('forum.id_article',sql_quote($in1)) : 
			array('=', 'forum.id_article', sql_quote($Pile[0]['id_article'],'','int')))), (!(is_array($Pile[0]['id_breve'])?count($Pile[0]['id_breve']):strlen($Pile[0]['id_breve'])) ? '' : ((is_array($Pile[0]['id_breve'])) ? sql_in('forum.id_breve',sql_quote($in2)) : 
			array('=', 'forum.id_breve', sql_quote($Pile[0]['id_breve'],'','int')))), (!(is_array($Pile[0]['id_syndic'])?count($Pile[0]['id_syndic']):strlen($Pile[0]['id_syndic'])) ? '' : ((is_array($Pile[0]['id_syndic'])) ? sql_in('forum.id_syndic',sql_quote($in3)) : 
			array('=', 'forum.id_syndic', sql_quote($Pile[0]['id_syndic'],'','int')))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-forum.html','html_ab565b9466c321dade757df8c8ba6791','_decompte',6,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_decompte']['total'] = @intval(array_shift(sql_fetch($result)));
	$SP++;
	// RESULTATS
	
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_dochtml_ab565b9466c321dade757df8c8ba6791(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_doc';
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
	static $select = array("documents.extension",
		"documents.id_document");
	static $orderby = array();
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_forum'])), 
			array('=', 'L1.objet', sql_quote('forum')));
	static $join = array('L1' => array('documents','id_document'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-forum.html','html_ab565b9466c321dade757df8c8ba6791','_doc',27,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
				' .
interdire_scripts((match($Pile[$SP]['extension'],'^(gif|jpg|png)$') ? (	filtrer('image_graver',filtrer('image_reduire',
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/emb', array('lang' => $GLOBALS["spip_lang"] ,'id_document'=>$Pile[$SP]['id_document'],'id'=>$Pile[$SP]['id_document'],'recurs'=>(++$recurs)), array('compil'=>array('squelettes-dist/inc-forum.html','html_ab565b9466c321dade757df8c8ba6791','_doc',29,$GLOBALS['spip_lang']), 'trim'=>true), ''))
,'300')) .
	'
				'):(	quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '', 0, 0, '') .
	'
				'))) .
'
				');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_doc2html_ab565b9466c321dade757df8c8ba6791(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_doc2';
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
	static $select = array("documents.extension",
		"documents.id_document");
	static $orderby = array();
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_forum'])), 
			array('=', 'L1.objet', sql_quote('forum')));
	static $join = array('L1' => array('documents','id_document'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-forum.html','html_ab565b9466c321dade757df8c8ba6791','_doc2',54,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
				' .
interdire_scripts((match($Pile[$SP]['extension'],'^(gif|jpg|png)$') ? (	filtrer('image_graver',filtrer('image_reduire',
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/emb', array('lang' => $GLOBALS["spip_lang"] ,'id_document'=>$Pile[$SP]['id_document'],'id'=>$Pile[$SP]['id_document'],'recurs'=>(++$recurs)), array('compil'=>array('squelettes-dist/inc-forum.html','html_ab565b9466c321dade757df8c8ba6791','_doc2',56,$GLOBALS['spip_lang']), 'trim'=>true), ''))
,'300')) .
	'
				'):(	quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '', 0, 0, '') .
	'
				'))) .
'
				');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE boucle  */

 function BOUCLE_forums_bouclehtml_ab565b9466c321dade757df8c8ba6791(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_forums_fils']);
	$t0 = (($t1 = BOUCLE_forums_filshtml_ab565b9466c321dade757df8c8ba6791($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
		<ul>
			' . $t1 . '
		</ul>
		') :
		'');
	$Numrows['_forums_fils'] = ($save_numrows);
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forums_filshtml_ab565b9466c321dade757df8c8ba6791(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums_fils';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic");
	static $orderby = array('forum.date_heure');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', sql_quote($Pile[$SP]['id_forum'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-forum.html','html_ab565b9466c321dade757df8c8ba6791','_forums_fils',39,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:par_auteur');
	$l2 = _T('public/spip/ecrire:voir_en_ligne');
	$l3 = _T('public/spip/ecrire:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'

			<li>
				<div class="forum-message">
					<div class="forum-chapo">
						<strong class="forum-titre"><a href="#forum' .
$Pile[$SP]['id_forum'] .
'" name="forum' .
$Pile[$SP]['id_forum'] .
'" id="forum' .
$Pile[$SP]['id_forum'] .
'">' .
interdire_scripts(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a></strong>
						<small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(heures(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('&nbsp;' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(minutes(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(':' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(couper(typo($Pile[$SP]['nom'], "TYPO", $connect),'80'))))!=='' ?
		((	', ' .
	$l1 .
	' <span class="">') . $t1 . '</span>') :
		'') .
'</small>
					</div>
					<div class="forum-texte">
						' .
interdire_scripts(lignes_longues(safehtml(propre(post_autobr($Pile[$SP]['texte']), $connect)))) .
'
						' .
(($t1 = strval(interdire_scripts(lignes_longues(safehtml(safehtml(propre(calculer_notes(), $connect)))))))!=='' ?
		('<div class="notes surlignable">' . $t1 . '</div>') :
		'') .
'
						' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		((	'<p class="hyperlien">' .
	$l2 .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts(((($a = safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) OR (!is_array($a) AND strlen($a))) ? $a : couper(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect))),'80'))) .
	'</a></p>')) :
		'') .
'

				' .
BOUCLE_doc2html_ab565b9466c321dade757df8c8ba6791($Cache, $Pile, $doublons, $Numrows, $SP) .
'


						' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(substr(((!$Pile[$SP]['id_article']) ? '' : ('&id_article='.$Pile[$SP]['id_article'])).
((!$Pile[$SP]['id_breve']) ? '' : ('&id_breve='.$Pile[$SP]['id_breve'])).
((!$Pile[$SP]['id_rubrique']) ? '' : ('&id_rubrique='.$Pile[$SP]['id_rubrique'])).
((!$Pile[$SP]['id_syndic']) ? '' : ('&id_syndic='.$Pile[$SP]['id_syndic'])).
((!$Pile[$SP]['id_forum']) ? '' : ('&id_forum='.$Pile[$SP]['id_forum'])),1).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<p class="repondre"><a href="' . $t1 . (	'" rel="noindex nofollow">' .
	$l3 .
	'</a></p>')) :
		'') .
'
					</div>
				</div>

				' .
BOUCLE_forums_bouclehtml_ab565b9466c321dade757df8c8ba6791($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			</li>

			');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forumshtml_ab565b9466c321dade757df8c8ba6791(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['id_rubrique']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	$in1 = array();
	if (!(is_array($a = ($Pile[0]['id_article']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = ($Pile[0]['id_breve']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = ($Pile[0]['id_syndic']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	static $table = 'forum';
	static $id = '_forums';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic");
	static $orderby = array('forum.date_heure');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', 0), (!(is_array($Pile[0]['id_rubrique'])?count($Pile[0]['id_rubrique']):strlen($Pile[0]['id_rubrique'])) ? '' : ((is_array($Pile[0]['id_rubrique'])) ? sql_in('forum.id_rubrique',sql_quote($in)) : 
			array('=', 'forum.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')))), (!(is_array($Pile[0]['id_article'])?count($Pile[0]['id_article']):strlen($Pile[0]['id_article'])) ? '' : ((is_array($Pile[0]['id_article'])) ? sql_in('forum.id_article',sql_quote($in1)) : 
			array('=', 'forum.id_article', sql_quote($Pile[0]['id_article'],'','int')))), (!(is_array($Pile[0]['id_breve'])?count($Pile[0]['id_breve']):strlen($Pile[0]['id_breve'])) ? '' : ((is_array($Pile[0]['id_breve'])) ? sql_in('forum.id_breve',sql_quote($in2)) : 
			array('=', 'forum.id_breve', sql_quote($Pile[0]['id_breve'],'','int')))), (!(is_array($Pile[0]['id_syndic'])?count($Pile[0]['id_syndic']):strlen($Pile[0]['id_syndic'])) ? '' : ((is_array($Pile[0]['id_syndic'])) ? sql_in('forum.id_syndic',sql_quote($in3)) : 
			array('=', 'forum.id_syndic', sql_quote($Pile[0]['id_syndic'],'','int')))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/inc-forum.html','html_ab565b9466c321dade757df8c8ba6791','_forums',10,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:par_auteur');
	$l2 = _T('public/spip/ecrire:voir_en_ligne');
	$l3 = _T('public/spip/ecrire:repondre_message');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'

	<li class="forum-fil">

		<div class="forum-message">
			<div class="forum-chapo">
				<strong class="forum-titre"><a href="#forum' .
$Pile[$SP]['id_forum'] .
'" name="forum' .
$Pile[$SP]['id_forum'] .
'" id="forum' .
$Pile[$SP]['id_forum'] .
'">' .
interdire_scripts(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a></strong>
				<small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(heures(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('&nbsp;' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(minutes(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(':' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(couper(typo($Pile[$SP]['nom'], "TYPO", $connect),'80'))))!=='' ?
		((	', ' .
	$l1 .
	' <span class="">') . $t1 . '</span>') :
		'') .
'</small>
			</div>
			<div class="forum-texte">
				' .
interdire_scripts(lignes_longues(safehtml(propre(post_autobr($Pile[$SP]['texte']), $connect)))) .
'
				' .
(($t1 = strval(interdire_scripts(lignes_longues(safehtml(safehtml(propre(calculer_notes(), $connect)))))))!=='' ?
		('<div class="notes surlignable">' . $t1 . '</div>') :
		'') .
'
				' .
(($t1 = strval(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))))!=='' ?
		((	'<p class="hyperlien">' .
	$l2 .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts(((($a = safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) OR (!is_array($a) AND strlen($a))) ? $a : couper(safehtml(vider_url(calculer_url($Pile[$SP]['url_site'],'','url', $connect))),'80'))) .
	'</a></p>')) :
		'') .
'

				' .
BOUCLE_dochtml_ab565b9466c321dade757df8c8ba6791($Cache, $Pile, $doublons, $Numrows, $SP) .
'

				' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(substr(((!$Pile[$SP]['id_article']) ? '' : ('&id_article='.$Pile[$SP]['id_article'])).
((!$Pile[$SP]['id_breve']) ? '' : ('&id_breve='.$Pile[$SP]['id_breve'])).
((!$Pile[$SP]['id_rubrique']) ? '' : ('&id_rubrique='.$Pile[$SP]['id_rubrique'])).
((!$Pile[$SP]['id_syndic']) ? '' : ('&id_syndic='.$Pile[$SP]['id_syndic'])).
((!$Pile[$SP]['id_forum']) ? '' : ('&id_forum='.$Pile[$SP]['id_forum'])),1).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<p class="repondre"><a href="' . $t1 . (	'" rel="noindex nofollow">' .
	$l3 .
	'</a></p>')) :
		'') .
'
			</div>
		</div>

		' .
(($t1 = BOUCLE_forums_filshtml_ab565b9466c321dade757df8c8ba6791($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
		<ul>
			' . $t1 . '
		</ul>
		') :
		'') .
'

	</li>
	');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/inc-forum.html
// Temps de compilation total: 11.167 ms
//

function html_ab565b9466c321dade757df8c8ba6791($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum(@$Pile[0]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum(@$Pile[0]['id_article']) == ""))
		? "" : // sinon:
		(substr(((!@$Pile[0]['id_article']) ? '' : ('&id_article='.@$Pile[0]['id_article'])).
((!@$Pile[0]['id_breve']) ? '' : ('&id_breve='.@$Pile[0]['id_breve'])).
((!@$Pile[0]['id_rubrique']) ? '' : ('&id_rubrique='.@$Pile[0]['id_rubrique'])).
((!@$Pile[0]['id_syndic']) ? '' : ('&id_syndic='.@$Pile[0]['id_syndic'])).
((!@$Pile[0]['id_forum']) ? '' : ('&id_forum='.@$Pile[0]['id_forum'])),1).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))) ? '':'') .
'


' .
BOUCLE_decomptehtml_ab565b9466c321dade757df8c8ba6791($Cache, $Pile, $doublons, $Numrows, $SP)
. (($t2 = strval((($Numrows['_decompte']['total'] > '0') ? $Numrows['_decompte']['total']:'')))!=='' ?
			('<h2>' . $t2 . (	'
' .
		(($Numrows['_decompte']['total'] == '1') ? _T('public/spip/ecrire:message'):_T('public/spip/ecrire:messages_forum')) .
		'</h2>')) :
			'') .
'


' .
(($t1 = BOUCLE_forumshtml_ab565b9466c321dade757df8c8ba6791($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
<ul class="forum">

	' . $t1 . '

</ul>
') :
		'') .
'
');

	return analyse_resultat_skel('html_ab565b9466c321dade757df8c8ba6791', $Cache, $page, 'squelettes-dist/inc-forum.html');
}
?>