<?
  include('function.php');
  
  $scan = glob("projets/*");
  foreach ($scan as $key => $folder) {
    $list .= '<li>
      <a href="?pr='.$key.'"><img width="64" src="'.$folder.'/icon.png" alt="'.cleanfoldername($folder).'"></a>
    </li>';
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
    <? echo $list.$list.$list.$list.$list ?>
    <li id="titre">par lots</li>
  </ul>
  <iframe id="inc-projet" src="<? echo $iframe ?>" border="none"></iframe>
</body>
</html>