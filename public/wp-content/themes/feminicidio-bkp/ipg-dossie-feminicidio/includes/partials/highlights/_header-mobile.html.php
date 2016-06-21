<?php

$highlights_count = count($highlights);
$first = $highlights[0];
$last = $highlights[$highlights_count - 1];

?>

<div class="navigation navigation--mobile" data-current="0">
  <div class="container">
    <div class="navigation__normal">
      <span class="navigation__title navigation__title--mobile navigation__title--mobile-page">Você esta em "<?php the_title() ?>"</span>
      <span class="navigation__title navigation__title--mobile js-highlight-nav-title"></span>


      <!-- <a class="icon icon-angle-double-left js-highlight-nav-goto"
         href="#<?php echo sanitize_title($first['title']); ?>"></a>

      <a class="icon icon-angle-left js-highlight-nav-previous" href="#"></a>

      <a class="icon icon-angle-right js-highlight-nav-next" href="#"></a>

      <a class="icon icon-angle-double-right js-highlight-nav-goto"
         href="#<?php echo sanitize_title($last['title']); ?>"></a> -->

      <a class="icon icon-list3 js-highlight-nav-summ-mobile" href="#"></a>
    </div>
  </div>
</div>
<a class="mobile-menu__text--arrow go-to-top js-go-to-top" href="#"><span class="icon icon-arrow-up"></span></a>
