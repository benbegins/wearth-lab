<?php get_header(); ?>

    <div class="page-contact page-container">

        <section class="hero" data-scroll-section>
            <div class="container">
                <h1 class="hero__title intro-reveal">
                    <div class="line"><span class="reveal-element">Contact</span></div>
                </h1>
                <div class="contact__list">
                    <!-- Adresse -->
                    <div class="contact__list__item adresse">
                        <h2 class="contact__list__title">Adresse</h2>
                        <div class="contact__item__content">
                            <p>Wearth Lab <br>
                            13 rue du château <br>
                            44000 Nantes</p>
                            <a href="https://goo.gl/maps/aRVQKeC54cff8DYk9" class="btn-primary" target="_blank">Voir la carte</a>
                        </div>
                    </div>
                    <!-- Horaires -->
                    <div class="contact__list__item horaires">
                        <h2 class="contact__list__title">Horaires</h2>
                        <div class="contact__item__content">
                            <p><?php the_field("horaires", "option"); ?></p>
                        </div>
                    </div>
                    <!-- Contact -->
                    <div class="contact__list__item contact">
                        <h2 class="contact__list__title">Contact</h2>
                        <div class="contact__item__content">
                            <a href="mailto:hello@wearthlab.fr" class="no-transition">hello@wearthlab.fr</a><br>
                            <a href="tel:+33240757667" class="no-transition">02 40 75 76 67</a>
                        </div>
                    </div>
                    <!-- Suivez-nous -->
                    <div class="contact__list__item suivez-nous">
                        <h2 class="contact__list__title">Suivez-nous</h2>
                        <div class="contact__item__content reseaux">
                            <?php
                            $instagram = get_field("instagram", "option");
                            $facebook = get_field("facebook", "option");
                            ?>
                            <a href="<?= $instagram ?>" class="instagram" target="_blank">Insta</a>
                            <a href="<?= $facebook ?>" class="facebook" target="_blank">Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="map" data-scroll-section>
            <div class="container">
                <div class="map__wrapper">
                    <a href="https://goo.gl/maps/aRVQKeC54cff8DYk9" title="Google Maps" target="_blank" class="map__link">
                        <div class="map__img"></div>
                        <div class="reveal-wipe" data-scroll></div>
                    </a>
                </div>
            </div>
        </section>
        
    </div>

<?php get_footer(); ?>