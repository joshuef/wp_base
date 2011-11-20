<?php

// ====================================
// = Enque JS =
// ====================================

function enqueue_global_js () {
wp_enqueue_script( 'global', get_stylesheet_directory_uri() . '/js/grill_global.js', array('jquery'), '0.2', false);
} 


function enqueue_fullbg_js () {
wp_enqueue_script( 'fullbg', get_stylesheet_directory_uri() . '/js/fullbg.js', array('jquery'), '1', false);
} // End viewporter_js()

// =================
// = Get Page Slug =
// =================


function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}


// ====================
// = Get page by slug =
// ====================

function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}





?>