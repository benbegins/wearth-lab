<?php get_header(); ?>

    <div class="page-search page-container">

        <section class="hero" data-scroll-section>
            <div class="container">
                <form action="/" method="get" class="form-search">
                    <input type="text" placeholder="Rechercher un produit" value="<?php the_search_query(); ?>" name="s" />
                    <input type="submit" value="Rechercher">
                </form>
            </div>
        </section>

        <section class="liste-produits" data-scroll-section>
            <?php
            $args = [
                "post_type" => ["product"],
                'meta_query' => array(
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock'
                    )
                    ),
                "s" => $s,
            ];

            $produits = new WP_Query($args);
            if ($produits->have_posts()) :
            ?>

            <div class="container liste-produits__container">
                <?php
                while ($produits->have_posts()) :
                    $produits->the_post();
                    get_template_part( '/template-parts/card-product');
                endwhile;
                ?>
            </div>

            <?php else : ?>
            <div class="container">
                <p class='no-result'>Aucun résultat pour <?= $s ?></p>
            </div>
            <?php endif; ?>
        </section>
    </div>

<?php get_footer(); ?>