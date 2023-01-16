
<?php

// configurações

// remove pagina pai
function remove_post_custom_fields() {
	remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
}

// remove admin bar
add_filter('show_admin_bar', '__return_false');

// menu
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
	register_nav_menu( 'primary', __( 'header', 'header' ) );
}



//configurações de pagina

// adiciona excerpt
add_post_type_support( 'page', 'excerpt' );



//configurações de post

//adiciona thumbnails
add_theme_support( 'post-thumbnails' );

// adiciona excerpt
add_post_type_support( 'post', 'excerpt' );


// PAGINA DE OPÇÕES
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
	  'page_title'  => 'Configurações Gerais',
	  'menu_title'  => 'Configurações Gerais',
	  'menu_slug'   => 'configuracoes-gerais',
	  'capability'  => 'edit_posts',
	  'redirect'    => true
	));

	acf_add_options_sub_page(array(
	  'page_title'  => 'Geral',
	  'menu_title'  => 'Geral',
	  'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
	  'page_title'  => 'Redes Sociais',
	  'menu_title'  => 'Redes Sociais',
	  'parent_slug' => 'configuracoes-gerais',
	));
}




/*
** location
*/
add_action( 'init', 'post_type_location' );
function post_type_location() {

	$labels = array(
	    'name' => _x('Location', 'post type general name'),
	    'singular_name' => _x('Location', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Location'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Location'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'location',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-location',
	    'menu_position' => 2,
	    'supports' => array('title')
	  );

    register_post_type( 'location', $args );
}



/*
** Services
*/
add_action( 'init', 'post_type_services' );
function post_type_services() {

	$labels = array(
	    'name' => _x('Services', 'post type general name'),
	    'singular_name' => _x('Services', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Services'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Services & Solutions'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'services',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-businessperson',
	    'menu_position' => 2,
	    'supports' => array('title','thumbnail','excerpt','editor')
	  );

    register_post_type( 'services', $args );
}



/*
** remove itens do admin
*/
if(wp_get_current_user()->user_login == 'ederton'){
	$producao = false;
}else{
	$producao = true;
}

if($producao){
	add_action('admin_head', 'remove_itens_admin');

	function remove_itens_admin() {
	  echo '
		<script type="text/javascript">
			jQuery.noConflict();
			jQuery("document").ready(function(){

				// menu
				jQuery("#menu-appearance").remove(); //aparencias
				jQuery("#menu-comments").remove(); //comentários
				jQuery("#menu-plugins").remove(); //plugins
				jQuery("#toplevel_page_edit-post_type-acf-field-group").remove(); //ACF
				jQuery("#menu-settings").remove(); //configurações
				jQuery("#menu-tools").remove(); //ferramentas
				jQuery("#menu-media").remove(); //midias

				// usuario master
				jQuery("#user-1").remove();

				// qr code
				jQuery("#wpkqcg-page-meta-box-qrcodemetabox h2").html("QR Code");
				jQuery("#wpkqcg-page-meta-box-qrcodemetabox .form-table tr:nth-child(6)").remove();
				jQuery("#wpkqcg-page-meta-box-qrcodemetabox .form-table tr:nth-child(5)").remove();
				jQuery("#wpkqcg-page-meta-box-qrcodemetabox .form-table tr:nth-child(3)").remove();
				jQuery("#wpkqcg-page-meta-box-qrcodemetabox .form-table tr:nth-child(2)").remove();
				jQuery("#wpkqcg-page-meta-box-qrcodemetabox .form-table tr:nth-child(1)").remove();

			});
		</script>
	  ';
	}
}
?>