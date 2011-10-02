<?php
include('config.php');

function connec_inbox($compte,$boite="") {
	global $comptes;
	$server = '{imap.gmail.com:993/ssl/novalidate-cert}'.$boite;
	return $connection = imap_open($server, $comptes[$compte]['login'] , $comptes[$compte]['password'] , OP_READONLY);}

?>