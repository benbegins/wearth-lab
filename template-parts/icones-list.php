<ul class="icones__list">
        <?php
        $args = [
            'taxonomy' => 'icone',
            'hide_empty' => false,
        ];
        $icones = get_terms($args);
        
        foreach($icones as $key=>$icone):
            $name = $icone->name;
            $picto = get_field('icone_noire', 'icone_' . $icone->term_id);
            $link = get_term_link($icone->term_id, 'icone');
            $width = $picto['width'] / 2;
            $delay = 0.1 + $key * 0.03;
        ?>
        <li class="icones__item fade" data-scroll data-delay="<?= $delay ?>">
            <div class="icones__img-container">
                <a href="<?= $link ?>"><img src="<?= $picto['sizes']['medium'] ?>" alt="<?= $name ?>" width="<?= $width ?>"></a>
            </div>
            <p><?= $name; ?></p>
        </li>
        <?php
        endforeach;
        ?>
</ul>