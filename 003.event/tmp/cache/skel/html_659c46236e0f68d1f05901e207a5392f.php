<?php

/*
 * Squelette : sommaire.html
 * Date :      Tue, 06 Dec 2011 13:35:12 GMT
 * Compile :   Tue, 06 Dec 2011 13:37:04 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette sommaire.html
// Temps de compilation total: 1.509 ms
//

function html_659c46236e0f68d1f05901e207a5392f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 3600"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(textebrut(couper(propre($GLOBALS['meta']['descriptif_site'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'sommaire.html\',\'html_659c46236e0f68d1f05901e207a5392f\',\'\',7,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>

<body class="page_sommaire">
<div id="page">
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-entete') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'sommaire.html\',\'html_659c46236e0f68d1f05901e207a5392f\',\'\',12,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	<div class="hfeed" id="conteneur">
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-barrehaute') . ', array(\'skel\' => ' . argumenter_squelette('sommaire.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'sommaire.html\',\'html_659c46236e0f68d1f05901e207a5392f\',\'\',15,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	
	<div id="contenu">
		<div class="cartouche invisible">
			<h1 class="invisible">' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</h1>
		</div>
	</div><!--#contenu-->
	</div><!--#conteneur-->
	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-pied') . ', array(\'skel\' => ' . argumenter_squelette('sommaire.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'sommaire.html\',\'html_659c46236e0f68d1f05901e207a5392f\',\'\',24,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	
</div><!--#page-->
</body>
</html>
');

	return analyse_resultat_skel('html_659c46236e0f68d1f05901e207a5392f', $Cache, $page, 'sommaire.html');
}
?>