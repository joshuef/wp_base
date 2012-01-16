<?php /*
Plugin Name: CustomFunctionality Plugin
Description: A starter plugin 
Version: 0.1
License: GPL
Author: Josh Wilson
Author URI: http://www.wyli.co.uk
*/


// 
// add_action( 'init', 'register_cpt_menu_item' );
// 
// function register_cpt_menu_item() {
// 
//     $labels = array( 
//         'name' => _x( 'Menu Items', 'menu_item' ),
//         'singular_name' => _x( 'Menu Item', 'menu_item' ),
//         'add_new' => _x( 'Add New', 'menu_item' ),
//         'add_new_item' => _x( 'Add New Menu Item', 'menu_item' ),
//         'edit_item' => _x( 'Edit Menu Item', 'menu_item' ),
//         'new_item' => _x( 'New Menu Item', 'menu_item' ),
//         'view_item' => _x( 'View Menu Item', 'menu_item' ),
//         'search_items' => _x( 'Search Menu Items', 'menu_item' ),
//         'not_found' => _x( 'No menu items found', 'menu_item' ),
//         'not_found_in_trash' => _x( 'No menu items found in Trash', 'menu_item' ),
//         'parent_item_colon' => _x( 'Parent Menu Item:', 'menu_item' ),
//         'menu_name' => _x( 'Menu Items', 'menu_item' ),
//     );
// 
//     $args = array( 
//         'labels' => $labels,
//         'hierarchical' => false,
//         'description' => 'Something to add to the menu',
//         'supports' => array( 'title', 'editor','page-attributes', 'thumbnail', 'custom-fields' ),
//         'taxonomies' => array( 'category', 'post_tag' ),
//         'public' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'menu_position' => 20,
//         
//         'show_in_nav_menus' => true,
//         'publicly_queryable' => true,
//         'exclude_from_search' => false,
//         'has_archive' => true,
//         'query_var' => true,
//         'can_export' => true,
//         'rewrite' => true,
//         'capability_type' => 'post'
//     );
// 
//     register_post_type( 'menu_item', $args );
// }
// 





//______________________________________________________________________Custom Meta boxes

// To change: custom_meta, my_first_meta, $meta_box, display_html

// custom meta boxe
$prefix = 'custom_meta_'; // a custom prefix to help us avoid pulling data from the wrong meta box

$meta_box = array(
    'id' => 'my_first_meta_box', // the id of our meta box
    'title' => 'My First Meta Box', // the title of the meta box
    'page' => 'post', // display this meta box on post editing screens
    'context' => 'normal',
    'priority' => 'high', // keep it near the top
    'fields' => array( // all of the options inside of our meta box
        array(
            'name' => 'Sub Title',
            'desc' => 'Give this post a sub title?',
            'id' => $prefix . 'subtitle',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Additional Details',
            'desc' => 'Enter extra post details here',
            'id' => $prefix . 'add_details',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'Choose a Fruit',
            'id' => $prefix . 'fruit',
            'type' => 'select',
            'options' => array('Apples', 'Oranges', 'Pears', 'Pineapples')
        ),
		array(
			'name' => 'Check 1',
			'id' => $prefix . 'check1',
			'type' => 'checkbox',
		),
		array(
			'name' => 'Check 2',
			'id' => $prefix . 'check2',
			'type' => 'checkbox',
		),
		array(
			'name' => 'Check 3',
			'id' => $prefix . 'check3',
			'type' => 'checkbox',
		),
    )
);





// Add meta box to editor
function my_first_meta_add_box() {
    global $meta_box; // get all of the options from the $meta_box array

    add_meta_box($meta_box['id'], $meta_box['title'], 'display_html', $meta_box['page'], $meta_box['context'], $meta_box['priority']);

}
add_action('admin_menu', 'my_first_meta_add_box');






// Callback function to show fields in meta box
function display_html() {
    global $meta_box, $post; // get the variables from global $meta_box and $post

    // Use nonce for verification to check that the person has adequate priveleges
    echo '<input type="hidden" name="my_first_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	// create the table which the options will be displayed in
    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) { // do this for each array inside of the fields array
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>', // create a table row for each option
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {

            case 'text': // the HTML to display for type=text options
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '
', $field['desc'];
                break;     

            case 'textarea': // the HTML to display for type=textarea options
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="8" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '
', $field['desc'];
                break;

            case 'select': // the HTML to display for type=select options
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;

            case 'radio': // the HTML to display for type=radio options
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;

            case 'checkbox': // the HTML to display for type=checkbox options
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }

    echo '</table>';
}




// Save data from meta box
function my_first_meta_save_data($post_id) {
    global $meta_box;

    // verify nonce -- checks that the user has access
         if (!wp_verify_nonce($_POST['my_first_meta_box_nonce'], basename(__FILE__))) {
             return $post_id;
         }
      
       // check autosave
              if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                  return $post_id;
              }
           
              // check permissions
              if ('page' == $_POST['post_type']) {
                  if (!current_user_can('edit_page', $post_id)) {
                      return $post_id;
                  }
              } elseif (!current_user_can('edit_post', $post_id)) {
                  return $post_id;
              }

    foreach ($meta_box['fields'] as $field) { // save each option
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) { // compare changes to existing values
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
add_action('save_post', 'my_first_meta_save_data'); // save the data




include('error_handler.php');

?>