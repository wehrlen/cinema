<?php get_header() ?>



<div class="container page-properties">
    <div class="search-form">
        <h1 class="search-form__title">Films et court métrages</h1>
        <p>Retrouver ici tout mes projets</p>
        <hr>
    </div>

    <?php $i = 0;
    while (have_posts()) : the_post(); ?>
        <?php set_query_var('property-large', $i === 7); ?>
        <?php get_template_part('template-parts/property') ?>
    <?php $i++;
    endwhile; ?>
</div>

<?php if (get_query_var('paged', 1) > 1) : ?>
    <?= agencia_paginate() ?>
<?php elseif($nextPostLink = get_next_posts_link(__('More properties +', 'agencia'))) : ?>
    <div class="pagination">
        <?= $nextPostLink ?>
    </div>
<?php endif ?>


<?php get_footer() ?>