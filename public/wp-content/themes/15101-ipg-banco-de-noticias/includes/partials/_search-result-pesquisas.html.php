<?php
  $post_id = get_the_ID();
  $types = get_post_meta($post_id, '_cf_tipos', true);
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

  $actual_page = 'pesquisas';
  $separator = '/';

  $instituicao = array(
    'page' => $actual_page,
    'title' => 'Instituição/Orgão',
    'separator' => $separator,
    'taxonomy' => 'instituicao',
    'param' => 'iis'
  );

  $ambito = array(
    'page' => $actual_page,
    'title' => 'Âmbito',
    'separator' => $separator,
    'taxonomy' => 'ambito',
    'param' => 'iam'
  );

  $ano = array(
    'page' => $actual_page,
    'title' => 'Ano',
    'separator' => $separator,
    'taxonomy' => 'ano',
    'param' => 'ian'
  );
?>
<div class="search-result__item result">
  <div class="row">
    <div class="col-sm-3">
      <span class="search-result__type no-desktop">Pesquisa</span>
      <!-- TODO: Inserir tamanhos e default image-->
      <a href="<?php the_permalink(); ?>" class="result__image"><?php the_post_thumbnail( 'search_image' ); ?></a>
    </div>

    <div class="col-sm-9">
      <span class="search-result__type no-mobile">Pesquisa</span>
      <a class="result__title" href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="result__title-info">(Veja mais)</span></a>
      <span class="result__info"><?php ipg_the_link_term($instituicao); ?></span>
      <span class="result__info"><?php ipg_the_link_term($ambito); ?></span>
      <span class="result__info"><?php ipg_the_link_term($ano); ?></span>
    </div>
  </div>

  <?php if ($types_list->found_posts > 0): ?>
    <ul class="result__list">
      <?php foreach($types_list->posts as $type_post): ?>
        <li class="result__item result__item--inline">
          <a class="result__link result__link--<?php echo $type_post->post_name; ?>" href="<?php bloginfo('url'); ?>/pesquisas/?ivi=<?php echo $type_post->ID; ?>">
            <?php echo $type_post->post_title; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>
