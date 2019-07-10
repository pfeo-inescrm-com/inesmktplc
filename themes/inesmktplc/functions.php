<?php
/**
 * INES CRM MARKETPLACE 
 * functions and definitions
 *
 * @since 0.1.0
 * 
 * DO NOT INCLUDE TRANSLATIONS STRINGS HERE
 * SINCE LOCO TRANSLATE PLUGIN DOES NOT
 * PROCESS FILES MORE THAN 100KB
 * 
 * 
 */

/**
 *  SETUP
 */

/* -------------------------------------------------------------
------------------------------------------------------------- */


/**
 *  INCLUDES
 */
include(get_template_directory() . '/inc/enqueue.php');
include(get_template_directory() . '/inc/setup.php');
include(get_template_directory() . '/inc/sidebars.php');
include(get_template_directory() . '/inc/widgets.php');
include(get_template_directory() . '/inc/widgets/class-inesmktplc-widget-categories.php');
//include(get_template_directory() . '/inc/widgets/class-inesmktplc-widget-filter-products-checkbox.php');
include(get_template_directory() . '/inc/widgets/class-inesmktplc-widget-product-modules.php');
include(get_template_directory() . '/inc/widgets/class-inesmktplc-widget-product-pricing.php');
include(get_template_directory() . '/inc/inesmktplc-wc-template-functions.php');
// Register Custom Navigation Walker
require_once(get_template_directory() . '/inc/wp-bootstrap-navwalker.php');
// library for bundling required plugins
require_once(get_template_directory() . '/inc/libs/class-tgm-plugin-activation.php');
include(get_template_directory() . '/inc/inesmktplc-register-required-plugins.php');

/* -------------------------------------------------------------
------------------------------------------------------------- */

/**
 *  HOOKS
 */

// inject styles and scripts
// for theme
add_action('wp_enqueue_scripts', 'inesmktplc_enqueue');
// for login page
add_action('login_enqueue_scripts', 'inesmktplc_enqueue_login');

// initial theme setup
add_action('after_setup_theme', 'inesmktplc_setup_theme');

// start sidebars
add_action('widgets_init', 'inesmktplc_sidebar_main');
add_action('widgets_init', 'inesmktplc_sidebar_wc_shop');
add_action('widgets_init', 'inesmktplc_sidebar_footer_1');
add_action('widgets_init', 'inesmktplc_sidebar_footer_2');
add_action('widgets_init', 'inesmktplc_sidebar_footer_3');
add_action('widgets_init', 'inesmktplc_sidebar_footer_4');
// add_action('widgets_init', 'inesmktplc_sidebar_wc_single_product');

// start widgets
add_action('widgets_init', 'inesmktplc_widget_init');

// ask for required plugins
add_action('tgmpa_register', 'inesmktplc_register_required_plugins');

// allow Multi Post Thumbnails plugin to start
add_action('wp_loaded', 'register_second_featured_image');

/**
 * Woocommerce hooks and more
 */

// remove line stroked price
add_filter('woocommerce_get_price_html', "inesmktplc_wc_only_sale_price", 99, 2);

// remove woocommerce sidebar that brokes layout
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// start container div tag before single product layout
add_action('woocommerce_before_single_product', 'inesmktplc_wc_start_container_tag', 5);

// end container div tag before single product layout
add_action('woocommerce_after_single_product', 'inesmktplc_wc_close_container_tag', 5);

// add breadcrum area for single product page
add_filter('woocommerce_before_main_content', 'inesmktplc_wc_add_breadcrumb_area');

// remove all single product summary in single product page
// also d-none on single product template
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

// remove related products in single product page
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// remove gallery images in single product page
//remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);

// enable woocommerce gallery slider
add_theme_support( 'wc-product-gallery-slider' );

// enable woocommerce gallery zoom
//add_theme_support( 'wc-product-gallery-zoom' );

// enable woocommerce gallery lightbox
add_theme_support( 'wc-product-gallery-lightbox' );


// display custom translatable string instead of regular prices
add_filter('woocommerce_get_price_html', 'inesmktplc_wc_price_to_custom_string', 100, 2);

// remove some tabs from single product page
add_filter('woocommerce_product_tabs', 'inesmktplc_wc_remove_product_tabs', 98);

// show related products fullwidth in single product page
add_action('woocommerce_after_single_product', 'inesmktplc_wc_show_related_products_fullwidth', 5);

// show call to action section in single product page
add_action('woocommerce_after_single_product', 'inesmktplc_wc_show_call_to_action_fullwidth', 5);

// remove default header in shop page
// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
// remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_filter('woocommerce_before_main_content', 'inesmktplc_wc_remove_breadcrumb_area');

// add custom header in shop page
add_filter('woocommerce_before_main_content', 'inesmktplc_wc_search_header', 20);

// add custom filter bar in shop page
add_action('woocommerce_before_shop_loop', 'inesmktplc_wc_filter_bar', 15);

// remove default before shop loop
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// add starting section and container tags to shop page
add_action('woocommerce_before_shop_loop', 'inesmktplc_wc_shop_container_start', 40);
// start first row: sidebar and products grid
add_action('woocommerce_before_shop_loop', 'inesmktplc_wc_shop_main_row_start', 50);
// start sidebar
add_action('woocommerce_before_shop_loop', 'inesmktplc_wc_shop_sidebar_in', 60);
// end first row
add_action('woocommerce_after_shop_loop', 'inesmktplc_wc_shop_main_row_end', 10);
// re-order pagination (it has it's own row)
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 20);
// add ending container and section tags to shop page
add_action('woocommerce_after_shop_loop', 'inesmktplc_wc_shop_container_end', 30);

