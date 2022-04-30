<?php
/**
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

// Marque
$marque = get_the_terms( get_the_ID() , 'marque')[0];
if($marque){
	$marque_name = $marque->name;
	$marque_slug = $marque->slug;
	$marque_link = get_term_link( $marque->term_id, 'marque' );	
}


// Categorie
$categories = get_the_terms( get_the_ID(), 'product_cat' );
foreach ($categories as $category){
	// Vérifie que la catégorie n'est pas une catégorie parent
	if($category->parent !== 0){
		$product_category = $category;
		break;
	}
}
$category_name = $product_category->name;
$category_slug = $product_category->slug;
$category_link = get_term_link( $product_category->term_id, 'product_cat' );

?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	

	<div class="hero" id="hero">

		<!-- INTRO MOBILE -->
		<div class="hero__intro-mobile">
			<div class="container">
				<p class="title"><?php the_title(); ?></p>
				<p class="marque"><a href="<?= $marque_link; ?>"><?= $marque_name; ?></a></p>
				<p class="prix"><?= $product->get_price_html(); ?></p>
			</div>
		</div>
		

		<!-- GALLERY -->
		<div class="hero__gallery-container" data-scroll data-scroll-sticky data-scroll-target=".hero__text-container">
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			// do_action( 'woocommerce_before_single_product_summary' );

			$main_image = get_post_thumbnail_id( get_the_ID() );
			$gallery = $product->get_gallery_image_ids();

			?>

			<div class="swiper swiper-gallery-product">
				<div class="swiper-wrapper">
					<!-- Image principale -->
					<div class="swiper-slide">
						<div class="img-container">
							<?= wp_get_attachment_image($main_image, 'large'); ?>
						</div>
					</div>

					<!-- Gallery -->
					<?php 
					if($gallery):
						foreach($gallery as $image):
					?>
					<div class="swiper-slide">
						<div class="img-container">
							<?= wp_get_attachment_image($image, 'large'); ?>
						</div>
					</div>
					<?php 
						endforeach;
					endif; ?>
				</div>
			</div>

			<?php if($gallery): ?>
			<div class="btn-arrow arrow-left swiper-button-prev link"></div>
			<div class="btn-arrow arrow-right swiper-button-next link"></div>
			<?php endif; ?>

			<div class="reveal-wipe" data-scroll></div>
		</div>


		<!-- TEXTE -->
		<div class="hero__text-container" data-scroll>
			<?php 
			/**
			* Hook: woocommerce_before_single_product.
			*
			* @hooked woocommerce_output_all_notices - 10
			*/
			do_action( 'woocommerce_before_single_product' );
			?>
					
			<h1 class="title intro-reveal">
				<div class="line"><span class="reveal-element"><?php the_title(); ?></span></div>
			</h1>

			<div class="content">
				<p class="marque"><a href="<?= $marque_link; ?>"><?= $marque_name; ?></a></p>
				<div class="prix"><?= $product->get_price_html(); ?></div>
				<div class="description__principale description">
					<?php the_content(); ?>
				</div>
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				if($marque_slug === "archiduchesse"){
					echo '<p class="dispo-en-boutique">Produit disponible uniquement dans notre boutique à Nantes</p>';
				} else {
					do_action( 'woocommerce_single_product_summary' );
				}
				
				?>
				<!-- Icones -->
				<?php
				$icones = get_the_terms( get_the_ID(), 'icone' );
				if($icones):
				?>
				<div class="description__icones description">
					<h2 class="description__title">Pourquoi nous aimons cet article ?</h2>
					<ul class="description__icones__list">
						<?php
						foreach($icones as $key=>$icone):
							$name = $icone->name;
							$picto = get_field('icone_noire', 'icone_' . $icone->term_id);
							$link = get_term_link($icone->term_id, 'icone');
							$width = $picto['width'] / 2;
						?>
						<li class="description__icones__item">
							<div class="description__icones__img-container">
								<a href="<?= $link ?>"><img src="<?= $picto['sizes']['medium'] ?>" alt="<?= $name ?>" width="<?= $width ?>"></a>
							</div>
							<p><?= $name; ?></p>
						</li>
						<?php
						endforeach;
						?>
					</ul>
				</div>
				<?php endif; ?>
				<!-- Détails -->
				<?php
				$details = get_field('details');
				if($details):
				?>
				<div class="description__details description">
					<h2 class="description__title">Détails</h2>
					<div><?= $details ?></div>
				</div>
				<?php endif; ?>
				<!-- Entretien -->
				<?php
				$entretien = get_field('entretien');
				if($entretien):
				?>
				<div class="description__details description">
					<h2 class="description__title">Entretien</h2>
					<div><?= $entretien ?></div>
				</div>
				<?php endif; ?>
			</div>

		</div>

	</div>


	<section class="reassurance">
		<div class="container">
			<p class="reassurance__item">Frais de port offert dès XX € d’achat</p>
			<p class="reassurance__item">Retour gratuit sous xx jours</p>
			<p class="reassurance__item">Récupérez votre article en boutique avec le click & collect</p>
			<p class="reassurance__item">Choisissez une livraison responsable avec Hipli</p>
		</div>
	</section>


	<!-- RELATED PRODUCTS -->
	
	<section class="produits-related">
		<?php
		$args = array(
			'post_type'              => array( 'product' ),
			'posts_per_page'         => '3',
			'post_status'    => 'publish',
			'post__not_in'	=> array(get_the_ID()),
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $category_slug,
				),
			),
			'meta_query' => array(
				array(
					'key' => '_stock_status',
					'value' => 'instock'
				)
			)
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
		?>
		
		<div class="container">
			<h2 class="produits-related__title">Vous pourriez aussi aimer...</h2>
		</div>

		<div class="produits-related__container">
			<div class="swiper swiper-list-products">
				<div class="swiper-wrapper">
					<?php
					$index = 0;

					while ( $query->have_posts() ) :
						$query->the_post();

						$delay = 0.25 + $index * 0.15;
						$args = [
							'delay'=>$delay
						];

						get_template_part('./template-parts/card-product', 'card-product', $args);

						$index++;
					endwhile;
					?>  

					<div class="swiper-slide last-slide">
						<p>D’autres articles</p>
						<a href="<?= $category_link ?>" class="btn-secondary"><?= $category_name ?></a>
					</div>

				</div>
			</div>
		</div>

		<?php else : ?>

		<div class="container produits-related__btn-boutique">
			<h2 class="produits-related__title">Découvrez tous nos produits</h2>
			<a href="<?= get_site_url() ?>/boutique" class="btn-primary">Voir la boutique</a>
		</div>
		
		<?php
			endif;
			wp_reset_postdata();
		?>
    </section>

	
		
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
