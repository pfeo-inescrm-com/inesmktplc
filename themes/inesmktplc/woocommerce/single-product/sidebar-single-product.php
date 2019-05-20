<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

$pid = $product->get_id();
// get product attributes
$pattrs = $product->get_attributes();

?>
<pre><? php ?></pre>

<div class="sidebar-card card-pricing">
    <div class="price">
        <p class="h1">
            <?php echo $product->get_price_html(); ?>
        </p>
    </div>
    <div class="purchase-button">
        <a href="<?php echo do_shortcode('[add_to_cart_url id=' . $pid . ']') ?>" class="btn btn--lg btn--round">Install</a>
    </div>
    <!-- end /.purchase-button -->
</div>
<!-- end /.sidebar--card -->

<div class="sidebar-card card--product-infos">
    <div class="card-title">
        <h4>Product Information</h4>
    </div>

    <ul class="infos">
        <!-- display category -->
        <li>
            <p class="data-label">Category</p>
            <p class="info">
                <?php echo wc_get_product_category_list($pid, ', '); ?>
            </p>
        </li>
        
        <!-- display rest of the product attributes -->
        <?php

        if (!$pattrs) {
            _e('No attributes', 'inesmktplc');
        }

        // iterate product attributes
        foreach ($pattrs as $attribute) {
            // get attributes given names
            $attribute_label_name = $attribute->get_taxonomy_object()->attribute_label;
            // get array of attributes given values
            $attribute_terms = $attribute->get_terms();
            echo '<li>';
            echo '<p class="data-label">';
            echo $attribute_label_name;
            echo '</p>';
            echo '<p class="info">';
            // iterate values
            foreach ($attribute_terms as $terms) {
                $attribute_value = $terms->name;
                echo $attribute_value;
                echo '<br>';
            }
            echo '</p>';
            echo '</li>';
        }
        ?>

        <!-- <li>
            <p class="data-label">Compatibility</p>
            <p class="info">V3.Extend</p>
        </li>
        <li>
            <p class="data-label">Mobility</p>
            <p class="info">No</p>
        </li>
        <li>
            <p class="data-label">Developer</p>
            <p class="info">INES</p>
        </li>
        <li>
            <p class="data-label">Founnisser?</p>
            <p class="info">Outlook</p>
        </li>
        <li>
            <p class="data-label">Integration type</p>
            <p class="info">Native</p>
        </li>
        <li>
            <p class="data-label">Technical Prerequisites</p>
            <p class="info">1, 2, 3</p>
        </li> -->
    </ul>
</div>