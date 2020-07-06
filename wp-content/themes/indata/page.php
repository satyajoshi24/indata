<?php
/**

 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context         = Timber::context();
$timber_post     = new TimberPost();
$context['posts'] = $timber_post;
//pr($timber_post,1);


	/* Check the last key from the url to make current page active in sidebar */
		$url = $_SERVER['REQUEST_URI'];
		$exp = explode('/', $url);
		$last_key = $exp[count($exp)-2];
		//pr($last_key,1);
		$context['last_key'] = $last_key;

	/* For Child pages link for side-nav */
		$last_key_link = $exp[count($exp)-3];
//pr($last_key_link,1);
	/* Get the parent post id  */
	$parent = wp_get_post_parent_id($post);
	//pr($parent,1);

	/* Get the child pages associated with the current parent page */
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

//pr($context['link'],1);


  /* Key Services Repeater Field for Services child pages */
  $key_services = get_field('key_services_toggle');
  $context['ksfeat'] = $key_services;

Timber::render(array('page.twig', '404.twig'), $context);