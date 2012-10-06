<?php
if (defined('_ECRIRE_INC_VERSION')) {
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/'.'cfg_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'filtres_images/'.'images_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/'.'inc/barre_outils.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'spip-bonux/'.'public/spip_bonux_criteres.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'spip-bonux/'.'public/spip_bonux_balises.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'spip-bonux/'.'spip_bonux_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'spip-bonux/'.'configurer/pipelines.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'a2a/'.'a2a_fonctions.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'compresseur/'.'filtres/compresseur.php')){ include_once $f;}
}
?>