<?php
/**
 * remove line stroked price
 */
function inesmktplc_wc_only_sale_price($price, $product)
{
    // if(!is_cart() && !is_checkout() && !is_ajax()){
    if ($product->is_type('simple') || $product->is_type('variation')) {
        return regularPriceHTML_for_simple_and_variation_product($price, $product);
    }
    // }
    return $price;
}

function regularPriceHTML_for_simple_and_variation_product($price, $product)
{
    return wc_price($product->get_price());
}



/**
 * start container div tag before single product layout
 */
function inesmktplc_wc_start_container_tag()
{
    echo '<!-- start content container wrapper -->
          <section class="single-product-desc single-product-desc2">
          <div class="container">
          <div class="row">
          <div class="col-lg-8">';
}

/**
 * end container div tag before single product layout
 */
function inesmktplc_wc_close_container_tag()
{
    echo '</div>';
    echo '<div class="col-lg-4">';
    echo '<aside class="sidebar sidebar--single-product">';
    wc_get_template('single-product/sidebar-single-product.php');
    echo '</div></aside>';
    echo '</div></div></section>';
}

/**
 * @snippet       Display &quot;FREE&quot; if WooCommerce Product Price is Zero or Empty - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=73147
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.5.3
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
function inesmktplc_wc_price_to_custom_string($price, $product)
{
    if ('' === $product->get_price() || 0 == $product->get_price()) {
        // $price = '<span class="woocommerce-Price-amount amount">' . strtoupper(__('free', 'inesmktplc')) . '</span>';
        $price = strtoupper(__('free', 'inesmktplc'));
    } else {
        // $price = '<span class="woocommerce-Price-amount amount">' . strtoupper(__('on demand', 'inesmktplc')) . '</span>';
        $price = strtoupper(__('on demand', 'inesmktplc'));
    }
    return $price;
}

/**
 * remove some tabs from single product page
 */
function inesmktplc_wc_remove_product_tabs($tabs)
{
    unset($tabs['additional_information']);    // Remove the additional information tab
    return $tabs;
}

/**
 * show related products fullwidth in single product page
 */
function inesmktplc_wc_show_related_products_fullwidth()
{
    echo do_shortcode('[related_products limit="4"]');
}

/**
 * show call to action section in single product page
 */
function inesmktplc_wc_show_call_to_action_fullwidth()
{
    get_template_part('template-parts/call-to-action-fullwidth');
}


/**
 * remove default breadcrumb template
 * add custom breadcrumb template part
 */
function inesmktplc_wc_add_breadcrumb_area()
{
    if (is_product()) {
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
        get_template_part('template-parts/breadcrum-area-product-fullwidth');
    }
}

/**
 * remove breadcrums section from shop / cat pages
 */
function inesmktplc_wc_remove_breadcrumb_area()
{
    if (!is_product()) {
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    }
}

/**
 * add custom header in shop page
 */
function inesmktplc_wc_search_header()
{
    if (!is_product()) {
        get_template_part('template-parts/header-search-fullwidth');
    }
}

/**
 * add custom filter bar in shop page
 */
function inesmktplc_wc_filter_bar()
{
    get_template_part('template-parts/shop-filter-fullwidth');
}


/**
 * add starting section
 * and container
 * tags to shop page
 */
function inesmktplc_wc_shop_container_start()
{
    echo <<<EOL
<section class="products section--padding2">
<!-- start container -->
<div class="container">
EOL;
}

/**
 * add starting first row tag to shop page
 */
function inesmktplc_wc_shop_main_row_start()
{
    echo '<div class="row">';
}


/**
 * add sidebar if exists
 * if not product grid will take the
 * 100% of the width (set in loop-start.php )
 */
function inesmktplc_wc_shop_sidebar_in()
{
    // if ( !is_shop() ) {
        if (is_active_sidebar('inesmktplc-sidebar-shop')) {
            echo '<div class="col-lg-3">';
            echo '<aside class="sidebar product--sidebar">';
            dynamic_sidebar('inesmktplc-sidebar-shop');
            echo '</aside>';
            echo '</div>';
        };
    // };
}

/**
 * add endinging first row tag to shop page
 */
function inesmktplc_wc_shop_main_row_end()
{
    echo '</div>
          <!-- end /.row -->';
}


/**
 * add closing container
 * and section
 * tags to shop page
 */
function inesmktplc_wc_shop_container_end()
{
    echo    '</div>
            <!-- end /.container -->
                </section>';
}


/**
 * custom items per page dropdown
 * intended to show in products page
 * 
 */
function inesmktplc_wc_items_per_page_dropdown()
{
  $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
  echo '<select name="price" onchange="if (this.value) window.location.href=this.value">';
  echo '<option disabled selected>' . __('Items per page', 'inesmktplc') . '</option>';
  $orderby_options = array(
    '9' => '9',
    '15' => '15',
    '30' => '30'
  );
  foreach ($orderby_options as $value => $label) {
    echo "<option " . selected($per_page, $value) . " value='?perpage=$value'>$label " . __('items per page', 'inesmktplc') . "</option>";
  }
  echo '</select>';
  echo '<span class="lnr lnr-chevron-down"></span>';
}
