<?php

namespace WPC;

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}


class Single_Post extends \Elementor\Widget_Base
{

  public function get_name()
  {
    return 'single-post';
  }


  public function get_title()
  {
    return 'Single Post';
  }


  public function get_icon()
  {
    return 'fa fa-grip-vertical';
  }

  public function get_categories()
  {
    return ['basic'];
  }

  protected function _register_controls() {

    $this->start_controls_section('post_selection', [
        'label' => 'Post Selection',
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT
    ]);

    $this->add_control('post', [
        'label' => 'Post',
        'type' => 'wpc-post-select',
    ]);

    $this->end_controls_section();
   

  }



  protected function render() {


    // echo 'yooooooo';

    $settings = $this->get_settings_for_display();

    if(isset($settings['post']) && is_numeric($settings['post'])){
        $post = get_post($settings['post']);
        echo '<h1>'.$post->post_title.'</h1>';

    }

  }

}
