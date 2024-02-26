<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>

<div class="container">
    <header class="film-header">
      <div>
        <h1 class="film__title"><?php the_title(); ?> </h1>
        <div class="film__meta">
          <div class="film__location"><?php film_city(get_post()) ?> </div>
        </div>
      </div>
      <div>
        <div class="film__photos js-slider">
          <?php foreach(get_attached_media('image', get_post()) as $image): ?>
            <a href="<?= wp_get_attachment_url($image->ID) ?>">
              <img class="film__photo" src="<?= wp_get_attachment_image_url($image->ID, 'property-carousel'); ?>" alt="">
            </a>
          <?php endforeach ?>
        </div>
      </div>
    </header>


    <div class="film-body">
      <h2 class="film-body__title"><?= __('Description', 'agencia'); ?></h2>
      <div class="formatted">
        <?php the_content(); ?>
      </div>
    </div>

    <section class="film-options">
      <?php $options = get_the_terms(get_post(), 'property_option'); ?>
      <?php foreach($options as $option): ?>
      <div class="film-option"><img src="<?= the_field('icon', $option); ?>" alt=""> 
      <?= $option->name; ?>
    </div>
      <?php endforeach; ?>
    </section>

  </div>
<?php endwhile; ?>
<?php get_footer(); ?>