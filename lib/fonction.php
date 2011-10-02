<?php
$start = ereg_replace("0(.[0-9]+) ([0-9]+)","\\2\\1",microtime());

//include('bdd.php');

set_time_limit(0);
@ignore_user_abort(true);

//date_default_timezone_set ("Europe/Paris");

//....................................................................
				// TRAITEMENT DONNÉES
//....................................................................
function decodeur($txt){
	list($txt_decode) = imap_mime_header_decode($txt);
	return $txt_decode->text;
}
function anonyme($txt){
	$txt  = str_replace('@gmail.com', '@',$txt );
	return substr_replace($txt, ' * ',3, 2);
}
//....................................................................
				// 
//....................................................................
function updateUser ($name,$h,$d){
		mysql_query('
		UPDATE  `MWR_user` SET
		d_'.$d.' =  d_'.$d.'+1,
		h_'.$h.' =  h_'.$h.'+1 
		WHERE `name` LIKE "'.$name.'";
		');
		if(!mysql_affected_rows()) mysql_query('
		INSERT INTO `MWR_user` (`id` ,`name` ,`d_'.$d.'` ,`h_'.$h.'`)
		VALUES (NULL ,  "'.$name.'", "1", "1");');
}


//....................................................................
				// DIVERS 
//....................................................................
function convert_sec ($time) {
	$output = '';
	$tab = array ('j' => '86400', 'h' => '3600', 'm' => '60', 's' => '1');
	foreach ($tab as $key => $value) {
		$compteur = 0;
		while ($time > ($value-1)) {
			$time = $time - $value;
			$compteur++;
		}
		if ($compteur != 0) {
			$output .= $compteur.''.$key;
			if ($value != 1) $output .= ' ';
		}
	}
	return $output;
}
//....................................................................

function timeLauched ($start){ //temps d'execution du script
	$end = time();
	$tempgen = round(($end - $start), 2);
	return convert_sec($tempgen);
}

function minuit($now){
return mktime(23,59,59,date('n',$now),date('j',$now),date('Y',$now));
}
?>