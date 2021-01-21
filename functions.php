<?php 
add_action( 'elementor/controls/controls_registered', function() {

	require_once get_stylesheet_directory() . '/custom_controls/post_select.php';
	\Elementor\Plugin::instance()->controls_manager->register_control('wpc-post-select', new \WPC\Post_Select);

});


add_action( 'elementor/widgets/widgets_registered', function() {

	require_once get_stylesheet_directory() . '/custom_components/single_post.php';
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \WPC\Single_Post() );

} );


add_action('wp_ajax_get_posts', function() {
   
	$posts = get_posts();

    $response = [];
    foreach($posts as $post){
        $response[] = [
            "id" => $post->ID,
			"text" => $post->post_title,
        ];
    }

    wp_send_json($response);

});