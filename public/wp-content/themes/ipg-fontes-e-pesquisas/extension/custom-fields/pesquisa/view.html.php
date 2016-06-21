<?php

global $post;
$stored_post = $post;

?>
<h4>Selecione os tipos de violência</h4>
<div class="ipga-row" style="width: 100%">

  <?php if ($list->have_posts()): while ($list->have_posts()): $list->the_post();  ?>
    <?php $post_id = get_the_ID(); ?>
  <div class="ipga-row__col">
    <input type="checkbox" name="cf_tipos[]" value="<?php echo $post_id ?>" <?php echo (in_array($post_id, $tipos)) ? 'checked' : '' ?> /><?php echo the_title(); ?>
  </div>
  <?php wp_reset_postdata(); ?>
    <?php endwhile; endif; ?>
</div>

<h4>Link para a pesquisa completa</h4>
<p>
  <input type="url" name="cf_link" size="50" value="<?php echo $link ?>">
</p>

<h4>Peso por relevância</h4>
<p>
  <input type="number" name="cf_relevancia" size="50" value="<?php echo $relevancia ?>">
</p>

<?php $post = $stored_post; ?>
