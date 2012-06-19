<?php
/*
Plugin Name: Semi Private Attachments
Plugin URI: http://www.saltriversystems.com/website/private-attachments
Description: Permits attachments (images, etc.) to be changed to Private status.
Author: William Lindley
Version: 1.0
Author URI: http://www.saltriversystems.com/
*/

/*  Copyright 2008-2011 William Lindley (email : bill -at- saltriversystems -dot- com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function srcs_spa_attachment_fields_to_edit($form_fields, $post) {  
  $form_fields["attachenable"] = array(  
				  "label" => __("Attachment enabled"),  
				  "input" => "html",
				  "html" => 
"<input type='checkbox' name='attachments[{$post->ID}][attachenable]' 
value='inherit' " . checked('inherit', $post->post_status, false) .' />');
  $form_fields["commentenable"] = array(  
				  "label" => __("Allow Comments"),  
				  "input" => "html",
				  "html" => 
"<input type='checkbox' name='attachments[{$post->ID}][commentenable]' 
value='inherit' " . checked('open', $post->comment_status, false) .' />');
  $form_fields["pingenable"] = array(  
				  "label" => __("Allow Pings"),
				  "input" => "html",
				  "html" => 
"<input type='checkbox' name='attachments[{$post->ID}][pingenable]' 
value='inherit' " . checked('open', $post->ping_status, false) .' />');
  return $form_fields;  
}  

add_filter("attachment_fields_to_edit", "srcs_spa_attachment_fields_to_edit", null, 2);  

function srcs_spa_attachment_fields_to_save($post, $attachment) {  
  $post['post_status'] = $attachment['attachenable'];
  if ($post['post_status'] != 'inherit') { $post['post_status'] = 'private'; }
  $post['ping_status'] = $attachment['pingenable'];
  if ($post['ping_status'] != 'open') { $post['comment_status'] = 'closed'; }
  $post['comment_status'] = $attachment['commentenable'];
  if ($post['comment_status'] != 'open') { $post['comment_status'] = 'closed'; }
  wp_update_post(array('ID' => $post['ID'], 
		       'post_status' => $post['post_status'],
		       'ping_status' => $post['ping_status'],
		       'comment_status' => $post['comment_status']
		       ));
  return $post;  
}  

add_filter('attachment_fields_to_save', 'srcs_spa_attachment_fields_to_save', null, 2);
?>