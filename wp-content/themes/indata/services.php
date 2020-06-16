<?php
/**
	Template Name: Services

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
$context['posts'] = $post;


$children = get_pages(array(
		'post_type'			=> 'page',
		'child_of'		=> $post->ID,
		'order'				=> 'ASC',
		'posts_per_page'	=> -1
	));
//pr($children,1);
// $children = get_pages( array( 'child_of' => $p->ID ));

   if ( is_page() && ($post->post_parent || count( $children ) > 0  )) {
	
   		$context['pages'] = $children;

	   }
	// }
//pr($context['pages'],1);

Timber::render(array('services.twig', '404.twig'), $context );