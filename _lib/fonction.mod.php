<?php
function capture_reload(){
	global $cache;

	$link  = connec_inbox('capture');
	$mails  = imap_search($link,'UNSEEN',SE_UID);
	if(count($mails) > 1){
		foreach ($mails as $key=>$uid) {
			if(count(glob($cache.$uid.'.*')) < 2) { // si les fichiers n'existent pas
				$id = $key+1; //ratrapage key array / id inbox

				$header = imap_headerinfo($link, $id);
				print_r($header);
				$from = $header->from;
				$date_reception = $header->udate;
				$pjs = extract_attachments($link,$id);

				foreach($pjs as $pj_id => $pj) {
					if($pj['is_attachment']) {
						$filename =  imap_utf8($pj['filename']);
						$file = str_pad($date_reception.$from[0]->mailbox.'.'.extension($filename), 10, "0", STR_PAD_LEFT);
						file_updt($cache.$file,$pj['attachment']);
					}
				}
				// garde le sujet du mail et le nom du fichier
				@file_updt($cache.$file.'.txt',imap_utf8($header->subject));
				@file_updt($cache.$file.'.name',$filename.' from : '.imap_utf8($from[0]->personal));
			}
		}
	}
	imap_close($link);
	file_updt($cache.'updt.txt',time());
}


function profile_reload(){
	global $cache;
	$link  = connec_inbox('profil');
	$mails  = imap_search($link,'UNSEEN',SE_UID);
	if(count($mails) > 0){
		foreach ($mails as $key=>$uid) {
			$id = $key+1; //ratrapage key array / id inbox

			$header = imap_headerinfo($link, $id);
			$from = $header->from;

			$cache_user = $cache.$from[0]->mailbox.'/';

			if(!file_exists($cache_user)){
				mkdir($cache_user);
				//chmod($cache_user,777);
			}
			$pjs = extract_attachments($link,$id);
			foreach($pjs as $pj_id => $pj) {
				if($pj['is_attachment']) {
					$filename =  imap_utf8($pj['filename']);
					$file = str_pad($uid.'_'.$pj_id.'.'.extension($filename), 10, "0", STR_PAD_LEFT);
					@file_updt($cache_user.$file,$pj['attachment']);
					@file_updt($cache_user.$file.'.txt',imap_utf8($header->subject));
					@file_updt($cache_user.$file.'.name',$filename.' from : '.imap_utf8($from[0]->personal));
				}
			}
			// garde le sujet du mail et le nom du fichier
		}
	}
	imap_close($link);
	file_updt($cache.'updt.txt',time());
}