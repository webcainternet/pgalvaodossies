<?php
  global $tpl_engine;
?>
<?php get_header(); ?>

<div class="c-wrapper">
  <div class="c-highlight">
      <h1 class="o-page-title c-highlight__title"><span class="c-highlight__title-text">Fontes</span></h1>
  </div>
  <div class="s-container" role="main">
    <div class="row">
       <div class="col-xs-12 col-lg-12">
        <div class="c-text__excerpt" role="article">
          Um banco de contatos com fontes qualificadas de diversas áreas de atuação e do conhecimento para a produção de reportagens sobre a violência contra as mulheres
          Para mais contatos e informações, ligue para o Instituto Patrícia Galvão: (11) 3262-2452
        </div>
        <br>
        <div class="u-aligner">
          <a class="o-btn" href="https://www.youtube.com/playlist?list=PLvyQ0g66EQlYGEvWH0RsxDG7PxYlABbQD" target="_blank">YouTube: acompanhe o canal da Agência Patrícia Galvão</a>
          <a class="o-btn" href="#">Veja também: como localizar fontes institucionais</a>
        </div>

        <div class="filters" >
          <?php $tpl_engine->partial('archive-filters'); ?>
        </div>

        <ul class="archive__list u-list-unstyled">
          <?php if (have_posts()): while(have_posts()): the_post(); ?>
            <li class="c-archive-item c-archive-item--fonte">
              <div class="c-archive-item__info-content">
                <?php $tpl_engine->partial('search-result-fontes'); ?>
              </div>
            </li>
          <?php endwhile; endif; ?>
        </ul>
      </div>
    </div>
    <?php $tpl_engine->partial('pagination', array(
      'base_url' => get_bloginfo('url') . '/fontes'
    )); ?>
  </div>
  <div class="c-utility-btn c-go-to-top-btn-container">
    <a class="mobile-menu__text--arrow go-to-top js-go-to-top" href="#"><span class="zmdi zmdi-arrow-left zmdi-hc-rotate-90"></span></a>
  </div>
</div>
<?php get_footer(); ?>
