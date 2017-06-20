<?php
define( 'O2_DIRECTORY', get_template_directory() . '/inc/o2/' );
define( 'O2_DIRECTORY_URI', get_template_directory_uri() . '/inc/o2/' );
require get_template_directory() . '/inc/o2/controls/icon-picker/icon-picker-control.php';
function copywriter_customizer($wp_customize) {


	for ($i=1; $i <= 5; $i++) { 
		$wp_customize->add_section( 'box_'.$i , array(
			'title'    => __( 'Box '.$i, 'copywriter' ),
			'priority' => 30
			) );
		$wp_customize->add_setting( 'box_'.$i.'_heading' , array(
			'default'   => 'Social media',
			'transport' => 'refresh',
			) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'box_'.$i.'_heading', array(
			'label'    => __( 'Box '.$i.' heading', 'copywriter' ),
			'section'  => 'box_'.$i,
			'settings' => 'box_'.$i.'_heading',
			) ) );

		$wp_customize->add_setting( 'box_'.$i.'_icon', array(
			'default' => 'fa-facebook',
			'capability' => 'edit_theme_options'
			));

		$wp_customize->add_control(new O2_Customizer_Icon_Picker_Control($wp_customize, 'box_'.$i.'_icon', array(
			'label' => __('Icons', 'textdomain'),
			'description' => __('Choose an icon', 'textdomain'),
			'iconset' => 'fa',
			'section' => 'box_'.$i,
			'priority' => 5,
			'settings' => 'box_'.$i.'_icon'
			)));


		$wp_customize->add_setting( 'box_'.$i.'_bgcolor', array(
			'default' => '#FFF',
			'capability' => 'edit_theme_options'
			));

		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
				$wp_customize, 
				'box_'.$i.'_bgcolor', 
				array(
					'label'      => __( 'Background color', 'copywriter' ),
					'section'    => 'box_'.$i,
					'settings'   => 'box_'.$i.'_bgcolor',
					) ) 
			);

		$wp_customize->add_setting(
        'box_'.$i.'_bgimg',
        array(
            'default' => '',
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
		) );
	$wp_customize->add_setting( 'top_text_content' , array(
		'default'   => 'Lorem ipsum',
		'transport' => 'refresh',
		) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_text_heading', array(
		'label'    => __( 'Top text heading', 'copywriter' ),
		'section'  => 'top_text',
		'settings' => 'top_text_heading',
		) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_text_content', array(
		'label'    => __( 'Top text', 'copywriter' ),
		'section'  => 'top_text',
		'settings' => 'top_text_content',
		'type'	   => 'textarea'
		) ) );

		// Posts section
	$wp_customize->add_section( 'posts' , array(
		'title'    => __( 'Posts', 'copywriter' ),
		'priority' => 35
		) );   

	$wp_customize->add_setting( 'posts_heading' , array(
		'default'   => 'Lorem ipsum',
		'transport' => 'refresh',
		) );
	$wp_customize->add_setting( 'posts_post_type' , array(
		'default'   => 'post',
		'transport' => 'refresh',
		) );
	$wp_customize->add_setting( 'posts_number' , array(
		'default'   => 4,
		'transport' => 'refresh',
		) );

	foreach (get_post_types() as $key => $value) {
		if ($key != "revision" && $key != "nav_menu_item" && $key != "custom_css" && $key != "customize_changeset") {
			$post_types[$key] = ucfirst($value);
		}
	}

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_heading', array(
		'label'    => __( 'Posts heading', 'copywriter' ),
		'section'  => 'posts',
		'settings' => 'posts_heading',
		) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'posts_post_type', array(
		'label'    => __( 'Post type', 'copywriter' ),
		'section'  => 'posts',
		'settings' => 'posts_post_type',
		'type'	   => 'select',
		'choices'  => $post_types
		) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'posts_number', array(
		'label'    => __( 'Number of posts', 'copywriter' ),
		'section'  => 'posts',
		'settings' => 'posts_number',
		'type'	   => 'select',
		'choices'  => array(1,2,3,4,5,6)
		) ) );


}
add_action( 'customize_register', 'copywriter_customizer' );
?>