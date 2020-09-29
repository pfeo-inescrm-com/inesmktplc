<?php

function inesmktplc_enqueue()
{

    /**
     * register styles
     */
    wp_register_style('inesmktplc_animate', get_template_directory_uri() . '/assets/css/animate.css');
    wp_register_style('inesmktplc_fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
    wp_register_style('inesmktplc_fontello', get_template_directory_uri() . '/assets/css/fontello.css');
    wp_register_style('inesmktplc_jqueryui', get_template_directory_uri() . '/assets/css/jquery-ui.css');
    wp_register_style('inesmktplc_lnricon', get_template_directory_uri() . '/assets/css/lnr-icon.css');
    wp_register_style('inesmktplc_owlcarousel', get_template_directory_uri() . '/assets/css/owl.carousel.css');
    wp_register_style('inesmktplc_slick', get_template_directory_uri() . '/assets/css/slick.css');
    wp_register_style('inesmktplc_trumbowyg', get_template_directory_uri() . '/assets/css/trumbowyg.min.css');
    wp_register_style('inesmktplc_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css');
    wp_register_style('inesmktplc_style', get_template_directory_uri() . '/style.css');


    /**
     * enqueue styles
     */
    wp_enqueue_style('inesmktplc_animate');
    wp_enqueue_style('inesmktplc_fontawesome');
    wp_enqueue_style('inesmktplc_fontello');
    wp_enqueue_style('inesmktplc_jqueryui');
    wp_enqueue_style('inesmktplc_lnricon');
    wp_enqueue_style('inesmktplc_owlcarousel');
    wp_enqueue_style('inesmktplc_slick');
    wp_enqueue_style('inesmktplc_trumbowyg');
    wp_enqueue_style('inesmktplc_bootstrap');
    wp_enqueue_style('inesmktplc_style');


    /**
     * register scripts
     * 
     * all scripts goes right before closing body tag
     * in_footer = true
     * 
     */
    //$googleMapsAPIKey = 'AIzaSyCQAz1ucqaYbDQirrmRq6iWdlMSu8ubBoo';
    //wp_register_script( 'inesmktplc_googlemaps', 'https://maps.googleapis.com/maps/api/js?key='.$googleMapsAPIKey, array(), false, true); 
    // jquery not needed as is included with wordpress ???
    // wp_register_script( 'inesmktplc_jquery', get_template_directory_uri() . '/assets/js/vendor/jquery/jquery-1.12.3.js', array(), false, true); 
    wp_register_script('inesmktplc_popper', get_template_directory_uri() . '/assets/js/vendor/jquery/popper.min.js', array(), false, true);
    wp_register_script('inesmktplc_jqueryuikit', get_template_directory_uri() . '/assets/js/vendor/jquery/uikit.min.js', array(), false, true);
    wp_register_script('inesmktplc_bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array(), false, true);
    wp_register_script('inesmktplc_chart', get_template_directory_uri() . '/assets/js/vendor/chart.bundle.min.js', array(), false, true);
    wp_register_script('inesmktplc_grid', get_template_directory_uri() . '/assets/js/vendor/grid.min.js', array(), false, true);
    // wp_register_script( 'inesmktplc_jqueryui', get_template_directory_uri() . '/assets/js/vendor/jquery-ui.min.js', array(), false, true); 
    wp_register_script('inesmktplc_jquerybarrating', get_template_directory_uri() . '/assets/js/vendor/jquery.barrating.min.js', array(), false, true);
    wp_register_script('inesmktplc_jquerycountdown', get_template_directory_uri() . '/assets/js/vendor/jquery.countdown.min.js', array(), false, true);
    wp_register_script('inesmktplc_jquerycounterup', get_template_directory_uri() . '/assets/js/vendor/jquery.counterup.min.js', array(), false, true);
    wp_register_script('inesmktplc_jqueryeasing', get_template_directory_uri() . '/assets/js/vendor/jquery.easing1.3.js', array(), false, true);
    wp_register_script('inesmktplc_owlcarousel', get_template_directory_uri() . '/assets/js/vendor/owl.carousel.min.js', array(), false, true);
    wp_register_script('inesmktplc_slick', get_template_directory_uri() . '/assets/js/vendor/slick.min.js', array(), false, true);
    wp_register_script('inesmktplc_tether', get_template_directory_uri() . '/assets/js/vendor/tether.min.js', array(), false, true);
    wp_register_script('inesmktplc_trumbowyg', get_template_directory_uri() . '/assets/js/vendor/trumbowyg.min.js', array(), false, true);
    wp_register_script('inesmktplc_waypoints', get_template_directory_uri() . '/assets/js/vendor/waypoints.min.js', array(), false, true);
    wp_register_script('inesmktplc_dashboard', get_template_directory_uri() . '/assets/js/dashboard.js', array(), false, true);
    wp_register_script('inesmktplc_main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
    //wp_register_script( 'inesmktplc_map', get_template_directory_uri() . '/assets/js/map.js', array(), false, true);

    /**
     * enqueue scripts
     */
    wp_enqueue_script('inesmktplc_googlemaps');
    // wp_enqueue_script( 'inesmktplc_jquery' );
    wp_enqueue_script('jquery');
    wp_enqueue_script('inesmktplc_popper');
    wp_enqueue_script('inesmktplc_jqueryuikit');
    wp_enqueue_script('inesmktplc_bootstrap');
    wp_enqueue_script('inesmktplc_chart');
    wp_enqueue_script('inesmktplc_grid');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_script('jquery-ui-datepicker');
    // wp_enqueue_script( 'inesmktplc_jqueryui' );
    wp_enqueue_script('inesmktplc_jquerybarrating');
    wp_enqueue_script('inesmktplc_jquerycountdown');
    wp_enqueue_script('inesmktplc_jquerycounterup');
    wp_enqueue_script('inesmktplc_jqueryeasing');
    wp_enqueue_script('inesmktplc_owlcarousel');
    wp_enqueue_script('inesmktplc_slick');
    wp_enqueue_script('inesmktplc_tether');
    wp_enqueue_script('inesmktplc_trumbowyg');
    wp_enqueue_script('inesmktplc_waypoints');
    wp_enqueue_script('inesmktplc_dashboard');
    wp_enqueue_script('inesmktplc_main');
    wp_enqueue_script('inesmktplc_map');
}


function inesmktplc_enqueue_login()
{
    /**
     * register styles
     */
    wp_register_style('inesmktplc_style_login', get_template_directory_uri() . '/style-login.css');


    /**
     * enqueue styles
     */
    wp_enqueue_style('inesmktplc_style_login');
}
