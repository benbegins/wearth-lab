<?php 
get_header(); 
$term = $wp_query->queried_object;

?>

    <div class="taxonomy-marque page-container">
        <section class="hero" data-scroll-section>
            <div class="container">
                <h1 class="hero__title intro-reveal">
                    <?php 
                        $title = single_term_title("", false);
                    ?>
                    <div class="line"><span class="reveal-element"><?= strtolower($title) ?></span></div>
                </h1>
                <div class="hero__text"><?php the_archive_description(); ?></div>
            </div>
        </section>

        <section class="liste-produits" data-scroll-section>
            <div class="container liste-produits__container">
                <?php
                $args = [
                    "post_type" => ["product"],
                    'posts_per_page'        => -1,
                    "tax_query" => [
                        [
                            "taxonomy" => "marque",
                            "field" => "slug",
                            "terms" => $term->slug,
                        ],
                    ],
                    'meta_query' => array(
                        array(
                            'key' => '_stock_status',
                            'value' => 'instock'
                        )
                    )
                ];

                $produits = new WP_Query($args);

                if ($produits->have_posts()) {
                    while ($produits->have_posts()) {
                        $produits->the_post();

                        get_template_part( '/template-parts/card-product');
                    }
                } else {
                    echo "Pas de produit à afficher";
                }
                ?>
            </div>
            <div class="container btn-container">
                <a href="<?= get_site_url() ?>/marques" class="btn-primary">Voir toutes nos marques</a>
            </div>
        </section>

        
    </div>

<?php get_footer(); ?>