<?php

/*
 * Squelette : squelettes-dist/formulaires/recherche.html
 * Date :      Mon, 05 Dec 2011 10:08:57 GMT
 * Compile :   Mon, 05 Dec 2011 15:01:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/formulaires/recherche.html
// Temps de compilation total: 0.606 ms
//

function html_3f21567892824ca74d105e484c8aa256($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_recherche" id="formulaire_recherche">
<form action="' .
interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
'" method="get"><div>
	' .
interdire_scripts(form_hidden(entites_html((@$Pile[0]['action']),true))) .
'
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['lang']),true))))!=='' ?
		('<input type="hidden" name="lang" value="' . $t1 . '" />') :
		'') .
'
	<label for="recherche">' .
_T('public/spip/ecrire:info_rechercher_02') .
'</label>
	<input type="text" class="text" size="10" name="recherche" id="recherche"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['recherche']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' accesskey="4" /><input type="submit" class="submit" value="&gt;&gt;" title="' .
_T('public/spip/ecrire:info_rechercher') .
'" />
</div></form>
</div>
');

	return analyse_resultat_skel('html_3f21567892824ca74d105e484c8aa256', $Cache, $page, 'squelettes-dist/formulaires/recherche.html');
}
?>