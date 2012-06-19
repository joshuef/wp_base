=== Semi Private Attachments ===
Author: William Lindley
Author URI: http://www.saltriversystems.com/
Contributors: wlindley
Donate link: http://www.saltriversystems.com/website/private-attachments
Tags: private, disable, attachments, gallery, thumbnail, thumbnails, autonav
Requires at least: 3.0
Tested up to: 3.1
Stable tag: trunk

Permits attachments (images, etc.) to be changed to Private status.

== Description ==

Problem: You are writing about your upcoming new product, and you have
all the images uploaded -- but, wait! You don't want people to see all
the detail pictures until the formal release. And you don't want to
try and remember to attach the images this post later -- you're
already here. You'd like to have the images attached, but disabled.

Problem: Or you have a page showing the current fashions.  You need to
remove one image for a style that's no longer available, and add a new
one -- but you don't want to delete the old one... it will be back in
stock in a month. You would like to have that image remain attached,
but disabled.

Why It's Frustrating: WordPress Attachments are really just
Posts... but their potential for full capabilities still falls short
in Version 3.2. It would be nice to set an attachment for future
posting, to be able to tag attachments or put them in taxonomies --
but all that will have to wait until some future version.

[Partial] Solution: Fortunately, WordPress 3.0 started supporting the
post_status of 'private' for attachments. Sort of -- the FAQ. This
plugin simply adds a check-box to the media editing dialog that
permits you to change an attachment from the usual post status
("inherit") to "private". That will prevent it from appearing in
WordPress's built-in gallery shortcode, and in AutoNav. Your theme
templates or other plugins may need to be updated to respect
attachments with the "private" post_status.

See Further Actions in the FAQ.

== Screenshots ==

1. Media editing window with plugin installed.

== Installation ==

This section describes how to install the plugin and get it working.

1. Create the private-attachments directory in the
   /wp-content/plugins/ directory, and place the plugin files there.
2. Activate the plugin through the administration menus in Wordpress.
3. Configure the plugin under Settings in the Wordpress administration
   menu.

== Frequently Asked Questions ==

= How do I prevent the attachments from being displayed at all? =

An attachment with 'private' status will not be displayed by the
gallery shortcode, nor by my AutoNav plugin:

    http://wordpress.org/extend/plugins/autonav/

However, the standard Media edit dialog is missing any way to set an
attachment to 'private'. Furthermore, the automatically-generated
"attachment page" with a URL like http://www.example.com/?p=57 will
disregard the post status and still display the attachment -- you can
change the attachment.php file in your theme to prevent this; see also
the Private Files plugin:

    http://wordpress.org/extend/plugins/private-files/

= How does it work? =

WordPress starting with version 3.0 gave us the hooks
attachment_fields_to_edit and attachment_fields_to_save; this plugin
inserts itself in that chain, retrieving the post's status and calling
wp_update_post to save it.

== Changelog ==

= 1.0 =
* Initial version on wordpress.org
