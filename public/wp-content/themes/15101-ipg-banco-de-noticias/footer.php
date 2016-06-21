<?php
global $tpl_engine;

$jquery_cdn_url = 'https://ajax.googleapis.com/ajax/libs/jquery/';
$jquery_cdn_url .= JQUERY_VERSION;
$jquery_cdn_url .= '/jquery.min.js';

$jquery_js_name = (ENV == 'production') ? 'jquery.min.js' : 'jquery.js';
$jquery_js_url = get_bloginfo('template_url');
$jquery_js_url .= '/public/js/' . $jquery_js_name;

?>
    <footer class="c-footer">
      <div class="u-no-mobile">
        <div class="c-footer-top">
          <div class="s-container" role="main">
            <div class="row">
              <div class="col-lg-4">
                <div class="o-brand c-brand__content">
                  <a class="c-brand__link" href="<?php echo get_site_url() ?>" alt="brand, home link"><?php $tpl_engine->svg('brand'); ?></a>
                </div>
              </div>

              <div class="col-lg-5">
                <ul class="c-footer__chapters c-chapters u-list-unstyled">
                  <li class="c-chapters__item"><a class="c-footer__link c-footer__link--big" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/o-dossie/">Dossiê</a></li>
                  <li class="c-chapters__item"><a class="c-footer__link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/o-que-e-feminicidio/">O que é feminicídio?</a></li>
                  <li class="c-chapters__item"><a class="c-footer__link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/qual-a-dimensao-do-problema-no-brasil/">Qual a dimensão do problema no Brasil?</a></li>
                  <li class="c-chapters__item"><a class="c-footer__link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/como-e-por-que-morrem-as-mulheres/">Como e por que morrem as mulheres?</a></li>
                  <li class="c-chapters__item"><a class="c-footer__link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/como-evitar-mortes-anunciadas/">Como evitar “mortes anunciadas”?</a></li>
                  <li class="c-chapters__item"><a class="c-footer__link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/qual-o-quadro-de-enfrentamento-no-brasil-hoje/">Qual o quadro de enfrentamento no brasil hoje?</a></li>
                  <li class="c-chapters__item"><a class="c-footer__link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/qual-o-papel-da-comunicacao/">Qual o papel da comunicação?</a></li>
                </ul>
              </div>

              <div class="col-lg-3">
                <ul class="c-footer__pages c-pages-nav u-list-unstyled">
                  <li class="c-pages-nav__item"><a class="c-footer__link c-footer__link--big" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/cobertura/">Cobertura</a></li>
                  <li class="c-pages-nav__item"><a class="c-footer__link c-footer__link--big" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/legislacoes/">Legislações</a></li>
                  <li class="c-pages-nav__item"><a class="c-footer__link c-footer__link--big" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/diretrizes-pag/">Diretrizes</a></li>
                  <li class="c-pages-nav__item"><a class="c-footer__link c-footer__link--big" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/pesquisas/">Pesquisas</a></li>
                  <li class="c-pages-nav__item"><a class="c-footer__link c-footer__link--big" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/fontes/">Fontes</a></li>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="c-footer-middle">
          <div class="s-container" role="main">

            <?php if (is_home() || is_page('o-dossie')): ?>
              <div class="row">
                <div class="col-lg-4">
                  <h4 class="c-footer-heading">Realização</h4>
                  <a href="#"><img class="realizacao-single-brand" src="<?php echo get_theme_root_uri() ?>/ipg-dossie-feminicidio/public/images/footer/realizacao-single.jpg"></a>
                </div>

                <div class="col-lg-8">
                  <h4 class="c-footer-heading">Apoio</h4>
                  <ul class="c-footer__apoio c-apoio u-list-unstyled">
                    <li class="c-apoio__item"><img src="<?php echo get_theme_root_uri() ?>/ipg-dossie-feminicidio/public/images/footer/apoio.jpg"></li>
                  </ul>
                </div>
              </div>

            <?php else: ?>

            <div class="row">
              <div class="col-lg-12 u-aligner">
                <h4 class="c-footer-heading">Realização</h4>
                <br>
                <a href="#"><img src="<?php echo get_theme_root_uri() ?>/ipg-dossie-feminicidio/public/images/footer/realizacao.jpg"></a>
              </div>
            </div>

            <?php endif; ?>

          </div>
        </div>
        <div class="c-footer__institutional c-footer-bottom">
          <div class="s-container" role="main">
            <?php $tpl_engine->partial('footer-institutional'); ?>
          </div>
        </div>
      </div>
      <div class="c-footer__mobile u-no-desktop">
        <div class="c-footer-middle">
          <div class="s-container" role="main">

            <?php if (is_home() || is_page('o-dossie')): ?>
              <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-4">
                  <h4 class="c-footer-heading">Realização</h4>
                  <a href="#"><img src="<?php echo get_theme_root_uri() ?>/ipg-dossie-feminicidio/public/images/footer/realizacao-single.jpg"></a>
                </div>

                <div class="u-no-small">
                  <div class="col-xs-12 col-md-9 col-lg-8">
                    <h4 class="c-footer-heading">Apoio</h4>
                    <ul class="c-footer__apoio c-apoio u-list-unstyled">
                      <li class="c-apoio__item"><img src="<?php echo get_theme_root_uri() ?>/ipg-dossie-feminicidio/public/images/footer/apoio.jpg"></li>
                    </ul>
                  </div>
                </div>

                <div class="u-no-tablet">
                  <br>
                  <div class="col-xs-12 col-lg-8">
                    <h4 class="c-footer-heading">Apoio</h4>
                    <ul class="c-footer__apoio c-apoio u-list-unstyled">
                      <li class="c-apoio__item"><img src="<?php echo get_theme_root_uri() ?>/ipg-dossie-feminicidio/public/images/footer/apoio-mobile.jpg"></li>
                    </ul>
                  </div>
                </div>
              </div>

            <?php else: ?>

            <div class="row">
              <div class="col-lg-12 u-aligner">
                <h4 class="c-footer-heading">Realização</h4>
                <br>
                <a href="#"><img src="<?php echo get_theme_root_uri() ?>/ipg-dossie-feminicidio/public/images/footer/realizacao.jpg"></a>
              </div>
            </div>

            <?php endif; ?>

          </div>
        </div>
        <div class="c-footer__institutional c-footer-bottom">
          <div class="s-container" role="main">
            <ul class="c-footer__institutional-list c-institutional-nav u-list-unstyled">
              <li class="c-institutional-nav__item c-institutional-nav__item--copyright"><span class="c-footer__span">© Instituto Patrícia Galvão</span></li>
              <li class="c-institutional-nav__item u-pull-right"><a class="c-footer__link c-footer__link--small" href="http://42i.com.br" target="_black" name="desenvolvido por 42i"><?php $tpl_engine->svg('quarentaedoisi'); ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script src="<?php echo $jquery_cdn_url; ?>"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $jquery_js_url; ?>"><\/script>')</script>

    <?php wp_footer(); ?>
  </body>
</html>
