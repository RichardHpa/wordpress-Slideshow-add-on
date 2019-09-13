<?php
    function rh_slideshow_customize_register( $wp_customize ) {

        $wp_customize->add_section('rh_slideshow_section', array(
    		'title'      => 'Slideshow',
    		'description' => 'Settings for the slideshow plugin.',
    		'priority'   => 100,
    	));

        $wp_customize->add_setting('rh_slide_width_setting', array(
    		'default'   => 'full',
    		'priority'   => 10,
    		'transport' => 'refresh',
    	));

        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'rh_slide_width_control',
            array(
                'label'      => 'Slideshow Size',
                'section'    => 'rh_slideshow_section',
                'type'           => 'radio',
                'choices'        => array(
                    'full'   => 'Full',
                    'fixed'  => 'Fixed'
                ),
                'settings'   => 'rh_slide_width_setting',
                'description' => 'Do you want the slideshow to go across the entire page, or fixed within its container.',
            )
        ));

        $wp_customize->add_setting('rh_slide_speed_setting', array(
            'default'   => '3',
            'priority'   => 10,
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'rh_slide_speed_control',
            array(
                'label'      => 'Slideshow Duration (Seconds)',
                'section'    => 'rh_slideshow_section',
                'type'           => 'number',
                'settings'   => 'rh_slide_speed_setting',
                'description' => 'How many seconds do you want between each slide transition.'
            )
        ));

        $wp_customize->add_setting('rh_slide_indicators_setting', array(
            'default'   => 'on',
            'priority'   => 10,
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'rh_slide_indicators_control',
            array(
                'label'      => 'Slideshow Indicators',
                'section'    => 'rh_slideshow_section',
                'type'           => 'radio',
                'choices'        => array(
                    'on'   => 'On',
                    'off'  => 'Off'
                ),
                'settings'   => 'rh_slide_indicators_setting',
            )
        ));

        $wp_customize->add_setting('rh_slide_count_setting', array(
            'default'   => '5',
            'transport' => 'active_callback',
        ));

        $rhSlideCount = 10;
        $rhSlideCountArray = array();
        for ($i=1; $i <= $rhSlideCount; $i++) {
            $rhSlideCountArray[$i] = $i;
        };

        $wp_customize->add_control(new WP_Customize_Control(
    		$wp_customize,
    		'rh_slide_count_control',
    		array(
    			'label'      => 'Show many slides would you like?',
    			'section'    => 'rh_slideshow_section',
    			'type'       => 'select',
    			'default'   => '5',
    			'choices' => $rhSlideCountArray,
    			'settings'   => 'rh_slide_count_setting',
    		)
    	));


        for ($i=1; $i <= $rhSlideCount; $i++) {
            $wp_customize->add_setting('rh_slide_' . $i . '_setting', array(
    			'priority'  => 20,
                'default' => plugin_dir_url(__DIR__). 'assets/images/placeholderSlide.jpg',
    			'transport' => 'refresh',
    		));

            $wp_customize->add_control(new WP_Customize_Image_Control(
                $wp_customize,
                'rh_slide_' . $i . '_control',
                array(
                    'label'      => 'Slideshow Image ' . $i,
                    'section'    => 'rh_slideshow_section',
                    'settings'   => 'rh_slide_' . $i . '_setting'
                )
            ));
        }

    }
    add_action( 'customize_register', 'rh_slideshow_customize_register' );
 ?>
