<?php
include('../lib/fonction.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="../lib/baseline.reset.css" />
    <link rel="stylesheet" type="text/css" href="../lib/platforme.css" />
</head>

<body>
<?php

$connection = connec_inbox('capture');
$emails = imap_search($connection,'ALL');
$count = imap_num_msg($connection);

for($i = 1; $i <= $count; $i++) {
	$header = imap_headerinfo($connection, $i);
	echo '<div class="carton"><h1>'.$header->subject.'</h1></div>';
	$raw_body = imap_body($connection, $i);

	$attachements = extract_attachments($connection, $header->Msgno);
	foreach($attachements as $key => $attachement) {

		if($attachement['is_attachment']) {
			$file = str_replace(' ','',$header->Msgno).'.png';
			if (!file_exists($file)) file_updt($file,$attachement['attachment']);
			echo '<img src="'.$file.'">';
		}
	}
}


/*if($emails) {
   $output = '';
  foreach($emails as $email_number) {

    $overview = imap_fetch_overview($connection,$email_number,0);
    $message = imap_fetchbody($connection,$email_number,2);
    $output.= '<div class="body">'.$message.'</div><hr>';
    $attachements = extract_attachments($connection, $email_number);

   	foreach($attachements as $key => $attachement) {
   		if($attachement['is_attachment']) file_updt($key.'.png',$attachement['attachment']);
   	}
  }
} */
?>
<div class="carton">
<?php

//echo "<h1><a href='$file'>$file</a></h1>";?>

</div>
</body>
</html>
