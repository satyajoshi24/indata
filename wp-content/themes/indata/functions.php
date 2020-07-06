<?php


/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}




/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */


include __DIR__ . '/helper/helper.php';

class StarterSite extends Timber\Site {
	/** Add timber support. */
	function __construct() {
         $this->timber_routes();
		add_theme_support( 'menus' );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action('init', array($this, 'wpb_list_child_pages' ) );
		add_action( 'widgets_init', array($this,'indata_widgets_init' ) );
		add_action( 'init', array( $this, 'register_menus' ) );
		parent::__construct();

		
	}

	public function register_menus(){
		register_nav_menu( 'main-menu', __( 'Main', 'indata' ) );
		register_nav_menu( 'footer-menu', __( 'Footer Menu', 'indata' ) );
		register_nav_menu( 'footer-bottom', __( 'Footer Bottom Menu', 'indata' ) );
	}
	 



	 public static function setup()
	    {
	        add_theme_support('post-formats');
	        add_theme_support( 'post-thumbnails' );
	        add_theme_support('menus');
	        // add_theme_support('menus');
	       /* register_nav_menus(array(
	          'top' => __('Top Menu', 'indata'),
	          'main' => __('Main Menu', 'indata'),
	          'footer' => __('Footer Menu', 'indata'),
	          )
	        );*/
	    }


	/** This is where you can register custom post types. */
	public function register_post_types() {

		 
		/*$labels = array(
                "name" => __( 'Slider', '' ),
                "singular_name" => __( 'Slider', '' ),
                "add_new"           => __('Add New', ''),
                "add_new_item"      => __('Add New Slider', ''),
                "edit_item"         => __('Edit Slider', ''),
                "new_item"          => __('New Slider', ''),
                "all_items"         => __('All Slider', ''),
                "view_item"         => __('View Slider', ''),
                "search_item"       => __('Search Slider', ''),
                "not_found"         => __('No Slider Found', ''),
                "not_found_in_trash" => __('No Slider found in trash', ''),
                "menu_name"         => __('Slider', '')
                );

            $args = array(
                "label" => __( 'Slider', '' ),
                "labels" => $labels,
                "description" => "",
                "public" => true,
                "show_ui" => true,
                "show_in_menu" => true,
                "show_in_nav_menus" => true,
                "show_in_rest" => true,
                "rest_base" => "",
                "has_archive" => true,
                "show_in_menu" => true,
                "exclude_from_search" => false,
                "capability_type" => "post",
                "map_meta_cap" => true,
                "hierarchical" => false,
                "rewrite" => array( "slug" => "slider", "with_front" => true ),
                "query_var" => true,
                'supports' => array( 'title')
                                        
            );
            register_post_type( 'slider', $args ); 
*/


		 /*$labels = array(
            	"name" => __( 'Services', '' ),
                "singular_name" => __( 'Services', '' ),
                "add_new"           => __('Add New', ''),
                "add_new_item"      => __('Add New Services', ''),
                "edit_item"         => __('Edit Services', ''),
                "new_item"          => __('New Services', ''),
                "all_items"         => __('All Services', ''),
                "view_item"         => __('View Services', ''),
                "search_item"       => __('Search Services', ''),
                "not_found"         => __('No Services Found', ''),
                "not_found_in_trash" => __('No Services found in trash', ''),
                "menu_name"         => __('Services', ''),
                'featured_image'        => __( 'Featured Image', '' ),
            	'set_featured_image'    => __( 'Set featured image', '' ),
            	'remove_featured_image' => __( 'Remove featured image', '' ),
            	'use_featured_image'    => __( 'Use as featured image', '' ),
            	);

            $args = array(
                "label" => __( 'Services', '' ),
                "labels" => $labels,
                "description" => "",
                "public" => true,
                "show_ui" => true,
                "show_in_rest" => true,
                "rest_base" => "",
                "has_archive" => true,
                "show_in_menu" => true,
                "exclude_from_search" => false,
                "capability_type" => "post",
                "map_meta_cap" => true,
                "hierarchical" => false,
                "rewrite" => array( "slug" => "services", "with_front" => true ),
                "query_var" => true,
                'supports' => array( 'title','editor','thumbnail')
                                        
            );
            register_post_type('services', $args); */
            //add_post_type_support( 'services', 'thumbnail' );
            add_theme_support('post-thumbnails', array('page'));



	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['foo']   = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['add_info'] = get_field('additional_information', get_option('page_on_front'));
        $context['top_menu'] = new TimberMenu('main-menu');
        $context['footer_menu'] = new TimberMenu('footer-menu');
        $context['footer_bottom'] = new TimberMenu('footer-bottom');
		$context['site']  = $this;
		return $context;

		
	}
	


	public function theme_supports() {
		

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		// Add theme support for Featured Images
			add_theme_support('post-thumbnails', array(
			'post','page',
			));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/**
	 * Register our sidebars and widgetized areas.
	 *
	 */
	function indata_widgets_init() {

	    register_sidebar( array(
	        'name'          => 'Footer Widget',
	        'id'            => 'footer_widget',
	        'before_widget' => '<div>',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="rounded">',
	        'after_title'   => '</h2>',
	    ) );

	}
	



	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}


	public function timber_routes(){

          Routes::map('about-us', function($params){
            Routes::load('about.php', $params, $query);
    	});

          Routes::map('services', function($params){
            Routes::load('services.php', $params, $query);
    });
         /* Routes::map('blogs/:slug', function($params){
          	Routes::map('blog-single.php', $params, $query);
          });*/

        /* Routes::map('services/:slug', function($params){
            Routes::load('services-single.php', $params, $query);
        });*/

	}

}

new StarterSite();
