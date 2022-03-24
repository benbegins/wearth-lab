<?php 
get_header(); ?>

    <div class="page-boutique page-container">
        <!-- Catégories -->
        <section class="categories" data-scroll-section>
            <div class="categories__container container">
                <!-- femme -->
                <a href="<?= get_site_url() ?>/categorie-produit/femme" class="categories__link femme">
                    <div class="img-container">
                        <img src="<?= get_template_directory_uri(  ) ?>/src/img/cat-femme.jpg" alt="Boutique femme">
                        <h2 class="categories__title-container">
                            <div class="categories__title">Femme</div>
                        </h2>
                    </div>
                </a>
                <!-- homme -->
                <a href="<?= get_site_url() ?>/categorie-produit/homme" class="categories__link homme">
                    <div class="img-container">
                        <img src="<?= get_template_directory_uri(  ) ?>/src/img/cat-homme.jpg" alt="Boutique homme">
                        <h2 class="categories__title-container">
                            <div class="categories__title">Homme</div>
                        </h2>
                    </div>
                </a>
            </div>
            <div class="container">
                <p class="categories__text">La boutique Wearth Lab est un laboratoire de découvertes qui garantie, à la manière d’un label, des articles avec une démarche sincère dans leurs moyens de production.</p>
            </div>
        </section>

        <!-- Par marque -->
        <section class="marques" data-scroll-section>
            <div class="container">
                <h2 class="page-sub-title" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-0.5">Par marque</h2>
            </div>
            <!-- Liste marques -->
            <div class="swiper swiper-list-marques">
                <div class="swiper-wrapper">
                    
                    <?php 
                    $args = [
                        'taxonomy' => 'marque',
                        'hide_empty' => false,
                    ];
                    $marques = get_terms($args); 

                    foreach($marques as $key=>$marque):
                        
                        $delay = 0.25 + $key * 0.15;
                        $params = [
                            'marque'=>$marque,
                            'delay'=>$delay,
                        ]
                    ?>

                        <div class="swiper-slide">
                            <?php get_template_part( './template-parts/card-marque', 'card-marque', $params) ?>
                        </div>

                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="btn-arrow arrow-left swiper-button-prev link"></div>
                <div class="btn-arrow arrow-right swiper-button-next link"></div>
            </div>
            <!-- BTN -->
            <div class="container marques__btn">
                <a href="<?= get_site_url() ?>/marques" class="btn-primary">Toutes les marques</a>
            </div>
        </section>

        <!-- Par icone -->
        <section class="icones" data-scroll-section>
            <div class="container">
                <h2 class="page-sub-title" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-0.5">Par enga<span class="mobile">-<br></span>gement</h2>
                <?php get_template_part('/template-parts/icones-list'); ?>
            </div>
        </section>
    </div>

<?php get_footer(); ?>