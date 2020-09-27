<?php

// Create new customizer sections, settings and controls
function theme_customizer($wp_customize)
{
   // add Header section to Wordpress customizer   
   $wp_customize->add_section('header_settings_section', array(
      'title'       => 'Header',
   ));
   // add Logo setting to Header section
   $wp_customize->add_setting('header_logo');
   $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'header_logo', array(
      'label'       => __('Logo', 'mytheme'),
      'description' => 'Add a logo to the header.',
      'section'     => 'header_settings_section',
      'settings'    => 'header_logo',
   )));
   // add Background setting to Header section
   $wp_customize->add_setting('header_background');
   $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'header_background', array(
      'label'       => __('Background', 'mytheme'),
      'description' => 'Add a background to the header.',
      'section'     => 'header_settings_section',
      'settings'    => 'header_background',
   )));

   // add Footer section to Wordpress customizer
   $wp_customize->add_section('footer_settings_section', array(
      'title'       => 'Footer'
   ));
   // add Tekst setting to Footer section
   $wp_customize->add_setting('footer_text');
   $wp_customize->add_control('text_setting', array(
      'label'       => 'Footer text here',
      'description' => 'Add text for use in the footer.',
      'section'     => 'footer_settings_section',
      'settings'    => 'footer_text',
      'type'        => 'textarea',
   ));
}
add_action('customize_register', 'theme_customizer');
