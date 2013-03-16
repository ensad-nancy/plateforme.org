<?
  include('function.php');
  
  $scan = glob("projets/*");
  //shuffle($scan);
  foreach ($scan as $key => $folder) {
    
    $icons = glob($folder."/icon*");
    $list .= '<li><a href="?pr='.$key.'"><img src="'.$icons[0].'"></a></li>';
    
  }
  $iframe = $scan[$_GET['pr']];
?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <title>par lot</title>
</head>
<body>
  
  <ul id="coverflow">
    <? echo $list?>
    <li id="titre">par lots</li>
  </ul>
  <iframe id="inc-projet" src="<? echo $iframe ?>" border="none"></iframe>
</body>
</html>