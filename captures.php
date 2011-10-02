<?php
include('lib/fonction.php');

$capt = glob('src/*.png');
$nb =  count($capt)-1;
$file = $capt[rand(0,$nb)];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $mod ?></title>
    <link rel="stylesheet" type="text/css" href="lib/baseline.reset.css" />
    <link rel="stylesheet" type="text/css" href="lib/platforme.css" />
</head>

<body>
<?php echo '<img src="'.$file.'">'; ?>
<div class="carton">
<?php 

echo "<h1><a href='$file'>$file</a></h1>";?>

</div>
</body>
</html>
