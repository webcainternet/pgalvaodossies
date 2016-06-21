<?php
  $post_id = get_the_ID();
  $types = get_post_meta($post_id, '_cf_about', true);
  $types = explode(',', $types);
  $args = array(
    'post_type' => 'violencias',
    'posts_per_page' => -1,
    'post__in' => $types,
    'meta_query' => array(
      array(
        'key' => '_cf_not_hidden',
        'value' => '1',
        'compare' => '='
      )
    )
  );

  $types_list = new WP_Query($args);

  $description = get_post_meta($post_id, '_cf_description', true);
  $description = wpautop($description);

  $contact_info = get_post_meta($post_id, '_cf_contact', true);
  $contact_info = wpautop($contact_info);

  $contact_phone = get_post_meta($post_id, '_cf_contact_phone', true);
  $contact_phone = wpautop($contact_phone);

  $contact_email = get_post_meta($post_id, '_cf_contact_email', true);
  $contact_email = wpautop($contact_email);

  $contact_video = get_post_meta($post_id, '_cf_contact_video', true);
  $contact_video = trim($contact_video);
  if (!empty($contact_video)) {
    $contact_video = wp_oembed_get($contact_video);
  } else {
    $contact_video = false;
  }

  $cidade_estados = array(
    'page' => 'fontes',
    'title' => 'Cidade / Estado',
    'separator' => '/',
    'taxonomy' => 'cidade',
    'param' => 'ici'
  );

?>
<div class="search-result__item result">
  <div class="row">
    <div class="col-sm-3">
      <span class="search-result__type no-desktop">Fonte</span>

      <?php if ($contact_video): ?>
        <?php echo $contact_video; ?>
      <?php else: ?>
        <?php if (has_post_thumbnail()): ?>
          <a href="<?php the_permalink(); ?>" class="result__image"><?php the_post_thumbnail( 'search_image' ); ?></a>
        <?php else: ?>
          <a href="<?php the_permalink(); ?>" class="result__image"><img src="<?php echo get_template_directory_uri(); ?>/public/images/default-user.jpg" alt="" /></a>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <div class="col-sm-9">
      <span class="search-result__type no-mobile">Fonte</span>

      <a class="result__title" href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="result__title-info">(Veja mais)</span></a>

      <span class="result__info"><span class="result__info-title">Atuação:</span> <?php echo $description; ?></span>

      <!-- <span class="result__info"><span class="result__info-title">Informações extras:</span> <?php echo $contact_info; ?></span> -->

      <?php if ($contact_email): ?>
        <span class="result__info"><span class="result__info-title">E-mails:</span> <?php echo $contact_email; ?> </span>
      <?php endif; ?>

      <span class="result__info"><?php ipg_the_link_term($cidade_estados); ?></span>
    </div>
  </div>

  <?php if ($types_list->found_posts > 0): ?>
    <ul class="result__list">
      <?php foreach($types_list->posts as $type_post): ?>
        <li class="result__item result__item--inline">
          <a class="result__link result__link--<?php echo $type_post->post_name; ?>" href="<?php bloginfo('url'); ?>/fontes/?ivi=<?php echo $type_post->ID; ?>">
            <?php echo $type_post->post_title; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>
