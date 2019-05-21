<?php
/**
 * @override INES CRM MARKETPLACE
 * 
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}


$post_object = get_post($product->get_id());

setup_postdata($GLOBALS['post'] = &$post_object);

$second_thumb = MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'secondary-image');

?>
<div class="col-lg-4 col-sm-6 col-12">
	<!-- start .single-product -->
	<div <?php wc_product_class('product--card product--card-small', $product); ?>>
		<!-- start product__thumbnail -->
		<div class="product__thumbnail">
			<?php
			// this is the default product thumbnail
			//echo woocommerce_get_product_thumbnail();

			// show different thumbnail than featured image

			if (class_exists('MultiPostThumbnails') && $second_thumb ) {
				MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
			} else {
				echo woocommerce_get_product_thumbnail();
			}
			?>

			<div class="prod_btn">
				<a href="<?php echo get_permalink($post_object); ?>" class="transparent btn--sm btn--round"><?php esc_html_e('More info', 'inesmktplc'); ?></a>
				<!-- <a href="single-product.html" class="transparent btn--sm btn--round">Demo</a> -->
			</div>
			<!-- end /.prod_btn -->
		</div>
		<!-- end /.product__thumbnail -->

		<!-- start product-desc -->
		<div class="product-desc">
			<a href="<?php echo get_permalink($post_object); ?>" class="product_title">
				<h4><?php echo $product->get_title(); ?></h4>
			</a>
			<ul class="titlebtm">
				<li>
					<!-- <img class="auth-img" src="images/auth3.jpg" alt="author image"> -->
					<p>
						<a href="<?php echo get_permalink($post_object); ?>">
							<?php 
							$short_desc = $product->get_short_description();
							echo mb_strimwidth($short_desc, 0, 50, '...' ); 
							?>
						</a>
					</p>
				</li>
			</ul>
		</div>
		<!-- end /.product-desc -->

		<!-- start product-purchase -->
		<div class="product-purchase">
			<div class="price_love">
				<span><?php echo $product->get_price_html(); ?></span>
			</div>
			<div class="first-category">
				<span class="lnr lnr-list"></span>
				<?php echo inesmktplc_get_the_term_list_first_result($post_object, 'product_cat'); ?>
			</div>
		</div>
		<!-- end /.product-purchase -->

	</div>
	<!-- end /.single-product -->
</div>