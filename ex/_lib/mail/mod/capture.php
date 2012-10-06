<?php
include('../_lib/fonction.php');
include('../_lib/fonction.mod.php');

if(isset($_GET['c'])){ $i = $_GET['c']; }else{$i = 0;}

$cache  	= '../media/cache/capture/';
$captures 	= glob($cache.'*.*.txt');

rsort($captures);

$image =  str_replace('.txt','',$captures[$i]);
$background = $image;


$legende 	= '<h1>'.readF($captures[$i]).'</h1><small>&#11015; <a href="'.$image.'">'.readF($image.'.name').'</a></small>';

$i_suiv = ($i+1)%(count($captures));

if(filemtime($cache) < time()-(60*10)) capture_reload();
if(isset($_GET['reload'])) capture_reload();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="../_lib/baseline.reset.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/platforme.css" />
    <style type="text/css">
	
    body { background-image: url(<?php echo $background ?>);}
    </style>
    
</head>

<body class="capture">
<a class="bouton" href="?c=<?php echo $i_suiv ?>">&nbsp;</a>
<div class="carton"><?php echo $legende ?></div>
</body>
</html>
