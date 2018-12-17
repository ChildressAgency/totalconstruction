<?php
/*
  Plugin Name: Total Construction Services
  Description: Creates the Services Custom Post Type
  Author: The Childress Agency
  Author URI: https://childressagency.com
  Version: 1.0
*/

if(!defined('ABSPATH')){ exit; }

add_action('init', 'totalconstruction_create_post_types');
function totalconstruction_create_post_types(){
  $services_labels = array(
    'name' => 'Services',
    'singular_name' => 'Service',
    'menu_name' => 'Services',
    'add_new_item' => 'Add New Service',
    'search_items' => 'Search Services',
    'edit_item' => 'Edit Service',
    'view_item' => 'View Service',
    'all_items' => 'All Services',
    'new_item' => 'New Service',
    'not_found' => 'No Services Found'
  );
  $services_args = array(
    'labels' => $services_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-hammer',
    'query_var' => 'services',
    'has_archive' => false,
    'show_in_rest' => true,
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'revisions',
      'excerpt',
      'thumbnail'
    )
  );
  register_post_type('services', $services_args);
}

add_action('acf/init', 'totalconstruction_add_services_acf_fields');
function totalconstruction_add_services_acf_fields(){

  acf_add_local_field_group(array(
    'key' => 'group_5c127a23ca337',
    'title' => 'Services Settings',
    'fields' => array(
      array(
        'key' => 'field_5c127a37d54a5',
        'label' => 'Types of Buildings',
        'name' => 'types_of_buildings',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => 'field_5c127a4fd54a6',
        'min' => 0,
        'max' => 0,
        'layout' => 'table',
        'button_label' => 'Add Building Type',
        'sub_fields' => array(
          array(
            'key' => 'field_5c127a4fd54a6',
            'label' => 'Building Name',
            'name' => 'building_name',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5c127a5ed54a7',
            'label' => 'Building Description',
            'name' => 'building_desctription',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 4,
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5c127a6fd54a8',
            'label' => 'Building Image',
            'name' => 'building_image',
            'type' => 'image',
            'instructions' => 'Image size should be 325px x 140px',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'full',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'services',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));

  acf_add_local_field_group(array(
    'key' => 'group_5c17ba38e2ef2',
    'title' => 'Services Gallery Settings',
    'fields' => array(
      array(
        'key' => 'field_5c17ba7025d15',
        'label' => 'Gallery',
        'name' => 'gallery',
        'type' => 'gallery',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'min' => '',
        'max' => '',
        'insert' => 'append',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'services',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));
}