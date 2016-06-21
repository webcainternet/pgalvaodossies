<?php if ($highlights != ''): ?>
  <h3 class="mobile-menu__title">Sumário</h3>
  <ul class="mobile-menu__list">
    <?php foreach ($highlights as $key => $value): ?>
      <?php
        $title = html_entity_decode($value['title'], ENT_QUOTES, 'UTF-8');
        $anchor = sanitize_title($title);
      ?>
      <li class="mobile-menu__item"><a class="mobile-menu__link js-mobile-menu__link" href="#<?php echo $anchor; ?>"><?php echo $title ?></a></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
