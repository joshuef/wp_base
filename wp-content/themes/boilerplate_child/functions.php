<?php

//_____________________________________________ remove header version number insertion
remove_action('wp_header', 'wp_generator');


if (!function_exists('is_page_or_ancestor')) 
{
  function is_page_or_ancestor($page = '') 
  { 
    global $post, $wpdb;
    
    // If is not numeric get page ID
  	if ( !is_numeric( $page ) ) 
  	{
      $page = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$page' AND post_type = 'page'");
  	}
    
    // Recursive search through page hierarchy
    if ( is_page( $page ) || ( is_array( $post->ancestors ) && in_array( $page, $post->ancestors ) ) ) 
    {
      return true;
    }
    return false;
  }
}


function post_slugged() {
global $post;
$title = sanitize_title($post->post_title);
echo $title;
}




//____________________________limit words

function limit_words($string, $word_limit) {
 
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
 
	$words = explode(' ', $string);
 
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
 
	$and_so = implode(' ', array_slice($words, 0, $word_limit));
 	echo $and_so;
}



?>