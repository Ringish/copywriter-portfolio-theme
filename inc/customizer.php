<?php
define( 'O2_DIRECTORY', get_template_directory() . '/inc/o2/' );
define( 'O2_DIRECTORY_URI', get_template_directory_uri() . '/inc/o2/' );
require get_template_directory() . '/inc/o2/controls/icon-picker/icon-picker-control.php';
function cpt_customizer($wp_customize) {


	for ($i=1; $i <= 5; $i++) { 
		$wp_customize->add_section( 'box_'.$i , array(
			'title'    => __( 'Box', 'copywriter-portfolio' ).' '.$i,
			'priority' => 30
			) );
		$wp_customize->add_setting( 'box_'.$i.'_heading' , array(
			'default'   => 'Social media',
			'transport' => 'refresh',
			'sanitize_callback'	=> 'esc_attr',
			) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'box_'.$i.'_heading', array(
			'label'    => __( 'Box heading', 'copywriter-portfolio' ).' '.$i,
			'section'  => 'box_'.$i,
			'settings' => 'box_'.$i.'_heading',
			) ) );
		$wp_customize->add_setting( 'box_'.$i.'_link' , array(
			'default'   => '#',
			'transport' => 'refresh',
			'sanitize_callback'	=> 'esc_url_raw',
			) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'box_'.$i.'_link', array(
			'label'    => __( 'Box link', 'copywriter-portfolio' ).' '.$i,
			'section'  => 'box_'.$i,
			'settings' => 'box_'.$i.'_link',
			) ) );

		$wp_customize->add_setting( 'box_'.$i.'_icon', array(
			'default' => 'fa-facebook',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'esc_attr',
			));

		$wp_customize->add_control(new O2_Customizer_Icon_Picker_Control($wp_customize, 'box_'.$i.'_icon', array(
			'label' => __('Icons', 'copywriter-portfolio'),
			'description' => __('Choose an icon', 'copywriter-portfolio'),
			'iconset' => 'fa',
			'section' => 'box_'.$i,
			'priority' => 5,
			'settings' => 'box_'.$i.'_icon'
			)));


		$wp_customize->add_setting( 'box_'.$i.'_bgcolor', array(
			'default' => '#FFF',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'esc_attr',
			));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
				$wp_customize, 
				'box_'.$i.'_bgcolor', 
				array(
					'label'      => __( 'Background color', 'copywriter-portfolio' ),
					'section'    => 'box_'.$i,
					'settings'   => 'box_'.$i.'_bgcolor',
					) ) 
			);

		$wp_customize->add_setting(
        'box_'.$i.'_bgimg',
        array(
            'default' => '',
            'sanitize_callback'	=> 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'box_'.$i.'_bgimg',
            array(
                'label' => 'Background image',
                'section' => 'box_'.$i,
                'settings' => 'box_'.$i.'_bgimg'
            )
        )
    );
	} 

	$wp_customize->add_setting( 'top_text_heading' , array(
		'default'   => 'Lorem ipsum',
		'transport' => 'refresh',
		'sanitize_callback'	=> 'esc_attr',
		) );
	$wp_customize->add_setting( 'top_text_content' , array(
		'default'   => 'Lorem ipsum',
		'transport' => 'refresh',
		'sanitize_callback'	=> 'esc_attr',
		) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_text_heading', array(
		'label'    => __( 'Top text heading', 'copywriter-portfolio' ),
		'section'  => 'top_text',
		'settings' => 'top_text_heading',
		) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_text_content', array(
		'label'    => __( 'Top text', 'copywriter-portfolio' ),
		'section'  => 'top_text',
		'settings' => 'top_text_content',
		'type'	   => 'textarea'
		) ) );



}
add_action( 'customize_register', 'cpt_customizer' );
?>