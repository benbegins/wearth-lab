<?php get_header(); ?>

    <main class="page-home">

        <!-- HERO -->
        <section class="hero" data-scroll-section>
            <div class="container">
                <div class="hero__title-container">
                    <h1 class="hero__title intro-reveal">
                        <div class="line" data-scroll data-scroll-direction="horizontal" data-scroll-speed="1"><span class="reveal-element">La <br><span class="green">mode</span></span></div>
                        <div class="line" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-1"><span class="reveal-element">respon<br>sable</span></div>
                        <p class="line hero__subtitle"><span class="reveal-element">à Nantes</span></p>
                    </h1>
                    
                </div>
            </div>
            <div class="hero__rs" data-scroll>
                <?php
                $instagram = get_field("instagram", "option");
                $facebook = get_field("facebook", "option");
                ?>
                <a href="<?= $instagram ?>" class="instagram" target="_blank">Insta</a>
                <a href="<?= $facebook ?>" class="facebook" target="_blank"></a>
            </div>
        </section>


        <!-- PRODUITS -->
        <?php
        $args = array(
            'post_type'              => array( 'product' ),
            'posts_per_page'         => '4',
            'post_status'    => 'publish',
            'meta_query' => array(
                array(
                    'key' => '_stock_status',
                    'value' => 'instock'
                )
            ),
            'post__in'            => wc_get_featured_product_ids(),
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
        ?>
        <section class="produits" data-scroll-section>
            <div class="produits__container">
                <div class="swiper swiper-list-products" data-scroll data-scroll-repeat="true" data-scroll-offset="10%">
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
                    </div>
                </div>
            </div>
            <div class="container link-container">
                <a href="<?= get_site_url() ?>/boutique" class="btn-primary">Voir la boutique</a>
            </div>
        </section>
        <?php
        endif;
        wp_reset_postdata();
        ?>


        <!-- A LA UNE -->
        <?php 
        $a_la_une_exist = get_field('info_a_la_une');
        if($a_la_une_exist):

            $a_la_une = get_field('a_la_une');
            if($a_la_une){
                $image = $a_la_une['image'];
                $titre = $a_la_une['titre'];
                $texte = $a_la_une['texte'];
                $lien = $a_la_une['lien'];   
            }
        ?>
        <section class="a-la-une" data-scroll-section>
            <div class="container">
                <div class="right">
                    <div>
                        <div class="img-container">
                            <?php 
                            $args = [
                                'data-scroll' => '',
                                'data-scroll-speed' => '-0.5',
                                'sizes' => '(max-width:768px) 100vw, 50vw'
                            ];
                            ?>
                            <?= wp_get_attachment_image($image['id'], 'large', false, $args); ?>
                            <div class="reveal-wipe" data-scroll></div>
                        </div>
                    </div>
                    <h2 class="a-la-une__section-title desktop fade" data-scroll data-scroll-speed="-0.5">
                        <div class="title">À la une</div>
                    </h2>
                </div>
                <div class="left" data-scroll data-scroll-speed="0.5">
                    <h2 class="a-la-une__section-title mobile">À la une</h2>
                    <h3 class="a-la-une__title"><?= $titre ?></h3>
                    <div class="a-la-une__text"><?= $texte ?></div>
                    <a href="<?= $lien['url'] ?>" class="btn-primary">Découvrir</a>
                </div>
            </div>
        </section>
        <?php endif; ?>


        <!-- ICONES -->
        <section class="icones" data-scroll-section>
            <div class="container">
                <h2 class="icones__title fade" data-scroll>La boutique Wearth Lab est un laboratoire de découvertes qui garantit, à la manière d’un label, des articles avec une démarche sincère dans leurs moyens de production.</h2>
                <?php get_template_part('./template-parts/icones-list'); ?>
                <a href="<?= get_site_url() ?>/a-propos" class="btn-primary">Découvrir le concept</a>
            </div>
        </section>


        <!-- MARQUES -->
        <section class="marques" data-scroll-section>
            <!-- Intro -->
            <div class="container intro fade" data-scroll>
                <div class="left">
                    <h2 class="intro__title">
                        <span data-scroll data-scroll-direction="horizontal" data-scroll-speed="0.25">Les</span> <br>
                        <span data-scroll data-scroll-direction="horizontal" data-scroll-speed="-0.25">marques</span>
                    </h2>
                </div>
                <div class="right">
                    <h3 class="intro__sub-title">Des marques engagées</h3>
                    <p class="intro__paragraph">Chez Wearth Lab, nous ne confondons pas greenwashing et engagement environnemental. C’est pourquoi nous ne collaborons qu’avec des marques françaises, investies dans une véritable démarche éthique et éco-responsable, qui produisent dans des ateliers contrôlés à moins de 2500km de Nantes !</p>
                </div>
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

            <div class="container marques__btn">
                <a href="<?= get_site_url() ?>/marques" class="btn-primary">Toutes les marques</a>
            </div>
            
        </section>


        <!-- BOUTIQUE -->
        <section class="boutique" data-scroll-section>
            <div class="boutique__wrapper">
                <div class="femme">
                    <a href="<?= get_site_url() ?>/categorie-produit/femme">
                        <div class="img-container">
                            <img src="<?= get_template_directory_uri(  ) ?>/src/img/cat-femme.jpg" alt="Boutique femme" data-scroll data-scroll-speed="-0.5">
                            <div class="over"></div>
                            <div class="reveal-wipe" data-scroll></div>
                        </div>
                    </a>
                    <div class="title__container">
                        <div class="title fade" data-scroll data-delay=".25">Femme</div>
                    </div>
                    <a href="" class="btn-secondary">Boutique femme</a>
                </div>
                <div class="homme">
                    <a href="<?= get_site_url() ?>/categorie-produit/homme">
                        <div class="img-container">
                            <img src="<?= get_template_directory_uri(  ) ?>/src/img/cat-homme.jpg" alt="Boutique homme" data-scroll data-scroll-speed="-0.5">
                            <div class="over"></div>
                            <div class="reveal-wipe" data-scroll data-delay="0.3"></div>
                        </div>
                    </a>
                    <div class="title__container">
                        <div class="title fade" data-scroll data-delay=".35">Homme</div>
                    </div>
                    <a href="" class="btn-secondary">Boutique homme</a>
                </div>
            </div>
        </section>
        
    </main>

<?php get_footer(); ?>