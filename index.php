<?php get_header(); ?>

    <div class="page-index page-container">

        <section class="hero" data-scroll-section>
            <div class="container">
                <h1 class="hero__title intro-reveal">
                    <div class="line"><span class="reveal-element"><?php the_title(); ?></span></div>
                </h1>
            </div>
        </section>
        
        <section class="content" data-scroll-section>
            <div class="container<?php if(is_cart() || is_checkout() || is_account_page()){echo ' woocommerce__container';} ?>">
                <?php 
                    while(have_posts()): the_post();
                        the_content(); 
                    endwhile;
                ?>
            </div>
            
            <?php 
            // ENCART HIPLI
            if(is_cart() || is_checkout()){
                get_template_part('./template-parts/encart-hipli');
            }
            ?>
        </section>

        
    </div>

<?php get_footer(); ?>