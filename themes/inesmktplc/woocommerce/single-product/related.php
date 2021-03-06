<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$second_thumb = MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'secondary-image');

if ( $related_products ) : ?>

<!--============================================
						START RELATED PRODUCTS
							==============================================-->
<section class="more_product_area section--padding">
	<div class="container">
		<div class="row">
			<!-- start col-md-12 -->
			<div class="col-md-12">
				<div class="section-title">

					<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
					<h2><?php echo esc_html( $heading ); ?></h2>
					<?php endif; ?>

				</div>
			</div>
			<!-- end /.col-md-12 -->





			<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

			<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					// wc_get_template_part( 'content', 'product' );
					?>


			<!-- start .col-lg-4 col-md-6 -->
			<div class="col-lg-3 col-md-6 mb-5">

				<!-- start .single-product -->
				<div class="product product--card product--card-small">
					<!-- start product__thumbnail -->
					<div class="product__thumbnail">
						<?php
// this is the default product thumbnail
//echo woocommerce_get_product_thumbnail();

// show different thumbnail than featured image
if (class_exists('MultiPostThumbnails') && $second_thumb) {
	MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
} else {
	echo woocommerce_get_product_thumbnail();
}
?>
						<div class="prod_btn">
							<a href="<?php echo get_permalink($post_object); ?>"
								class="transparent btn--sm btn--round"><?php esc_html_e('More info', 'inesmktplc'); ?></a>
							<!-- <a href="single-product.html" class="transparent btn--sm btn--round">Demo</a> -->
						</div>
						<!-- end /.prod_btn -->
					</div>
					<!-- end /.product__thumbnail -->

					<!-- start product-desc -->
					<div class="product-desc">
						<a href="<?php echo get_permalink($post_object); ?>" class="product_title">
							<h4><?php echo $related_product->get_title(); ?></h4>
						</a>
						<ul class="titlebtm">
							<li>
								<!-- <img class="auth-img" src="images/auth3.jpg" alt="author image"> -->
								<p>
									<a href="<?php echo get_permalink($post_object); ?>">
										<?php //echo $related_product->get_short_description(); ?>
										<?php 
$short_desc = $related_product->get_short_description();
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
							<span><?php echo $related_product->get_price_html(); ?></span>
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
			<!-- end /.col-lg-4 col-md-6 -->






			<?php endforeach; ?>

			<?php woocommerce_product_loop_end(); ?>

		</div>
		<!-- end /.row -->
	</div>
	<!-- end /.container -->
</section>
<!--============================================
						END RELATED PRODUCTS
						==============================================-->
<?php
endif;

wp_reset_postdata();