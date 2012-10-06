<?php
include('config.php');

function connec_inbox($compte,$boite="") {
	global $comptes;
	$server = '{imap.gmail.com:993/ssl/novalidate-cert}'.$boite;
	return $connection = imap_open($server, $comptes[$compte]['login'] , $comptes[$compte]['password']);}


// // // //

function extract_attachments($connection, $message_number) {
   
    $attachments = array();
    $structure = imap_fetchstructure($connection, $message_number);
   
    if(isset($structure->parts) && count($structure->parts)) {
   
        for($i = 0; $i < count($structure->parts); $i++) {
   
            $attachments[$i] = array(
                'is_attachment' => false,
                'filename' => '',
                'name' => '',
                'attachment' => ''
            );
           
            if($structure->parts[$i]->ifdparameters) {
                foreach($structure->parts[$i]->dparameters as $object) {
                    if(strtolower($object->attribute) == 'filename') {
                        $attachments[$i]['is_attachment'] = true;
                        $attachments[$i]['filename'] = $object->value;
                    }
                }
            }
           
            if($structure->parts[$i]->ifparameters) {
                foreach($structure->parts[$i]->parameters as $object) {
                    if(strtolower($object->attribute) == 'name') {
                        $attachments[$i]['is_attachment'] = true;
                        $attachments[$i]['name'] = $object->value;
                    }
                }
            }
           
            if($attachments[$i]['is_attachment']) {
                $attachments[$i]['attachment'] = imap_fetchbody($connection, $message_number, $i+1);
                if($structure->parts[$i]->encoding == 3) { // 3 = BASE64
                    $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                }
                elseif($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
                    $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                }
            }
           
        }
       
    }
   
    return $attachments;
   
}

function file_updt($file,$val){
	@unlink($file);
	$monfichier = fopen($file, 'w+');
	fputs($monfichier, $val);
	fclose($monfichier);
	return $file;
}
function readF($file) {
	$monfichier = fopen($file, "r+");
	return fgets($monfichier);
}
function extension($filename){
	return pathinfo($filename, PATHINFO_EXTENSION);
}
?>