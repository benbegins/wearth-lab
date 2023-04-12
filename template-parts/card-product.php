<?php 
global $product; 

if(isset($args['delay'])){
    $delay = $args['delay'];
} else {
    $delay = 0;
}
?>

<div class="card-product swiper-slide">
    <!-- Image -->
    <a class="img-link" href="<?php the_permalink(); ?>">
        <div class="img-container fade" data-scroll data-delay="<?= $delay ?>">
            <?php 
            if(get_post_thumbnail_id ()){
                the_post_thumbnail('medium', ['class' => 'card-product__img', 'sizes' => '(max-width:640px) 100vw, (max-width:768px) 50vw, 33vw']);
            } else{
                echo 'Pas de visuel';
            }
             ?>

            <!-- Icones -->
            <?php 
            $icones = get_the_terms(get_the_ID(), 'icone');
            if($icones):
            ?>
            <div class="card-product__icones-list">
                <?php
                    foreach($icones as $icone):
                        $name = $icone->name;
                        $picto = get_field('icone_blanche', 'icone_' . $icone->term_id);
                        $width = $picto['width'] / 3.25;
                ?>
                <img class="card-product__icone-img" src="<?= $picto['sizes']['thumbnail'] ?>" alt="<?= $name ?>" title="<?= $name ?>" width="<?= $width ?>">
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
             
        </div>
    </a>
    <!-- Product infos -->
    <div class="card-product__infos">
        <?php
        $marque = get_the_terms( get_the_ID() , 'marque');
        if($marque){
            $name = $marque[0]->name;
            $link = get_term_link($marque[0]->term_id, 'marque');
        }
        
        ?>
        <a class="card-product__marque" href="<?= $link; ?>"><?= $name; ?></a>
        <div class="card-product__title-price">
            <p class="card-product__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            <p class="card-product__price"><?php echo $product->get_price_html(); ?></p>
        </div>
        <div class="card-product__variation">
            <?php            
            if ( $product->is_type( 'variable' )){
                foreach( $product->get_available_variations() as $variation){

                    $the_variation = new WC_Product_Variation($variation['variation_id']);
                    $variationName = implode(" / ", $the_variation->get_variation_attributes());

                    if ($variation['is_in_stock']){
                        echo '<span class="in-stock">' . $variationName . '</span>';
                    }
                    // else {
                    //     echo '<span class="not-in-stock">' . $variationName . '</span>';
                    // }
                }
            }
            ?>
        </div>
    </div>
</div>
