<?php

/*
 * Squelette : squelettes-dist/404.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Tue, 06 Dec 2011 15:02:36 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/404.html
// Temps de compilation total: 3.701 ms
//

function html_3869e5bf714b77410592a7b645d368b0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . concat('HTTP/1.0 ',interdire_scripts(entites_html(sinon(@$Pile[0]['code'],'404 Not Found'),true))) . '"); ?'.'>' .
'<'.'?php header("' . 'Cache-Control: no-store, no-cache, must-revalidate' . '"); ?'.'>' .
'<'.'?php header("' . 'Pragma: no-cache' . '"); ?'.'><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
_T('public/spip/ecrire:pass_erreur') .
' ' .
(($t1 = strval(interdire_scripts(entites_html(sinon(@$Pile[0]['status'],'404'),true))))!=='' ?
		($t1 . ' ') :
		'') .
'- ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/404.html\',\'html_3869e5bf714b77410592a7b645d368b0\',\'\',8,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
<meta name="robots" content="none" />
</head>
<body class="page_404">
	<div id="page">

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-entete') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/404.html\',\'html_3869e5bf714b77410592a7b645d368b0\',\'\',15,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	<div id="conteneur">
    <div id="contenu">

        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site') .
'</a> &gt; <strong class="on">' .
_T('public/spip/ecrire:pass_erreur') .
' ' .
interdire_scripts(entites_html(sinon(@$Pile[0]['status'],'404'),true)) .
'</strong></div>

        <div class="cartouche">
        <h1>' .
_T('public/spip/ecrire:pass_erreur') .
' ' .
interdire_scripts(entites_html(sinon(@$Pile[0]['status'],'404'),true)) .
'</h1>
        </div>
        ' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['erreur']),true))))!=='' ?
		('<div class="chapo"><p>' . $t1 . '</p></div>') :
		'') .
'

	</div><!--#contenu-->
	</div><!--#conteneur-->

    
    <div id="navigation">

        
        ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-rubriques') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/404.html\',\'html_3869e5bf714b77410592a7b645d368b0\',\'\',35,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('squelettes-dist/404.html','html_3869e5bf714b77410592a7b645d368b0','',37,$GLOBALS['spip_lang'])) .
'

    </div><!--#navigation-->
	
	
	<div id="extra">
	&nbsp;
	</div><!--#extra-->

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-pied') . ', array(\'skel\' => ' . argumenter_squelette('squelettes-dist/404.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/404.html\',\'html_3869e5bf714b77410592a7b645d368b0\',\'\',47,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	</div><!--#page-->
</body>
</html>
');

	return analyse_resultat_skel('html_3869e5bf714b77410592a7b645d368b0', $Cache, $page, 'squelettes-dist/404.html');
}
?>