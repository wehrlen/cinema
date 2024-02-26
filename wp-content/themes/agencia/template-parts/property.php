<?php 
$large = get_query_var('property-large', false) 
?>
<a class="property <?php if ($large === true) { echo 'property--large'; } ?>" href="<?php the_permalink() ?>" title="<?= esc_attr(get_the_title()) ?>">
    <div class="property__image">
        <?php the_post_thumbnail($large === true ? 'property-thumbnail-large' : 'property-thumbnail') ?>
    </div>
    <div class="property__body">
            <div class="property__location"><?php film_city(get_post()) ?></div>
            <h3 class="property__title"><?php the_title() ?></h3>
            <div class="property__price"><?php film_type(get_post()) ?></div>
    </div>
</a>