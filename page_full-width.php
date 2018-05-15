<?php
/**
 * Template Name: Full Width Page
 */

get_header();
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
genesis();

 get_footer(); ?>
