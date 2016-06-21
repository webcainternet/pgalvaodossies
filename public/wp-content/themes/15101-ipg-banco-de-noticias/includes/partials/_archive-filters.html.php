<?php

$partial_name = 'filters-general';
$form_url = get_bloginfo('url');
$type = 'general';

if (isset($forced_type)) {
  $type = $forced_type;
} else {
  if (is_post_type_archive('fontes')) {
    $type = 'fontes';
  } elseif (is_post_type_archive('pesquisas')) {
    $type = 'pesquisas';
  }
}

if ($type == 'fontes') {
  $partial_name = 'filters-fontes';
  $form_url .= '/fontes';
} elseif ($type == 'pesquisas') {
  $partial_name = 'filters-pesquisas';
  $form_url .= '/pesquisas';
}

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

<form action="<?php echo $form_url; ?>" method="get" accept-charset="utf-8">
  <?php if (isset($_GET) && array_key_exists('s', $_GET) && is_search()): ?>
    <input type="hidden" name="s" value="<?php echo $_GET['s']; ?>">
  <?php else: ?>
    <div class="filters__item">
      <label class="filters__label" for="txtq">Buscar:</label>
      <input class="filters__input" type="text" value="<?php echo ((isset($_GET['txtq'])) ? $_GET['txtq'] : ''); ?>" name="txtq" id="s" placeholder="Insira aqui o que deseja buscar"/>
    </div>
  <?php endif; ?>

  <?php if ($partial_name == 'filters-general'): ?>
    <div class="search-cover__options search-cover__option--positive">
      <span class="search-cover__title">Buscar por:</span>
      <?php foreach ($search_types as $type): ?>
        <?php
          $checked = '';
          if (isset($_GET) && array_key_exists('tipos', $_GET) && in_array($type['value'], $_GET['tipos'])) {
            $checked = ' checked';
          }
        ?>
        <label class="search-cover__checkbox">
          <input type="checkbox" name="tipos[]" value="<?php echo $type['value']; ?>"<?php echo $checked; ?>>
          <span></span>
          <?php echo $type['name']; ?>
        </label>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php ipg_get_partial($partial_name); ?>

  <div class="aligner aligner--right">
    <button class="filters__button" type="submit">Filtrar</button>
  </div>
</form>
