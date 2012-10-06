<?php
if (defined('_ECRIRE_INC_VERSION')) {
// Pipeline accueil_encours 
function execute_pipeline_accueil_encours(&$val){
return $val;
}

// Pipeline accueil_gadgets 
function execute_pipeline_accueil_gadgets(&$val){
return $val;
}

// Pipeline accueil_informations 
function execute_pipeline_accueil_informations(&$val){
return $val;
}

// Pipeline affichage_final 
function execute_pipeline_affichage_final(&$val){
$val = minipipe('f_surligne', $val);
$val = minipipe('f_tidy', $val);
$val = minipipe('f_admin', $val);
return $val;
}

// Pipeline affichage_entetes_final 
function execute_pipeline_affichage_entetes_final(&$val){
return $val;
}

// Pipeline afficher_fiche_objet 
function execute_pipeline_afficher_fiche_objet(&$val){
return $val;
}

// Pipeline afficher_config_objet 
function execute_pipeline_afficher_config_objet(&$val){
return $val;
}

// Pipeline afficher_contenu_objet 
function execute_pipeline_afficher_contenu_objet(&$val){
return $val;
}

// Pipeline afficher_nombre_objets_associes_a 
function execute_pipeline_afficher_nombre_objets_associes_a(&$val){
return $val;
}

// Pipeline affiche_droite 
function execute_pipeline_affiche_droite(&$val){
return $val;
}

// Pipeline affiche_gauche 
function execute_pipeline_affiche_gauche(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/cfg_pipeline.php')){include_once($f);}
$val = minipipe('cfg_affiche_gauche', $val);
return $val;
}

// Pipeline affiche_milieu 
function execute_pipeline_affiche_milieu(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'msie_compat/msie_compat.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/porte_plume_pipelines.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'a2a/a2a_pipelines.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'compresseur/compresseur_pipeline.php')){include_once($f);}
$val = minipipe('msie_compat_affiche_milieu', $val);
$val = minipipe('porte_plume_affiche_milieu', $val);
$val = minipipe('a2a_affiche_milieu', $val);
$val = minipipe('compresseur_affiche_milieu', $val);
return $val;
}

// Pipeline affiche_enfants 
function execute_pipeline_affiche_enfants(&$val){
return $val;
}

// Pipeline affiche_hierarchie 
function execute_pipeline_affiche_hierarchie(&$val){
return $val;
}

// Pipeline affiche_formulaire_login 
function execute_pipeline_affiche_formulaire_login(&$val){
$val = minipipe('auth_formulaire_login', $val);
return $val;
}

// Pipeline afficher_revision_objet 
function execute_pipeline_afficher_revision_objet(&$val){
return $val;
}

// Pipeline alertes_auteur 
function execute_pipeline_alertes_auteur(&$val){
return $val;
}

// Pipeline base_admin_repair 
function execute_pipeline_base_admin_repair(&$val){
return $val;
}

// Pipeline boite_infos 
function execute_pipeline_boite_infos(&$val){
$val = minipipe('f_boite_infos', $val);
return $val;
}

// Pipeline ajouter_boutons 
function execute_pipeline_ajouter_boutons(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/cfg_pipeline.php')){include_once($f);}
$val = minipipe('cfg_ajouter_boutons', $val);
return $val;
}

// Pipeline ajouter_onglets 
function execute_pipeline_ajouter_onglets(&$val){
return $val;
}

// Pipeline body_prive 
function execute_pipeline_body_prive(&$val){
return $val;
}

// Pipeline configurer_liste_metas 
function execute_pipeline_configurer_liste_metas(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'msie_compat/msie_compat.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/porte_plume_pipelines.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'compresseur/compresseur_pipeline.php')){include_once($f);}
$val = minipipe('msie_compat_configurer_liste_metas', $val);
$val = minipipe('porte_plume_configurer_liste_metas', $val);
$val = minipipe('compresseur_configurer_liste_metas', $val);
return $val;
}

// Pipeline compter_contributions_auteur 
function execute_pipeline_compter_contributions_auteur(&$val){
return $val;
}

// Pipeline declarer_tables_interfaces 
function execute_pipeline_declarer_tables_interfaces(&$val){
return $val;
}

// Pipeline declarer_tables_principales 
function execute_pipeline_declarer_tables_principales(&$val){
return $val;
}

// Pipeline declarer_tables_auxiliaires 
function execute_pipeline_declarer_tables_auxiliaires(&$val){
return $val;
}

// Pipeline declarer_tables_objets_surnoms 
function execute_pipeline_declarer_tables_objets_surnoms(&$val){
return $val;
}

// Pipeline declarer_type_surnoms 
function execute_pipeline_declarer_type_surnoms(&$val){
return $val;
}

// Pipeline declarer_url_objets 
function execute_pipeline_declarer_url_objets(&$val){
return $val;
}

// Pipeline definir_session 
function execute_pipeline_definir_session(&$val){
return $val;
}

