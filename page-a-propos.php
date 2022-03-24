<?php get_header(); ?>

    <div class="page-a-propos page-container">

        <!-- HERO -->
        <section class="hero" data-scroll-section>
            <div class="container">
                <h1 class="hero__title intro-reveal">
                    <div class="line"><span class="reveal-element">Wearth Lab</span></div>
                </h1>
                <div class="hero__text"><?php the_content(); ?></div>
            </div>
        </section>

        <!-- SHOP -->
        <?php 
        $image = get_field('shop_image');
        $title = get_field('shop_titre');
        $text = get_field('shop_texte');
        ?>
        <section class="shop" data-scroll-section>
            <div class="container">
                <div class="shop__wrapper">
                    <div class="left">
                        <div class="shop__img-container">
                            <?php
                            if($image){
                                $args = [
                                    "data-scroll" => "",
                                    "data-scroll-speed"=>"-0.5",
                                ];
                                echo wp_get_attachment_image($image['id'], 'xl', false, $args);
                            }
                            ?>
                            <div class="reveal-wipe" data-scroll></div>
                        </div>
                        <div class="shop__title-container" data-scroll data-scroll-speed="-0.5">
                            <h2 class="shop__title desktop">Shop</h2>
                        </div>
                    </div>
                    <div class="right fade" data-scroll data-scroll-speed="0.5" data-delay="0.25">
                        <h2 class="shop__title mobile">Shop</h2>
                        <h3 class="shop__sub-title"><?php echo $title ? $title : ""; ?></h3>
                        <div class="shop__text"><?php echo $text ? $text : ""; ?></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ICONES -->
        <section class="icones" data-scroll-section>
            <div class="container">
                <h2 class="icones__title">Tous nos articles sont conçus dans le respect de l’environnement et de l’humain.</h2>
                <?php get_template_part('./template-parts/icones-list'); ?>
            </div>
        </section>

        <!-- VALEURS -->
        <?php 
        $image = get_field('valeurs_image');
        $text = get_field('valeurs_texte'); 
        ?>
        <section class="valeurs" data-scroll-section>
            <div class="container">
                <!-- Texte -->
                <div class="left fade" data-scroll data-scroll-speed="0.5" data-delay="0.25">
                    <h2 class="valeurs__title mobile">Valeurs</h2>
                    <div class="valeurs__text"><?php echo $text ? $text : ""; ?></div>
                </div>
                
                <!-- Image -->
                <div class="right">
                    <div class="valeurs__img-container">
                        <?php
                        if($image){
                            $args = [
                                "data-scroll" => "",
                                "data-scroll-speed"=>"-0.5",
                            ];
                            echo wp_get_attachment_image($image['id'], 'xl', false, $args);
                        }
                        ?>
                        <div class="reveal-wipe" data-scroll></div>
                    </div>
                    <div class="valeurs__title-container" data-scroll data-scroll-speed="-0.5">
                        <h2 class="valeurs__title desktop">Valeurs</h2>
                    </div>
                </div>

            </div>
        </section>

        <!-- FONDATEURS -->
        <?php 
        $photo_greg = get_field('photo_greg');
        $photo_delph = get_field('photo_delph');
        $greg = get_field('greg');
        $delph = get_field('delph');

        $args = [
            "data-scroll" => "",
            "data-scroll-speed"=>"-0.5",
        ];
        ?>
        <section class="fondateurs" data-scroll-section>
            <div class="container">
                <h2 class="fondateurs__title">Les <br>fonda<span class="mobile">-</span><br class="mobile">teurs</h2>
                <div class="fondateurs__wrapper">
                    <!-- Greg -->
                    <div class="greg">
                        <div class="greg__container">
                            <div class="fondateurs__img-container">
                                <?= wp_get_attachment_image($photo_greg['id'], 'large', false, $args); ?>
                                <div class="reveal-wipe" data-scroll></div>
                            </div>
                            <h3 class="fondateurs__nom nom-gregory">Gregory</h3>
                            <div class="fondateurs__text-bio">
                                <?= $greg ? $greg : "" ?>
                            </div>
                        </div>
                    </div>
                    <!-- Delph -->
                    <div class="delph">
                        <div class="delph__container">
                            <div class="fondateurs__img-container">
                                <?= wp_get_attachment_image($photo_delph['id'], 'large', false, $args); ?>
                                <div class="reveal-wipe" data-scroll></div>
                            </div>
                            <h3 class="fondateurs__nom nom-delphine">Delphine</h3>
                            <div class="fondateurs__text-bio">
                                <?= $delph ? $delph : "" ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BOUTIQUE -->
        <section class="boutique" data-scroll-section>
            <div class="container">
                <p class="boutique__text">Ensemble, participons à l’essor d’une mode réfléchie et éco-engagée.</p>
                <a href="<?= get_site_url() ?>/boutique" class="btn-primary">Voir la boutique</a>
            </div>
        </section>
        
    </div>

<?php get_footer(); ?>