<?php
/**
	Template Name: About Us

 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}
$context = Timber::get_context();
$post = Timber::query_post();
$context['posts'] = $post;

	/* To get data from Repeater Field */

	$key_features = get_field('about_us');
	$context['kfeat'] = $key_features;
	

	/* Split an array into array chunk with size element */
	/*$lists = array_chunk($key_features, 3);
	$context['list'] = $lists;*/

	/* Our Teams Repeater Field */
	$leadership = get_field('our_leadership');
	$context['ldship'] = $leadership;


	//pr($context['kfeat'],1);


Timber::render(array('about.twig', '404.twig'), $context );