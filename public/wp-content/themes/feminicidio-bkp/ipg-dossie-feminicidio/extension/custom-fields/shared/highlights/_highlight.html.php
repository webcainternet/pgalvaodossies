<div class="add-highlights-item js-add-highlights__item-<?php echo $key ?>">
  <?php /*
  <button type="button" style="float:right" class="button button-default button-large js-remove-campaign">Remover item</button>
  */ ?>
  <div class="ipga-field-div">
    <label>Título</label>
    <p>
      <input type="text"
            name="register[highlights][<?php echo $key ?>][title]"
            size="50"
            value="<?php echo ($title) ? $title : ''; ?>">
    </p>
  </div>

  <div>
    <?php $textarea_id = 'texteditor-' . $index; ?>
    <?php wp_editor($description, $textarea_id, array(
      'textarea_name' => 'register[highlights][' . $key . '][description]'
    )); ?>
  </div>
</div>
<hr>
