<?php

namespace WPC;

class Post_Select extends \Elementor\Base_Control {

    public function get_type() {
        return 'wpc-post-select';
    }

    public function enqueue()
    {
        wp_register_script( 'wpc_post_select', get_stylesheet_directory_uri() . '/custom_controls/post_select.js', ['jquery'], '1.0.0', true );
        wp_enqueue_script( 'wpc_post_select' );
    }

    public function content_template() {

        ?>

            <div>

                <label class="elementor-control-title">{{{ data.label }}}</label>

                <select class="post-select" style="width:100%"></select>

                <input type="hidden" class="post-select-save-value" data-setting="{{ data.name }}" />
            
            </div>

        <?php

    }

}
