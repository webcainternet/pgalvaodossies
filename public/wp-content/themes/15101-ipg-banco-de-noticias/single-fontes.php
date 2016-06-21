<?php

the_post();
$post_id = get_the_ID();

get_header();

$about = explode(",", get_post_meta($post_id, '_cf_about', true));

$description = get_post_meta($post_id, '_cf_description', true);
$description = wpautop($description);

$contact_info = get_post_meta($post_id, '_cf_contact', true);
$contact_info = wpautop($contact_info);

$contact_email = get_post_meta($post_id, '_cf_contact_email', true);
$contact_email = wpautop($contact_email);

$contact_video = get_post_meta($post_id, '_cf_contact_video', true);
$contact_video = trim($contact_video);
if (!empty($contact_video)) {
  $contact_video = wp_oembed_get($contact_video);
} else {
  $contact_video = false;
}

$args = array(
    'post__in' => $about,
    'post_type' => 'violencias',
    'posts_per_page' => -1
);

$query = new WP_Query($args);

$cidade_estados = array(
  'page' => 'fontes',
  'title' => 'Cidade / Estado',
  'separator' => '/',
  'taxonomy' => 'cidade',
  'param' => 'ici'
);

?>

<div class="container">
  <?php ipg_get_partial('social-media'); ?>

  <div class="page--result__box">
    <div class="row">

        <div class="col-sm-4">
          <div class="page--result__image">
            <?php if ($contact_video): ?>
              <?php echo $contact_video; ?>
            <?php else: ?>
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('search_single'); ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/public/images/default-user.jpg" alt="" />
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-sm-8">
          <h1 class="page--result__title"><?php the_title(); ?></h1>

          <div class="page--result__info">
            <span class="page--result__info-title">Atuação</span>
            <?php echo $description; ?>
          </div>

          <!-- <div class="page--result__info">
            <span class="page--result__info-title">Informações extras</span>
            <?php echo $contact_info; ?>
          </div> -->

          <?php if ($contact_email): ?>
            <div class="page--result__info">
              <span class="page--result__info-title">E-mails</span>
              <?php echo $contact_email; ?>
            </div>
          <?php endif; ?>


          <span class="page--result__info page--result__info--inline">
            <?php ipg_the_link_term($cidade_estados); ?>
          </span>
        </div>
      </div>

      <ul class="page--result__topics-list">
        <span class="page--result__topics-title">Sobre o que fala:</span>

        <?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();  ?>
          <li class="page--result__topics-item">
            <a class="page--result__topics-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
          </li>
        <?php endwhile; endif; ?>
        <?php wp_reset_query(); ?>
      </ul>
    </div>
  </div>
</div>

<?php get_footer(); ?>
