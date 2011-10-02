<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="../lib/baseline.reset.css" />
</head>
<style type="text/css">

body, html {
    margin: 0;
}
body {
    padding: 10%;
    font-size: 1.2em;
    font-family: Geneva;
}
h1{font-weight: bold; font-size: 1.5em;}

</style>
<body>
<h1>sandbox@</h1>
<hr>
<?php
include('../lib/fonction.php');

$connection = connec_inbox('sandbox','[Gmail]/Chats');

$emails = imap_search($connection,'ALL');

if($emails) {
   $output = '';
  foreach($emails as $email_number) {
    
    $overview = imap_fetch_overview($connection,$email_number,0);
    $message = imap_fetchbody($connection,$email_number,2);
    $output.= '<div class="body">'.$message.'</div><hr>';
  }
  
  echo $output;
} 

imap_close($connection);

?>
</body>