<?php get_header() ?>

<?php while (have_posts()) : the_post() ?>

  <main class="sections">
    <section>
      <div class="container">
        <div class="search-form">
          <h1 class="search-form__title"><?php the_title() ?></h1>
          <?php the_content() ?>
          <hr>
          <?php get_template_part('template-parts/searchform-property') ?>
        </div>

      </div>
      <?php if($property = get_field('highlighted_property')): ?>
      <div class="highlighted highlighted--home">
        <?= get_the_post_thumbnail($property, 'property-thumbnail-home') ?>
        <div class="highlighted__body">
          <div class="highlighted__title"><a href="<?php the_permalink($property) ?>"><?= get_the_title($property) ?></a></div>
          <div class="highlighted__type"><?php film_type($property) ?></div>
          <div class="highlighted__location"><?php film_city($property) ?></div>
        </div>
      </div>
      <?php endif ?>
    </section>

    <?php if (have_rows('recent_properties')): while(have_rows('recent_properties')): the_row() ?>
    <section class="container">
      <div class="push-properties">
        <div class="push-properties__title"><?php the_sub_field('title') ?></div>
        <?php the_sub_field('description') ?>
        <div class="push-properties__grid">
          <?php
          $query = [
            'post_type' => 'property',
            'posts_per_page' => 2
          ];
          $property = get_field('highlighted_film');
          //var_dump($property);
          if ($property) {
            $query['post__not_in'] = [$property->ID];
          }
          $query = new WP_Query($query);
          while($query->have_posts()){
            $query->the_post();
            get_template_part('template-parts/property');
          }
          wp_reset_postdata();
          ?>
        </div>

        <?php if ($property): ?>
          
        <div class="highlighted">
          <?= get_the_post_thumbnail($property, 'property-thumbnail-home') ?>
          <div class="highlighted__body">
            <div class="highlighted__title"><a href="<?php the_permalink($property) ?>"><?= get_the_title($property) ?></a></div>
            <div class="highlighted__type"><?php film_type($property) ?></div>
            <div class="highlighted__location"><?php film_city($property) ?></div>
            
          </div>
        </div>

        <?php endif ?>

        <a class="push-properties__action btn" href="<?= get_post_type_archive_link('property') ?>">
          <?= __('Tous mes projets', 'agencia') ?>
          <?= agencia_icon('arrow'); ?>
        </a>

      </div>
    </section>
      <?php endwhile; endif ?>

      <?php if (have_rows('quote')): while(have_rows('quote')): the_row() ?>
    <section class="container quote">
      <div class="quote__title"><?php the_sub_field('title') ?></div>
      <div class="quote__body">
        <div class="quote__image">
          <img src="<?php the_sub_field('avatar') ?>" alt="test">
          <div class="quote__author"><?php the_sub_field('cite') ?></div>
        </div>
        <blockquote>
          <?php the_sub_field('content') ?>
        </blockquote>
      </div>

      <?php if($action = get_sub_field('action')): ?>
      <a class="quote__action btn" href="<?= $action['url'] ?>">
        <?= $action['title']; ?>
        <?= agencia_icon('arrow') ?>
      </a>
      <?php endif ?>
    </section>
    <?php endwhile; endif ?>

  </main>
<?php endwhile ?>
<?php get_footer(); ?>