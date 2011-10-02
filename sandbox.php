<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $mod ?></title>
    <link rel="stylesheet" type="text/css" href="lib/baseline.reset.css" />
    <link rel="stylesheet" type="text/css" href="lib/mwr.css" />
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
include('lib/fonction.php');
$login = "capture@plateforme.org";
$password = "QGWa7!!N*";



$login = "sandbox@plateforme.org";
$password = "eeug3T&*";


$server = '{imap.gmail.com:993/ssl/novalidate-cert}';
$connection = imap_open($server.'[Gmail]/Chats', $login, $password, OP_READONLY);

$emails = imap_search($connection,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {
  
  /* begin output var */
  $output = '';
  

  
  /* for every email... */
  foreach($emails as $email_number) {
    
    /* get information specific to this email */
    $overview = imap_fetch_overview($connection,$email_number,0);
    $message = imap_fetchbody($connection,$email_number,2);
    
    /* output the email header information */
   /* $output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
    $output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
    $output.= '<span class="from">'.$overview[0]->from.'</span>';
    $output.= '<span class="date">on '.$overview[0]->date.'</span>';
    $output.= '</div>';
    
    /* output the email body */
    $output.= '<div class="body">'.$message.'</div><hr>';
  }
  
  echo $output;
} 

/* close the connection */
imap_close($connection);

?>
</body>