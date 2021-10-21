<?php
 
  function jf_scripts() {
    // Desregistra o jQuery do Wordpress
    wp_deregister_script('jquery');

    // Carrega folha de stylo
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_style( 'slickcss', get_template_directory_uri() . '/assets/css/slick.css' );
    
    // Registrar outros scripts
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', [], '3.6', true ); 
    wp_register_script('slickjs', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'),'1.6', true); 
    wp_register_script('elevatezoomjs', get_template_directory_uri() . '/assets/js/jquery.elevatezoom.min.js', array('jquery'), '3.0.8', true); 

    // Script main
    wp_register_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), false , true );
  
    // Carrega o Script
    wp_enqueue_script( 'fontawesome' );	
    wp_enqueue_script( 'main' ); 
    wp_enqueue_script( 'slickjs' ); 
    wp_enqueue_script( 'elevatezoomjs' ); 
    
  }
  add_action( 'wp_enqueue_scripts', 'jf_scripts' );
  
  // Funções para Limpar o Header
  function my_function_admin_bar(){
    return false;
    }
    add_filter( 'show_admin_bar' , 'my_function_admin_bar');

  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'start_post_rel_link', 10, 0 );
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');

  // Habilitar Menus
  add_theme_support('menus');

  // Registrar Menu
  function register_my_menu() {
    register_nav_menu('menu-header',__( 'Menu Header' ));
    register_nav_menu('menu-footer',__( 'Menu Footer' ));
  }
  add_action( 'init', 'register_my_menu' );
  
  //Adiciona suporte a Post Thumbnails no Tema
  add_theme_support( 'post-thumbnails' );
  

  // Custom Images Sizes
  function my_custom_sizes() {
    add_image_size('posthome', 1400, 500, true);
  }
  add_action('after_setup_theme', 'my_custom_sizes');

  // Resumo
  function get_excerpt(){
    $excerpt = get_the_content();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 80);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt;
  }


  // Paginação
  function minha_paginacao() {
    global $wp_query;
    
    echo paginate_links( array(
        'base' => str_replace( 9999999999999, '%#%', esc_url( get_pagenum_link( 9999999999999 ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var( 'paged' ) ),
        'total' => $wp_query->max_num_pages,
        'type' => 'list',
        'prev_next' => true,
        'prev_text' => '<i class="fas fa-chevron-left"></i>',
        'next_text' => '<i class="fas fa-chevron-right"></i>',
        'before_page_number' => '',
        'after_page_number' => '',
        'show_all' => false,
        'mid_size' => 3,
        'end_size' => 1,
    ) );
  }

  function minha_paginacao_busca( $query ) {
    if ( $query->is_search() ) {
    $query->set( 'posts_per_page', '2' );
    }

    if ( $query->is_category() ) {
      $query->set( 'posts_per_page', '1' );
      }
 
    }
    

// Custom Post Type

function custom_post_type_produtos() {
	register_post_type('produtos', array(
		'label' => 'produtos',
		'description' => 'produtos',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'produtos', 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor', 'page-attributes','post-formats'),

		'labels' => array (
			'name' => 'produtos',
			'singular_name' => 'produtos',
			'menu_name' => 'produtos',
			'add_new' => 'Adicionar Novo',
			'add_new_item' => 'Adicionar Nova produto',
			'edit' => 'Editar',
			'edit_item' => 'Editar produto',
			'new_item' => 'Novo produto',
			'view' => 'Ver produto',
			'view_item' => 'Ver produto',
			'search_items' => 'Procurar produto',
			'not_found' => 'Nenhum Produto Encontrado',
			'not_found_in_trash' => 'Nenhuma produto Encontrado na Lixeira',
    ),
    // 'public' => true,
    //     'show_ui' => true,
    //     'supports' => array( 'title', 'editor', 'thumbnail' ), 
    //     'taxonomies' => array('category'),

	));
}
add_action('init', 'custom_post_type_produtos');

// Custom Post Type Taxonomia
function taxonomia_produtos(){
    $custom_tax_produtos = 'categoria-produto';
    $custom_post_type_produtos = 'produtos';
    $args = array(
        'label' => __('Categoria da produto'),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'categoria')
    );
    register_taxonomy( $custom_tax_produtos, $custom_post_type_produtos, $args );
}
add_action( 'init', 'taxonomia_produtos' );

?>