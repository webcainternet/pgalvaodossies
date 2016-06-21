<div class="search-result__item result">
  <div class="row">
    <div class="col-sm-3">
      <a href="<?php the_permalink(); ?>" class="result__image"><?php the_post_thumbnail( 'search_image' ); ?></a>
    </div>

    <div class="col-sm-9">
      <a class="result__title" href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="result__title-info">(Veja mais)</span></a>

      <div class="result__info">
        <p><?php the_excerpt(); ?></p>
      </div>
    </div>
  </div>
</div>
