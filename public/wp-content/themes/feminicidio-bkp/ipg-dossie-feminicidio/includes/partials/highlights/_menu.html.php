<?php

$highlights_count = count($highlights);
$first = $highlights[0];
$last = $highlights[$highlights_count - 1];

$first['title'] = html_entity_decode($first['title'], ENT_QUOTES, 'UTF-8');
$last['title'] = html_entity_decode($last['title'], ENT_QUOTES, 'UTF-8');
?>

<div class="navigation js-highlight-nav" data-current="0">
  <div class="navigation__map js-highlight-nav-map">
    <div class="navigation__bars">
      <!-- TODO: Colocar tooltip no hover do js-highlight-nav-dash -->
      <?php for ($i = 0; $i < $highlights_count; $i++): ?>
        <?php $value = $highlights[$i]; ?>
        <?php $title = html_entity_decode($value['title'], ENT_QUOTES, 'UTF-8'); ?>
        <span class="navigation__dash js-highlight-nav-dash js-highlight-nav-goto"
              data-index="<?php echo $i; ?>"
              data-title="<?php echo $title; ?>"
              data-anchor="<?php echo sanitize_title($title); ?>">
        </span>
      <?php endfor; ?>
    </div>
    <div class="navigation__map-fill js-highlight-nav-fill">
      <div class="navigation__map-fill-bar js-highlight-nav-fill-bar"></div>
    </div>
  </div>

  <div class="container">
    <span class="navigation__title navigation__title--page">Você está em "<?php echo $title; ?>"</span>
    <span class="navigation__title js-highlight-nav-title"></span>

    <div class="navigation__right">
      <a class="navigation__text js-go-to-top" href="#">Ir para o topo</a>

      <!-- <a class="icon icon-list3 js-highlight-nav-summ" href="#"></a> -->
      <a class="navigation__text js-highlight-nav-summ" href="#">Sumário</a>

      <a class="icon icon-angle-double-left js-highlight-nav-goto"
         href="#<?php echo sanitize_title($first['title']); ?>"></a>

      <a class="icon icon-angle-left js-highlight-nav-previous" href="#"></a>

      <a class="icon icon-angle-right js-highlight-nav-next" href="#"></a>

      <a class="icon icon-angle-double-right js-highlight-nav-goto"
         href="#<?php echo sanitize_title($last['title']); ?>"></a>

       <div class="navigation__summary js-highlight-nav-summary">
         <ul class="navigation__summary-list">
           <?php for ($i = 0; $i < $highlights_count; $i++): ?>
             <?php $value = $highlights[$i]; ?>
             <?php $title = html_entity_decode($value['title'], ENT_QUOTES, 'UTF-8'); ?>
             <li class="navigation__summary-item">
               <a href="#<?php echo sanitize_title($title); ?>"
                  class="navigation__summary-link js-highlight-nav-goto">
                 <?php echo $title; ?>
               </a>
             </li>
           <?php endfor; ?>
         </ul>
       </div>
    </div>
  </div>


</div>
