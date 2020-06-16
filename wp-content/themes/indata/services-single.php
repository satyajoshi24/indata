<?php
/**
	Template Name: Services Single Page

 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context         = Timber::context();
$timber_post     = Timber::query_post();
$context['posts'] = $timber_post;
pr($timber_post,1);
$parent = wp_get_post_parent_id($post);
//pr($parent,1);

$children = get_posts(array(
		'post_type'			=> 'page',
		'post_parent'		=> $parent,
		'order'				=> 'ASC',
		'posts_per_page'	=> -1
	));
//pr($children,1);
// $children = get_pages( array( 'child_of' => $p->ID ));

   if ( is_page() && ($parent || count( $children ) > 0  )) {
	
   		$context['pages'] = $children;

	   }
//pr($context['pages'],1);

Timber::render(array('services-single.twig', '404.twig'), $context);
