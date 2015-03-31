<?php
/*
Plugin Name: Quae Map
Description: Quae Map allows You to add Google Map as a sidebar widget or anywhere else on Your site
Version: 1.0
Author: quaelibet
Author URI: https://profiles.wordpress.org/quaelibet
Plugin URI: 
License: GPL2
License URI: http://opensource.org/licenses/GPL2
Text Domain: quae_map
Domain Path: /lang/

Copyright 2015 quaelibet

*/
if(!defined('ABSPATH')) { die(); }

$plugin_url = WP_PLUGIN_URL . '/quae_map';
$options = array();
$textDomain = 'quae_map';

function quae_map_load_textdomain() {
  global $textDomain;

  load_plugin_textdomain( $textDomain, false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}
add_action('plugins_loaded', 'quae_map_load_textdomain');

class Quae_Map_Widget extends WP_Widget {

  function quae_map_widget() {
    // Instantiate the parent object
    parent::__construct( false, 'Quae Map Widget' );
  }

  function widget( $args, $instance ) {
    // Widget output
    extract( $args );

    $title = apply_filters( 'widget_title', $instance['title'] );
    $address = $instance['address'];
    $latlon = $instance['latlon'];
    $zoom = $instance['zoom'];
    $zoomControl = ($instance['zoomControl'] == 1) ? 1 : 0;
    $mapTypeControl = ($instance['mapTypeControl'] == 1) ? 1 : 0;
    $scaleControl = ($instance['scaleControl'] == 1) ? 1 : 0;
    $streetViewControl = ($instance['streetViewControl'] == 1) ? 1 : 0;
    $bounce = ($instance['bounce'] == 1) ? 1 : 0;
    $infoWindow = ($instance['infoWindow'] == 1) ? 1 : 0;
    $infoWindowTitle = $instance['infoWindowTitle'];

    require('inc/widget-frontend.php');
  }

  function update( $new_instance, $old_instance ) {
    // Save widget options
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['address'] = strip_tags($new_instance['address']);
    $instance['latlon'] = strip_tags($new_instance['latlon']);
    $instance['zoom'] = strip_tags($new_instance['zoom']);
    $instance['zoomControl'] = strip_tags($new_instance['zoomControl']);
    $instance['mapTypeControl'] = strip_tags($new_instance['mapTypeControl']);
    $instance['scaleControl'] = strip_tags($new_instance['scaleControl']);
    $instance['streetViewControl'] = strip_tags($new_instance['streetViewControl']);
    $instance['bounce'] = strip_tags($new_instance['bounce']);
    $instance['infoWindow'] = strip_tags($new_instance['infoWindow']);
    $instance['infoWindowTitle'] = strip_tags($new_instance['infoWindowTitle']);

    return $instance;
  }

  function form( $instance ) {
    global $textDomain;

    // Output admin widget options form
    $title = (isset($instance['title'])) ? esc_attr($instance['title']) : '';
    $address = (isset($instance['address'])) ? esc_attr($instance['address']) : '';
    $latlon = (isset($instance['latlon'])) ? esc_attr($instance['latlon']) : '';
    $zoom = (isset($instance['zoom'])) ? esc_attr($instance['zoom']) : '12';
    $zoomControl = (isset($instance['zoomControl'])) ? esc_attr($instance['zoomControl']) : false;
    $mapTypeControl = (isset($instance['mapTypeControl'])) ? esc_attr($instance['mapTypeControl']) : true;
    $scaleControl = (isset($instance['scaleControl'])) ? esc_attr($instance['scaleControl']) : true;
    $streetViewControl = (isset($instance['streetViewControl'])) ? esc_attr($instance['streetViewControl']) : false;
    $bounce = (isset($instance['bounce'])) ? esc_attr($instance['bounce']) : false;
    $infoWindow = (isset($instance['infoWindow'])) ? esc_attr($instance['infoWindow']) : false;
    $infoWindowTitle = (isset($instance['infoWindowTitle'])) ? esc_attr($instance['infoWindowTitle']) : '';

    require('inc/widget-fields.php');
  }
}

function quae_map_register_widgets() {
  register_widget( 'Quae_Map_Widget' );
}

add_action( 'widgets_init', 'quae_map_register_widgets' );

function quae_map_front_scripts_styles() {
  wp_enqueue_style( 'quae_map_front_styles', plugins_url('quae_map/css/quae_map.css' ));
  wp_enqueue_script('google_maps_api', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array(), '', true );
  wp_enqueue_script( 'quae_map_front_scripts', plugins_url('quae_map/js/quae_map.js' ), array('google_maps_api', 'jquery'), '', true);
}
add_action('wp_enqueue_scripts' , 'quae_map_front_scripts_styles');

function quae_map_shortcode( $atts, $content = null ) {
  global $post;

  $args = shortcode_atts(array(
    'address'             => '',
    'latlon'              => '',
    'zoom'                => '12',
    'zoom_control'        => 'off',
    'map_type_control'    => 'on',
    'scale_control'       => 'on',
    'street_view_control' => 'off',
    'bounce'              => 'off',
    'info_window'         => 'off',
    'info_window_title'   => '',
    'width'               => '',
    'height'              => '',
  ), $atts );

  $address = $args['address'];
  $latlon = $args['latlon'];
  $zoom = $args['zoom'];
  $zoomControl = ($args['zoom_control'] === 'on') ? 1 : 0;
  $mapTypeControl = ($args['map_type_control'] === 'on') ? 1 : 0;
  $scaleControl = ($args['scale_control'] === 'on') ? 1 : 0;
  $streetViewControl = ($args['street_view_control'] === 'on') ? 1 : 0;
  $bounce = ($args['bounce'] === 'on') ? 1 : 0;
  $infoWindow = ($args['info_window'] === 'on') ? 1 : 0;
  $infoWindowTitle = $args['info_window_title'];
  $width = $args['width'];
  $height = $args['height'];


  ob_start();
  require('inc/shortcode-frontend.php');
  $content = ob_get_clean();

  return $content;
}

add_shortcode('quae_map', 'quae_map_shortcode');