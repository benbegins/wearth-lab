<?php 
/*
Template Name: Page de textes
*/
get_header(); ?>

    <div class="page-textes page-container">

        <section class="hero" data-scroll-section>
            <div class="container">
                <h1 class="hero__title intro-reveal">
                    <div class="line"><span class="reveal-element"><?php the_title(); ?></span></div>
                </h1>
            </div>
        </section>
        
        <section class="content" data-scroll-section>
            <div class="container">
                <?php 
                    while(have_posts()): the_post();
                        the_content(); 
                    endwhile;
                ?>
            </div>
        </section>
    </div>

<?php get_footer(); ?>