<?php
/**
	Template Name: Home Page

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

	/* Retriving data from Services pages with it's child pages */
	$services = Timber::get_posts(array(

				'post_type'			=> 'page',
				'name'				=> 'services'
			));


	foreach ($services as $serv) {
		
		$parent_id = $serv->id;
		$children = get_pages(array(
			'post_type'			=> 'page',
			'child_of'		=> $parent_id,
			'order'				=> 'ASC',
			'posts_per_page'	=> -1
		)
	);
	
	$context['service'] = $children;
	}
	

   /* Clients Repeater Field from Homepage */
  $client = get_field('clients');
  $context['clt'] = $client;

	//pr($context['clt'],1);

		/* Retriving data from why choose page to home page */
		$why_choose_us	= Timber::get_posts(array(
			'post_type'			=> 'page',
			'name'				=> 'why-choose-us'
		));

		/* Loop to get the pahe id and retrive the repeater field data in that page */
		 foreach($why_choose_us as $whycu){
		 	$features = get_field('key_features', $whycu->id);
		 	$excerpt = get_field('excerpt', $whycu->id);
		 	$featured_image = get_field('featured_image', $whycu->id);
		 }

		 
		 $context['add_info'] = get_field('additional_information');

		$context['serv'] = $services;
		$context['wcu'] = $why_choose_us;	
		$context['exce'] = $excerpt;
		$feature_split = array_chunk($features, 3); //pr($feature_split,1);
		$context['wcu_feat'] = $feature_split;
		$context['feat_img'] = $featured_image;

		
	/* Homepage Slider Repeater field */

	$slider = get_field('homepage_slider'); //pr($slider,1);
	$context['hslider'] = $slider;

	
	

Timber::render(array('home.twig', '404.twig'), $context );
