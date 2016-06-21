<?php

ipg_modify_query_with_txtq('fontes');

$Parsedown = new Parsedown();
$conteudo = $Parsedown->text(get_option('_ipg_fonte_conteudo', ''));

$name_button_1 = $Parsedown->text(get_option('_ipg_fonte_name_button_1', ''));
$link_button_1 = get_option('_ipg_fonte_link_button_1', '');
$name_button_2 = $Parsedown->text(get_option('_ipg_fonte_name_button_2', ''));
$link_button_2 = get_option('_ipg_fonte_link_button_2', '');

?>


<?php get_header(); ?>

<div class="container">
  <h1 class="page__title">Fontes</h1>

  <div class="box__info"><?php echo $conteudo; ?></div>

  <div class="box__info">
    <?php if ($link_button_1 != ''): ?>
      <a href="<?php echo $link_button_1 ?>" target="_blank"><button class="filters__button" type="submit"><?php echo $name_button_1; ?></button></a>
    <?php endif; ?>

    <?php if ($link_button_2 != ''): ?>
      <a href="<?php echo $link_button_2 ?>" target="_blank"><button class="filters__button" type="submit"><?php echo $name_button_2; ?></button></a>
    <?php endif; ?>
  </div>

  <div class="filters" >
    <?php ipg_get_partial('archive-filters'); ?>
    <?php ipg_get_partial('download_csv', $_GET); ?>
  </div>

  <?php if (have_posts()): while (have_posts()): the_post();  ?>
    <?php ipg_get_partial('search-result-fontes'); ?>
  <?php endwhile; endif; ?>

  <?php ipg_get_partial('pagination', array(
    'base_url' => get_bloginfo('url') . '/fontes'
  )); ?>
</div>
<a class="mobile-menu__text--arrow go-to-top js-go-to-top" href="#"><span class="icon icon-arrow-up"></span></a>
<?php get_footer(); ?>
