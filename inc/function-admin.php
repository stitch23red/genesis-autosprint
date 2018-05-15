<?php
//Custom Admin page
function wizzit_add_admin_page() {
  add_menu_page( 'WizzIT Theme Options', 'WizzIT Options', 'manage_options', 'wizzit_admin', 'wizzit_generate_admin_page','dashicons-forms',59);
                //Page Title, Sidebar Title, User Access Level, Page Slug, Call Function, Icon URL, Menu List Position
  add_submenu_page ('wizzit_admin', 'WizzIT Theme Options', 'Settings', 'manage_options', 'wizzit_admin', 'wizzit_generate_admin_page');
                //Create default submenu item in top position
}

add_action('admin_menu','wizzit_add_admin_page');

function wizzit_generate_admin_page() {
  require_once( get_stylesheet_directory() . '/inc/templates/wizzit_admin.php');
}
