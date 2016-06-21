<?php

global $post;

?>

<?php if ($highlights != ''): ?>
  <div class="container">
    <div class="summary">
      <div class="textblock textblock--<?php echo $post->post_name; ?>">
        <?php if (get_post_type() == 'pesquisas'): ?>
          <h3>Destaques</h3>
        <?php else: ?>
          <h3>Sumário</h3>
        <?php endif; ?>

        <ul>
          <?php foreach ($highlights as $key => $value): ?>
            <?php
              $title = html_entity_decode($value['title'], ENT_QUOTES, 'UTF-8');
              $anchor = sanitize_title($title);
            ?>
            <li><a href="#<?php echo $anchor; ?>"><?php echo $title ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
<?php endif; ?>
