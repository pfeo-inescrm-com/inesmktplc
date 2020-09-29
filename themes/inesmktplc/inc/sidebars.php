<?php

/**
 * Main Sidebar
 */
function inesmktplc_sidebar_main()
{
    $args = array(
        'name'          => __('Sidebar Marketplace - General', 'inesmktplc'),
        'id'            => 'inesmktplc-sidebar-main',    // ID should be LOWERCASE  ! ! !
        'description'   => __('INES Marketplace general sidebar', 'inesmktplc'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        // 'after_widget'  => '</div>',
        // 'before_title'  => '<h2 class="widget-title">',
        // 'after_title'   => '</h2>',
        'before_title'  => '<a class="card-title"><h4>',
        'after_title'   => '</h4></a>',
        'after_widget'  => '</div>',
    );

    register_sidebar($args);
}

/**
 * Footer Sidebar 1st column
 */
function inesmktplc_sidebar_footer_1()
{
    $args = array(
        'name'          => __('Sidebar Marketplace - Footer 1st column', 'inesmktplc'),
        'id'            => 'inesmktplc-sidebar-footer-1',    // ID should be LOWERCASE  ! ! !
        'description'   => __('INES Marketplace sidebar for footer 1st column', 'inesmktplc'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title text--white">',
        'after_title'   => '</h4>',
    );

    register_sidebar($args);
}

/**
 * Footer Sidebar 2nd column
 */
function inesmktplc_sidebar_footer_2()
{
    $args = array(
        'name'          => __('Sidebar Marketplace - Footer 2nd column', 'inesmktplc'),
        'id'            => 'inesmktplc-sidebar-footer-2',    // ID should be LOWERCASE  ! ! !
        'description'   => __('INES Marketplace sidebar for footer 2nd column', 'inesmktplc'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title text--white">',
        'after_title'   => '</h4>',
    );

    register_sidebar($args);
}

/**
 * Footer Sidebar 3rd column
 */
function inesmktplc_sidebar_footer_3()
{
    $args = array(
        'name'          => __('Sidebar Marketplace - Footer 3rd column', 'inesmktplc'),
        'id'            => 'inesmktplc-sidebar-footer-3',    // ID should be LOWERCASE  ! ! !
        'description'   => __('INES Marketplace sidebar for footer 3rd column', 'inesmktplc'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title text--white">',
        'after_title'   => '</h4>',
    );

    register_sidebar($args);
}

/**
 * Footer Sidebar 4th column
 */
function inesmktplc_sidebar_footer_4()
{
    $args = array(
        'name'          => __('Sidebar Marketplace - Footer 4th column', 'inesmktplc'),
        'id'            => 'inesmktplc-sidebar-footer-4',    // ID should be LOWERCASE  ! ! !
        'description'   => __('INES Marketplace sidebar for footer 4th column', 'inesmktplc'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title text--white">',
        'after_title'   => '</h4>',
    );

    register_sidebar($args);
}

/**
 * Woocommerce single product sidebar
 */
// function inesmktplc_sidebar_wc_single_product()
// {
//     $args = array(
//         'name'          => __('Sidebar Marketplace - Single product page', 'inesmktplc'),
//         'id'            => 'inesmktplc-sidebar-wc-single-product',    // ID should be LOWERCASE  ! ! !
//         'description'   => __('INES Marketplace sidebar for Woocommerce - Single Product', 'inesmktplc'),
//         'class'         => '',
//         'before_widget' => '<div id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</div>',
//         'before_title'  => '<h4 class="inesmktplc-wc-single-product text--white">',
//         'after_title'   => '</h4>',
//     );

//     register_sidebar($args);
// }


/**
 * Woocommerce shop sidebar
 */
function inesmktplc_sidebar_wc_shop()
{
    $args = array(
        'name'          => __('Sidebar Marketplace - Shop page', 'inesmktplc'),
        'id'            => 'inesmktplc-sidebar-shop',    // ID should be LOWERCASE  ! ! !
        'description'   => __('INES Marketplace sidebar for product filtering in shop page', 'inesmktplc'),
        'class'         => '',
        // 'before_widget' => '<div id="%1$s" class="widget %2$s">',
        // 'after_widget'  => '</div>',
        // 'before_title'  => '<h2 class="widget-title">',
        // 'after_title'   => '</h2>',
        'before_widget' => '<div class="sidebar-card">',
        // href="#collapse %1$s" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse1"
        'before_title'  => '<a class="card-title"><h4>',
        'after_title'   => '</h4></a>',
        'after_widget'  => '</div>',
    );

    register_sidebar($args);
}