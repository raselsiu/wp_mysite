<?php


// My Theme Function

// Theme Title
add_theme_support('title-tag');



// Add Google font

function raselsiu16_add_google_font(){
    wp_enqueue_style('raselsiu16-font','https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
}
add_action('wp_enqueue_scripts','raselsiu16_add_google_font');



// Adding css and jQuery or JS file

function raselsiu16_css_and_js_calling(){

    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css',array(),'5.3.2','all');
    wp_register_style('custom', get_template_directory_uri().'/css/custom.css',array(),'1.0.0','all');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style( "raselsiu16-style", get_stylesheet_uri() );
    wp_enqueue_style('custom'); wp_enqueue_style('custom'); wp_enqueue_style('custom'); wp_enqueue_style('custom'); wp_enqueue_style('custom'); wp_enqueue_style('custom');

    // Script
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array(),'5.3.2','true');
    wp_enqueue_script('raselsiu16-main',get_template_directory_uri().'/js/main.js',array(),'1.0.0','true');
}
add_action('wp_enqueue_scripts','raselsiu16_css_and_js_calling');


// Logo Customizer on Header Area

function raselsiu16_customizer_register($wp_customize){

    $wp_customize->add_section('raselsiu16_header_area',array(
        'title'         => __('Header Area Logo','raselsiu16'),
        'description'   =>('Update your header area'), 
    ));

    $wp_customize->add_setting('raselsiu16_logo',array(
        'default' => get_bloginfo('template_directory').'/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'raselsiu16_logo',array(
        'label' => 'Upload Header Logo',
        'description' => 'Update your header area Logo',
        'setting' => 'raselsiu16_logo',
        'section' => 'raselsiu16_header_area',
    )));
}

add_action( 'customize_register','raselsiu16_customizer_register');


// Menu Register

register_nav_menu( 'main_menu',__('Main Menu','raselsiu16_menu'));