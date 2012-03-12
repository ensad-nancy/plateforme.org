<?php
include('../_lib/fonction.php');
include('../_lib/fonction.mod.php');

if(isset($_GET['u']))$user = $_GET['u'];
$cache   = '../media/cache/profil/';
$profils  = glob($cache.'*/');


if(filemtime($cache) < time()-(60*10)) @profile_reload();


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

    body { background-image: url(<?php //echo $background ?>);}
    </style>

</head>

<body class="profil">
<?php

if(isset($user)){
	$cache_user = $cache.$user.'/';
	$files_user  = glob($cache_user.'*.name');
	echo "<h1>$user</h1>";

	foreach($files_user as $file) {
		$name_file = str_replace('.name','',$file);
		echo '<a href="'.$name_file.'"><img src="'.$name_file.'" width="25%"></a>';

	}


}else{
	foreach($profils as $profil) {
		if(is_dir($profil)){
			$cache_user = explode('/',$profil);
			echo '<li><a href="?u='.$cache_user[4].'">'.$cache_user[4].'</a></li>';}
	}
}
?>
</body>
</html>