// Pipeline delete_tables 
function execute_pipeline_delete_tables(&$val){
return $val;
}

// Pipeline delete_statistiques 
function execute_pipeline_delete_statistiques(&$val){
return $val;
}

// Pipeline exec_init 
function execute_pipeline_exec_init(&$val){
return $val;
}

// Pipeline formulaire_charger 
function execute_pipeline_formulaire_charger(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/cfg_pipeline.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'spip-bonux/configurer/pipelines.php')){include_once($f);}
$val = minipipe('cfg_formulaire_charger', $val);
$val = minipipe('spip_bonux_formulaire_charger', $val);
return $val;
}

// Pipeline formulaire_verifier 
function execute_pipeline_formulaire_verifier(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/cfg_pipeline.php')){include_once($f);}
$val = minipipe('cfg_formulaire_verifier', $val);
return $val;
}

// Pipeline formulaire_traiter 
function execute_pipeline_formulaire_traiter(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/cfg_pipeline.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'spip-bonux/configurer/pipelines.php')){include_once($f);}
$val = minipipe('cfg_formulaire_traiter', $val);
$val = minipipe('spip_bonux_formulaire_traiter', $val);
return $val;
}

// Pipeline formulaire_admin 
function execute_pipeline_formulaire_admin(&$val){
return $val;
}

// Pipeline header_prive 
function execute_pipeline_header_prive(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/cfg_pipeline.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/porte_plume_pipelines.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'compresseur/compresseur_pipeline.php')){include_once($f);}
$val = minipipe('f_jQuery', $val);
$val = minipipe('cfg_header_prive', $val);
$val = minipipe('porte_plume_insert_head_prive', $val);
$val = minipipe('compresseur_header_prive', $val);
return $val;
}

// Pipeline insert_head 
function execute_pipeline_insert_head(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/cfg_pipeline.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'msie_compat/msie_compat.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/porte_plume_pipelines.php')){include_once($f);}
$val = minipipe('f_jQuery', $val);
$val = minipipe('cfg_insert_head', $val);
$val = minipipe('msie_compat_insert_head', $val);
$val = minipipe('porte_plume_insert_head_public', $val);
return $val;
}

// Pipeline insert_head_css 
function execute_pipeline_insert_head_css(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/cfg_pipeline.php')){include_once($f);}
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/porte_plume_pipelines.php')){include_once($f);}
$val = minipipe('cfg_insert_head_css', $val);
$val = minipipe('porte_plume_insert_head_css', $val);
return $val;
}

// Pipeline jquery_plugins 
function execute_pipeline_jquery_plugins(&$val){
return $val;
}

// Pipeline lister_tables_noerase 
function execute_pipeline_lister_tables_noerase(&$val){
return $val;
}

// Pipeline lister_tables_noexport 
function execute_pipeline_lister_tables_noexport(&$val){
return $val;
}

// Pipeline lister_tables_noimport 
function execute_pipeline_lister_tables_noimport(&$val){
return $val;
}

// Pipeline libelle_association_mots 
function execute_pipeline_libelle_association_mots(&$val){
return $val;
}

// Pipeline mots_indexation 
function execute_pipeline_mots_indexation(&$val){
return $val;
}

// Pipeline nettoyer_raccourcis_typo 
function execute_pipeline_nettoyer_raccourcis_typo(&$val){
return $val;
}

// Pipeline objet_compte_enfants 
function execute_pipeline_objet_compte_enfants(&$val){
return $val;
}

// Pipeline optimiser_base_disparus 
function execute_pipeline_optimiser_base_disparus(&$val){
return $val;
}

// Pipeline page_indisponible 
function execute_pipeline_page_indisponible(&$val){
return $val;
}

// Pipeline pre_boucle 
function execute_pipeline_pre_boucle(&$val){
return $val;
}

// Pipeline post_boucle 
function execute_pipeline_post_boucle(&$val){
return $val;
}

// Pipeline post_image_filtrer 
function execute_pipeline_post_image_filtrer(&$val){
return $val;
}

// Pipeline pre_propre 
function execute_pipeline_pre_propre(&$val){
$val = minipipe('traiter_poesie', $val);
$val = minipipe('traiter_retours_chariots', $val);
return $val;
}

// Pipeline pre_liens 
function execute_pipeline_pre_liens(&$val){
$val = minipipe('traiter_raccourci_liens', $val);
$val = minipipe('traiter_raccourci_glossaire', $val);
$val = minipipe('traiter_raccourci_ancre', $val);
return $val;
}

// Pipeline post_propre 
function execute_pipeline_post_propre(&$val){
return $val;
}

// Pipeline pre_typo 
function execute_pipeline_pre_typo(&$val){
return $val;
}

// Pipeline post_typo 
function execute_pipeline_post_typo(&$val){
$val = minipipe('quote_amp', $val);
return $val;
}

// Pipeline pre_edition 
function execute_pipeline_pre_edition(&$val){
$val = minipipe('premiere_revision', $val);
return $val;
}

