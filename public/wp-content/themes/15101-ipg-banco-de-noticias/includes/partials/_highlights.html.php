<?php

global $post;

$slug = sanitize_title(get_the_title());

$post_name = $post->post_name;

?>


<?php if ($highlights != ''): ?>
  <div class="section-group  section-group--<?php echo $post_name; ?> js-highlight-nav-sections">
    <?php foreach ($highlights as $key => $value): ?>
      <?php
        $title = html_entity_decode($value['title'], ENT_QUOTES, 'UTF-8');
        $description = html_entity_decode($value['description'], ENT_QUOTES, 'UTF-8');
      ?>

      <div class="section js-highlight-nav-section" data-index="<?php echo $key; ?>">
        <div class="container">
          <div class="textblock textblock--<?php echo $post_name; ?>">
            <h2 id="<?php echo sanitize_title($title) ?>"
                class="js-highlight-nav-checkpoint">
                <?php echo apply_filters('the_title', $title); ?>
            </h2>

            <div class="clearfix">
              <?php echo apply_filters('the_content', $description) ?>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
<?php endif; ?>
