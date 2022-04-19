<?php 
get_header(); 
$cat = get_queried_object();
$parent = $cat->parent ? get_term($cat->parent, 'product_cat') : null;
$title = single_term_title("", false);
                        

if($parent){
    $name = $parent->name;
    $link = get_term_link( $parent->term_id, 'product_cat' );
}
?>

    <div class="archive-product page-container">
        
    
        <?php if($cat->parent === 0): ?>
        <!-- HERO CATEGORIE -->
        <section class="hero" data-scroll-section>
            <div class="container">
                <!-- Titre -->
                <div class="hero__title-container">                   
                    <h1 class="hero__title intro-reveal">
                        
                        <div class="line"><span class="reveal-element"><?= strtolower($title) ?></span></div>
                    </h1>
                </div>

                <!-- Menu sous catégories -->
                <div class="sub-cat" :class="{active: menuSubCat}">
                    <button class="sub-cat__button" @click="toggleSubMenu('sub-cat')">Catégories</button>

                    <div class="sub-cat__menu">
                        <div class="sub-cat__menu-container">
                            <button class="sub-cat__btn-close" @click="toggleSubMenu('sub-cat')">Fermer</button>
                            <p class="sub-cat__title">Catégories</p>
                            <ul class="sub-cat__list">
                                <?php
                                $args = [
                                    'taxonomy'=>'product_cat',
                                    'parent'=>$cat->term_id,
                                    "orderby" => "name",
                                ];
                                $sub_categories = get_terms($args);
                                foreach($sub_categories as $category):
                                    $name = $category->name;
                                    $link = get_term_link( $category->term_id, 'product_cat' );
                                ?>
                                <li class="sub-cat__item">
                                    <a href="<?= $link ?>"><?= $name ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <?php endif; ?>


        <?php if($parent): ?>
        <!-- HERO SOUS CATEGORIE -->
        <section class="hero-subcat" data-scroll-section>
            <div class="container">
                <div class="hero-subcat__title-container">

                    
                    <p class="hero-subcat__sub-title">
                        <a href="<?= $link ?>"><?= $name; ?></a>
                    </p>
                   

                    <h1 class="hero-subcat__title intro-reveal">
                        <div class="line"><span class="reveal-element"><?= strtolower($title) ?></span></div>
                    </h1>

                </div>
            </div>
        </section>
        <?php endif; ?>


        <!-- Liste produits -->
        <section class="liste-produits" data-scroll-section>
            <div class="container liste-produits__container">
                <?php
                $cateID = get_queried_object()->term_id;
                $args = array(
                    'post_type'              => array( 'product' ),
                    'posts_per_page'         => -1,
                    'post_status'            => array( 'publish' ),
                    'orderby'               => 'rand',
                    'tax_query'      		=> array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'id',
                            'terms'    => $cateID,
                        ),
                    ),
                    'meta_query' => array(
                        array(
                            'key' => '_stock_status',
                            'value' => 'instock'
                        )
                    )
                );
                $query = new WP_Query($args);


                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();

                        get_template_part( '/template-parts/card-product');
                    }
                } else {
                    echo "Pas de produit à afficher";
                }
                ?>
            </div>
        </section>

        
    </div>

<?php get_footer(); ?>