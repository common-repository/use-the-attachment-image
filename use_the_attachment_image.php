<?php
/*
Plugin Name: Use the Attachment Image!
Plugin URI: https://tomlany.net/code/
Description: Allows the first attachment image associated with a post to be used in different locations throughout a blog.
Author: Tom Lany
Version: 1.02
Author URI: https://tomlany.net/
License: GPLv2 or later
*/
//
//
// Attachment image function
function use_the_attachment_image($size='thumbnail')
{	if ( $images = get_children(array(
		'post_parent' => get_the_ID(),
		'post_status' => 'inherit',
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'order' => 'ASC',
		'orderby' => 'menu_order ID',
		'numberposts' => 1)))
	{	$permalink = get_permalink();
		foreach( $images as $image )
		{	echo '<a href="'.$permalink.'">';
			echo wp_get_attachment_image($image->ID, $size, false);
			echo '</a>';
		}
	}
	else {}
}
//
// Attachment image (without link) function
function use_the_attachment_image_nolink($size='thumbnail')
{	if ( $images = get_children(array(
		'post_parent' => get_the_ID(),
		'post_status' => 'inherit',
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'order' => 'ASC',
		'orderby' => 'menu_order ID',
		'numberposts' => 1)))
	{	$permalink = get_permalink();
		foreach( $images as $image )
		{ echo wp_get_attachment_image($image->ID, $size, false); }
	}
	else {}
}
//
?>