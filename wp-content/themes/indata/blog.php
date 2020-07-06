<?php
/**
	Template Name: Blogs

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
$post = new TimberPost();
$context['pagin']	=	$post ? Timber::get_pagination() : null;
//pr($context['pagin'],1);
$context['posts'] = $post;
/*$args = array(
	'post_type'=> 'post',
	'orderby'    => 'ID',
	'post_status' => 'publish',
	'order'    => 'DESC',
	'posts_per_page' => -1 
	);*/

$blogs = Timber::get_posts(array(
	'post_type'=>'post',
	'orderby'    => 'ID',
	'order'    => 'DESC',
	'posts_per_page' => -1
));


$context['blogs'] = $blogs;

//pr($blogs,1);
Timber::render(array('blog.twig', '404.twig'), $context );