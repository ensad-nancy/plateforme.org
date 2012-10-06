<!DOCTYPE >

<html>
<head>
    <meta charset="utf-8">
    <title>Plateforme — ensa Nancy</title>
    <link rel="stylesheet" type="text/css" href="_lib/baseline.reset.css" />
    <link rel="stylesheet" type="text/css" href="_lib/platforme.css" />
    <script src="_lib/js/modernizr.custom.26096.js" type="text/javascript"></script>
    
    <script src="_lib/js/jquery.min.js"></script>
	<script src="_lib/js/jquery-ui.min.js"></script>
	
	<script>
  $(document).ready(function() {
    $("#draggable").draggable();
  });
  </script>
</head>

<body>
<nav id="draggable">
	<h1>le multimodal graphique - ensan</h1>&#8212;
	<ol>
		<li><a href="/">plateforme</a></li>
		<li><a href="?p=gratuit">objet gratuit</a></li>
		<li><a href="?p=nouvelleimage">nouvelle image</a></li>
		<li><a href="?p=erasmus2012">échanges 2012</a></li>
		<li><a href="?p=recherche">recherches</a></li>
		<li><a href="?p=profil">profil</a></li>
		<li><a href="?p=toucher-tracer">toucher/tracer</a></li>
		<li>manifeste</li>
	</ol>
</nav>

<?

	switch ($_GET['p']) {
    case "gratuit":
        include('pages/006.gratuit.php');
        break;
    case "erasmus2012":
        include('pages/005.echanges2012.php');break;
    case "recherche":
        include('pages/007.perso-recherche.php');
    break;
        
    case "profil":
        include('pages/008.profils.php');
    break;
    
    case "toucher-tracer":
        include('pages/009.toucher-tracer.php');
    break;
    case "nouvelleimage":
        echo '<iframe class="ext" src="pages/004.nouvelle-image.php"></iframe>';
        break;
        
        
    default:
    	include('pages/000.home.php');
	}

?>

</body>