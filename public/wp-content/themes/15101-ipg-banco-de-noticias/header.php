<?php

global $tpl_engine;

$dossie_menu = wp_nav_menu(array(
    'menu' => 'dossie_menu',
    'menu_class' => 'c-menu c-dossie-menu js-menu',
    'depth' => 0,
    'container' => '',
    'echo' => false
));

$ferramentas_menu = wp_nav_menu(array(
    'menu' => 'ferramentas_menu',
    'menu_class' => 'c-menu c-ferramentas-menu js-menu',
    'depth' => 0,
    'container' => '',
    'echo' => false
));

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="X-UA-TextLayoutMetrics" content="gdi" />

  <?php $tpl_engine->partial('template/favicons'); ?>

  <title><?php bloginfo('name');?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

  <?php wp_head(); ?>
  <?php $tpl_engine->partial('facebook-pixel'); ?>

</head>

<body <?php body_class(); ?>>

<header class="o-header c-header">
  <div class="o-brand c-brand__content">
    <a class="c-brand__link" href="<?php echo get_site_url() ?>" alt="brand, home link"><?php $tpl_engine->svg('brand'); ?></a>
  </div>

  <a href="#" class="c-header__nav-link c-header__menu-link js-toggle-menu js-toggle-main zmdi zmdi-menu u-no-desktop" data-key="menu" data-side="right"></a>


  <nav class="c-header__nav" role="navigation">
    <?php echo $dossie_menu; ?>
    <?php echo $ferramentas_menu; ?>
  </nav>

  <div class="c-search-bar js-search-bar u-no-mobile">
    <form class="c-search-area__form" role="search" action="<?php echo get_site_url() ?>" method="get" accept-charset="utf-8">
      <a href="#" class="c-search-area__button c-search-area__search js-search-btn" type="submit"><i class="zmdi zmdi-close js-search-close u-hidden"></i><i class="zmdi js-search-magnifier zmdi-search"></i></a>
      <button class="c-search-area__button_text" type="submit"><span class="c-search-area__button-text">Buscar</span></button>
      <input class="c-search-area__input" type="text" name="s" placeholder="Busca">
      <div class="c-search-cover__options">
        <span class="c-search-cover__title">Filtrar por:</span>

          <label class="c-search-cover__label">
            <input type="radio" name="tipos[]" value="fontes" checked="">
            <span>Fontes</span>

          </label>
          <label class="c-search-cover__label">
            <input type="radio" name="tipos[]" value="pesquisas" checked="">
            <span>Pesquisas</span>
          </label>
          <label class="c-search-cover__label">
            <input type="radio" name="tipos[]" value="Biblioteca" checked="">
            <span>Biblioteca</span>
          </label>
      </div>
    </form>
  </div>
</header>
<div class="c-header-out js-toggle-menu js-header-out"></div>
<?php $tpl_engine->partial('nav-mobile'); ?>