/**
 * custom items per page dropdown
 * intended to show in products page
 * 
 */
function inesmktplc_hook_javascript_footer()
{
?>
<script>
async function setResultsPerPage(results) {
  var currentUrl = window.location.href;
  // var hostname = window.location.hostname;
  // var pathname = window.location.pathname;
  // var protocol = window.location.protocol;
  var search = window.location.search;
  
  if(results) {
      if(search != '' && !(search.indexOf('perpage') > -1)) {
        location.assign(currentUrl + '&perpage=' + results);
        // console.log('a:'+search.indexOf('perpage'));
      } else if (search != '' && search.indexOf('&perpage') > -1) {
        var newPerPage = currentUrl.replace(/&perpage=\d+|\s\S/i,`&perpage=${results}` );
        await location.assign(newPerPage);
      } else {
        location.assign('/?perpage=' + results);
      }
  }
}
</script>
<?php
}
add_action('wp_footer', 'inesmktplc_hook_javascript_footer');


add_action('pre_get_posts', 'inesmktplc_pre_get_products_query');
function inesmktplc_pre_get_products_query($query)
{
  $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
  if ($query->is_main_query() && !is_admin() && is_post_type_archive('product')) {
    $query->set('posts_per_page', $per_page);
  }
}

/* -------------------------------------------------------------
------------------------------------------------------------- */


/**
 *  SHORTCODES
 */

/* -------------------------------------------------------------
------------------------------------------------------------- */


/**
 *  OTHER FUNCTIONS
 */

/**
 * this is a modification of
 * wordpress get_the_term_list()
 * given a taxonomy
 * it returns just the first result
 * it is intendend to show just one category
 * on product cards
 * 
 */
function inesmktplc_get_the_term_list_first_result($id, $taxonomy)
{
  $terms = get_the_terms($id, $taxonomy);

  if (is_wp_error($terms)) {
    return $terms;
  }

  if (empty($terms)) {
    return false;
  }

  $links = array();

  foreach ($terms as $term) {
    $link = get_term_link($term, $taxonomy);
    if (is_wp_error($link)) {
      return $link;
    }
    $links[] = '<a href="' . esc_url($link) . '" rel="tag">' . $term->name . '</a>';
  }

  /**
   * Filters the term links for a given taxonomy.
   *
   * The dynamic portion of the filter name, `$taxonomy`, refers
   * to the taxonomy slug.
   *
   * @since 2.5.0
   *
   * @param string[] $links An array of term links.
   */
  $term_links = apply_filters("term_links-{$taxonomy}", $links);

  return $term_links[0];
}

/**
 * hide login page
 * to prevent attacks
 */
// function inesmktplc_redirect_to_nonexistent_page()
// {
//   $new_login =  'newlogin';
//   if (strpos($_SERVER['REQUEST_URI'], $new_login) === false) {
//     wp_safe_redirect(home_url('access-denied'), 302);
//     exit();
//   }
// }
// add_action('login_head', 'inesmktplc_redirect_to_nonexistent_page');

/**
 * send users to custom login url
 */
function inesmktplc_redirect_to_actual_login()
{
  $new_login =  'newlogin';
  if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY) == $new_login && ($_GET['redirect'] !== false)) {
    wp_safe_redirect(home_url("login?$new_login&redirect=false"));
    exit();
  }
}
add_action('init', 'inesmktplc_redirect_to_actual_login');

/**
 * if login fails
 * redirect to custom login page
 */
// not working
// TODO: revise it
// function inesmktplc_redirect_if_login_fails()
// {
//   $new_login =  'newlogin';
//   if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY) == $new_login && ($_GET['redirect'] !== false)) {
//     wp_safe_redirect(home_url("login?$new_login&login=failed&redirect=false"));
//     exit();
//   }
// }
// add_action( 'wp_login_failed', 'inesmktplc_redirect_if_login_fails' );

function login_failed()
{
  $login_page  = home_url('/login/');
  wp_redirect($login_page . '?login=failed');
  exit;
}
add_action('wp_login_failed', 'login_failed');

function verify_username_password($user, $username, $password)
{
  $login_page  = home_url('/login/');
  if ($username == "" || $password == "") {
    wp_redirect($login_page . "?login=empty");
    exit;
  }
}
add_filter('authenticate', 'verify_username_password', 1, 3);

// redirect user to homepage after login
function inesmktplc_redirect_upon_login()
{
  return home_url();
  exit();
}
add_filter('login_redirect', 'inesmktplc_redirect_upon_login');

// redirect user to homepage after logout
function inesmktplc_auto_redirect_after_logout()
{
  wp_redirect(home_url());
  exit();
}
add_action('wp_logout', 'inesmktplc_auto_redirect_after_logout');

/**
 * Customize login page
 */
// function inesmktplc_login_stylesheet() {
//   wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
// }
// //This loads the function above on the login page
// add_action( 'login_enqueue_scripts', 'inesmktplc_login_stylesheet' );






