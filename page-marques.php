<?php get_header(); ?>

    <div class="page-marques page-container">

        <section class="hero" data-scroll-section>
            <div class="container">
                <h1 class="hero__title intro-reveal">
                    <div class="line"><span class="reveal-element">Les marques</span></div>
                </h1>
                <p class="hero__text">Chez Wearth Lab, nous ne confondons pas greenwashing et engagement environnemental. C’est pourquoi nous ne collaborons qu’avec des marques françaises, investies dans une véritable démarche éthique et éco-responsable, qui produisent dans des ateliers contrôlés à moins de 2500km de Nantes !</p>
            </div>
        </section>

        <section class="list-marques" data-scroll-section>
            <div class="container">
                <ul class="list-marques__list">
                    <?php 
                    $args = [
                        'taxonomy' => 'marque',
                    ];
                    $marques = get_terms($args);
                    
                    if($marques):
                        foreach($marques as $marque):

                            $name = $marque->name;
                            $link = get_term_link( $marque->term_id, 'marque' );
                    ?>

                    <li class="list-marques__item">
                        <a href="<?= $link ?>"><?= $name ?></a>
                    </li>
                        
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </ul>
            </div>
        </section>
        
    </div>

<?php get_footer(); ?>