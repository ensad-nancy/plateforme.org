<?php
if (defined('_ECRIRE_INC_VERSION')) {
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/'.'cfg_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'spip-bonux/'.'spip_bonux_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'a2a/'.'a2a_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'compresseur/'.'compresseur_http.php')){ include_once $f;}
if (!function_exists('boutons_plugins')){function boutons_plugins(){return unserialize('a:0:{}');}}
if (!function_exists('onglets_plugins')){function onglets_plugins(){return unserialize('a:0:{}');}}
}
?>