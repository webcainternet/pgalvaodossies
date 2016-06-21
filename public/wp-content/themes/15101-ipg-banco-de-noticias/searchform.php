<?php

$search_types = array(
  array(
    'value' => 'fontes',
    'name' => 'Fontes'
  ),
  array(
    'value' => 'pesquisas',
    'name' => 'Pesquisas'
  ),
  array(
    'value' => 'violencias',
    'name' => 'Tipos de violência'
  )
);

?>
<form class="search-cover searchform" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="search-cover__options">
    <span class="search-cover__title">Buscar por:</span>

    <?php foreach ($search_types as $type): ?>
      <?php
        $checked = ' checked';
        if (isset($_GET) && array_key_exists('tipos', $_GET) && !in_array($type['value'], $_GET['tipos'])) {
          $checked = '';
        }
      ?>
      <label class="search-cover__checkbox">
        <input type="checkbox" name="tipos[]" value="<?php echo $type['value']; ?>"<?php echo $checked; ?>>
        <span></span>
        <?php echo $type['name']; ?>
      </label>
    <?php endforeach; ?>
  </div>

  <div class="search-cover__input-box">
    <label class="screen-reader-text" for="s">
      <?php _x( 'Search for:', 'label' ); ?>
    </label>
    <input class="search-cover__input" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Insira aqui o que deseja buscar"/>
    <button class="search-cover__button" type="submit" id="searchsubmit" />
      <?php echo esc_attr_x( 'Buscar', 'submit button' ); ?>
    </button>
  </div>
</form>