// Pipeline post_edition 
function execute_pipeline_post_edition(&$val){
$val = minipipe('nouvelle_revision', $val);
return $val;
}

// Pipeline pre_insertion 
function execute_pipeline_pre_insertion(&$val){
return $val;
}

// Pipeline post_insertion 
function execute_pipeline_post_insertion(&$val){
return $val;
}

// Pipeline pre_syndication 
function execute_pipeline_pre_syndication(&$val){
return $val;
}

// Pipeline post_syndication 
function execute_pipeline_post_syndication(&$val){
return $val;
}

// Pipeline pre_indexation 
function execute_pipeline_pre_indexation(&$val){
return $val;
}

// Pipeline requete_dico 
function execute_pipeline_requete_dico(&$val){
return $val;
}

// Pipeline rubrique_encours 
function execute_pipeline_rubrique_encours(&$val){
return $val;
}

// Pipeline agenda_rendu_evenement 
function execute_pipeline_agenda_rendu_evenement(&$val){
return $val;
}

// Pipeline taches_generales_cron 
function execute_pipeline_taches_generales_cron(&$val){
return $val;
}

// Pipeline calculer_rubriques 
function execute_pipeline_calculer_rubriques(&$val){
return $val;
}

// Pipeline autoriser 
function execute_pipeline_autoriser(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/porte_plume_pipelines.php')){include_once($f);}
$val = minipipe('porte_plume_autoriser', $val);
return $val;
}

// Pipeline notifications 
function execute_pipeline_notifications(&$val){
return $val;
}

// Pipeline notifications_envoyer_mails 
function execute_pipeline_notifications_envoyer_mails(&$val){
return $val;
}

// Pipeline editer_contenu_objet 
function execute_pipeline_editer_contenu_objet(&$val){
return $val;
}

// Pipeline arbo_creer_chaine_url 
function execute_pipeline_arbo_creer_chaine_url(&$val){
$val = minipipe('urls_arbo_creer_chaine_url', $val);
return $val;
}

// Pipeline propres_creer_chaine_url 
function execute_pipeline_propres_creer_chaine_url(&$val){
$val = minipipe('urls_propres_creer_chaine_url', $val);
return $val;
}

// Pipeline rechercher_liste_des_champs 
function execute_pipeline_rechercher_liste_des_champs(&$val){
return $val;
}

// Pipeline rechercher_liste_des_jointures 
function execute_pipeline_rechercher_liste_des_jointures(&$val){
return $val;
}

// Pipeline recuperer_fond 
function execute_pipeline_recuperer_fond(&$val){
return $val;
}

// Pipeline styliser 
function execute_pipeline_styliser(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'vertebres/vertebres_pipelines.php')){include_once($f);}
$val = minipipe('vertebres_styliser', $val);
$val = minipipe('styliser_par_rubrique', $val);
$val = minipipe('styliser_par_langue', $val);
return $val;
}

// Pipeline trig_calculer_prochain_postdate 
function execute_pipeline_trig_calculer_prochain_postdate(&$val){
return $val;
}

// Pipeline trig_calculer_langues_rubriques 
function execute_pipeline_trig_calculer_langues_rubriques(&$val){
return $val;
}

// Pipeline trig_propager_les_secteurs 
function execute_pipeline_trig_propager_les_secteurs(&$val){
return $val;
}

// Pipeline trig_supprimer_objets_lies 
function execute_pipeline_trig_supprimer_objets_lies(&$val){
return $val;
}

// Pipeline cfg_post_edition 
function execute_pipeline_cfg_post_edition(&$val){
return $val;
}

// Pipeline editer_contenu_formulaire_cfg 
function execute_pipeline_editer_contenu_formulaire_cfg(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'cfg/cfg_pipeline.php')){include_once($f);}
$val = minipipe('cfg_editer_contenu_formulaire_cfg', $val);
return $val;
}

// Pipeline porte_plume_barre_pre_charger 
function execute_pipeline_porte_plume_barre_pre_charger(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/porte_plume_pipelines.php')){include_once($f);}
$val = minipipe('porte_plume_porte_plume_barre_pre_charger', $val);
return $val;
}

// Pipeline porte_plume_barre_charger 
function execute_pipeline_porte_plume_barre_charger(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/porte_plume_pipelines.php')){include_once($f);}
$val = minipipe('porte_plume_porte_plume_barre_charger', $val);
return $val;
}

// Pipeline porte_plume_lien_classe_vers_icone 
function execute_pipeline_porte_plume_lien_classe_vers_icone(&$val){
if (file_exists($f=_ROOT_EXTENSIONS.'porte_plume/porte_plume_pipelines.php')){include_once($f);}
$val = minipipe('porte_plume_porte_plume_lien_classe_vers_icone', $val);
return $val;
}

// Pipeline notifications_destinataires 
function execute_pipeline_notifications_destinataires(&$val){
return $val;
}

}
?>