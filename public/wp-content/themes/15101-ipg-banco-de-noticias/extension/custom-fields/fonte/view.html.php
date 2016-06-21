<div class="ipga-field-div">
  <label>Vídeo da fonte</label>
  <input type="text"
         name="cf_contact_video"
         value="<?php echo $contact_video; ?>">
  <small><strong>IMPORTANTE:</strong> O avatar da fonte será substituído pelo vídeo. Insira um link do vimeo ou youtube.</small>
</div>

<div class="ipga-field-div">
  <label>Informações extras</label>
  <p>
    <textarea class="ipga-textarea" type="url" name="cf_contact" size="25"><?php echo $contact ?></textarea>
  </p>
</div>

<div class="ipga-field-div">
  <label>Telefones de contato</label>
  <p>
    <textarea class="ipga-textarea" type="url" name="cf_contact_phone" size="25"><?php echo $contact_phone ?></textarea>
  </p>
</div>

<div class="ipga-field-div">
  <label>Emails de contato</label>
  <p>
    <textarea class="ipga-textarea" type="url" name="cf_contact_email" size="25"><?php echo $contact_email ?></textarea>
  </p>
</div>


<div class="ipga-field-div">
  <label>Descrição da atuação e créditos</label>
  <p>
    <textarea class="ipga-textarea" type="url" name="cf_description" size="50"><?php echo $description ?></textarea>
  </p>
</div>

<h4>Sobre o que fala</h4>
<div class="ipga-row" style="width: 100%">

  <?php if ($list->have_posts()): while ($list->have_posts()): $list->the_post();  ?>
    <?php $post_id = get_the_ID(); ?>
  <div class="ipga-row__col">
    <input type="checkbox" name="cf_about[]" value="<?php echo $post_id ?>" <?php echo (in_array($post_id, $about)) ? 'checked' : '' ?> /><?php echo the_title(); ?>
  </div>
    <?php endwhile; endif; ?>
  <?php wp_reset_query(); ?>
</div>
