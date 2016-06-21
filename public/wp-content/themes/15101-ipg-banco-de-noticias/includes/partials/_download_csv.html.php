<?php
global $wp_query;

$post__in = array();

foreach ($wp_query->posts as $this_post) {
  array_push($post__in, $this_post->ID);
}

?>

<form id="export-csv" method="post" action="<?php bloginfo('url') ?>/csv/?<?php echo $params ?>">
  <input type="hidden" name="post__in" value="<?php echo implode(',', $post__in); ?>">
  <div class="button-export">
    <button class="filters__button" type="submit">Exportar Resultados</button>
  </div>
</form>
