<?php 
$marque = $args['marque']; 
$name = $marque->name;
$image = get_field('image', 'marque_' . $marque->term_id);
$link = get_term_link( $marque->term_id, 'marque' );
?>

<a href="<?= $link ?>" class="card-marque">
    <div class="img-wrapper">
        <div class="img-container fade" data-scroll data-delay="<?= $args['delay'] ?>">
            <?= wp_get_attachment_image($image['id'], 'medium', false, array('sizes'=>'(max-width:640px) 100vw, 25vw', 'loading'=>'lazy')); ?>
        </div>
    </div>
    <div class="card-marque__title">
       <?= $marque->name; ?>
    </div>
</a>