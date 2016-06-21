<?php
  global $tpl_engine;

  the_post();
  get_header();
  $bloginfo = get_bloginfo ('description');
?>

<div class="c-wrapper">
  <div class="s-container" role="main">
    <div class="home-interaction">
        <div class="home-interaction__bg-content">
          <img class="home-interaction__bg" alt="IPG break" src="<?php echo get_template_directory_uri () ?>/public/images/mulher-final.png">
        </div>

      <div class="c-dossie-info-content">
        <div class="c-dossie-info c-dossie-info--mobile">
          <?php echo trim_words($bloginfo, 38); ?>
          <a class="c-dossie-info__link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/o-dossie/">Leia mais sobre o dossiê</a>
        </div>

        <div class="c-dossie-info c-dossie-info--complete">
          <?php echo bloginfo ('description'); ?>
          <a class="c-dossie-info__link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/o-dossie/">Leia mais sobre o dossiê</a>
        </div>

        <nav class="c-chapters-info c-chapters-info--desktop">
          <ul class="c-chapters-info__list">
            <li class="c-chapters-info__item c-chapters-info__item--o-que-e-feminicidio">
              <a class="c-dynamic-chapters__textual-link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/o-que-e-feminicidio/">
              <div class="c-dynamic-chapters">
                <span class="c-dynamic-chapters__textual-link" href="#">
                  <h3 class="c-dynamic-chapters__title">O que é <span>feminicídio?</span></h3>
                </span>
                <br>
                <span class="o-btn-2 c-dynamic-chapters__btn" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/o-que-e-feminicidio/">Leia +</span>
              </div>
              </a>
            </li>

             <li class="c-chapters-info__item c-chapters-info__item--qual-a-dimensao-do-problema-no-brasil">
              <div class="c-dynamic-chapters">
                <a class="c-dynamic-chapters__textual-link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/qual-a-dimensao-do-problema-no-brasil/">
                  <h3 class="c-dynamic-chapters__title">Qual a <span>dimensão</span><br>do problema<br>no brasil?</h3>
                </a>
                <br>
                <a class="o-btn-2 c-dynamic-chapters__btn" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/qual-a-dimensao-do-problema-no-brasil/">Leia +</a>
              </div>
            </li>

             <li class="c-chapters-info__item c-chapters-info__item--como-e-por-que-morrem-as-mulheres">
              <div class="c-dynamic-chapters">
                <a class="c-dynamic-chapters__textual-link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/como-e-por-que-morrem-as-mulheres/">
                  <h3 class="c-dynamic-chapters__title">Como e por que<br><span>morrem</span> mulheres?</h3>
                </a>
                <br>
                <a class="o-btn-2 c-dynamic-chapters__btn" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/como-e-por-que-morrem-as-mulheres/">Leia +</a>
              </div>
            </li>

             <li class="c-chapters-info__item c-chapters-info__item--como-evitar-mortes-anunciadas">
              <div class="c-dynamic-chapters">
                <a class="c-dynamic-chapters__textual-link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/como-evitar-mortes-anunciadas/">
                  <h3 class="c-dynamic-chapters__title">Como evitar<br>“<span>MORTES ANUNCIADAS</span>”?</h3>
                </a>
                <br>
                <a class="o-btn-2 c-dynamic-chapters__btn" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/como-evitar-mortes-anunciadas/">Leia +</a>
              </div>
            </li>

             <li class="c-chapters-info__item c-chapters-info__item--qual-o-quadro-de-enfrentamento-no-brasil-hoje">
              <div class="c-dynamic-chapters">
                <a class="c-dynamic-chapters__textual-link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/qual-o-quadro-de-enfrentamento-no-brasil-hoje/">
                  <h3 class="c-dynamic-chapters__title">Qual o quadro<br>de <span>enfrentamento</span><br>no brasil hoje?</h3>
                </a>
                <br>
                <a class="o-btn-2 c-dynamic-chapters__btn" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/qual-o-quadro-de-enfrentamento-no-brasil-hoje/">Leia +</a>
              </div>
            </li>

             <li class="c-chapters-info__item c-chapters-info__item--qual-o-papel-da-comunicacao">
              <div class="c-dynamic-chapters">
                <a class="c-dynamic-chapters__textual-link" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/qual-o-papel-da-comunicacao/">
                  <h3 class="c-dynamic-chapters__title">qual o papel<br>da <span>comunicação</span><br>nesse cenário?</h3>
                </a>
                <br>
                <a class="o-btn-2 c-dynamic-chapters__btn" href="http://www.agenciapatriciagalvao.org.br/dossies/feminicidio/capitulos/qual-o-papel-da-comunicacao/">Leia +</a>
              </div>
            </li>
          </ul>
        </nav>

        <?php $tpl_engine->partial('home-interaction-mobile'); ?>

      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
