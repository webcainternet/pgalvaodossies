<form method="POST" action="" accept-charset="utf=8">
  <input type="hidden" name="save_options" value="Y">

  <?php foreach($fields as $key => $options): ?>
    <?php
      $attrs = '';
      if (array_key_exists('attrs', $options)) {
        $attrs = ' ' . $options['attrs'];
      }
    ?>
    <div class="ipga-field-div">
      <?php if ($options['type'] != 'boolean'): ?>
        <label><?php echo $options['title']; ?></label>
      <?php endif; ?>
      <p>
        <?php if ($options['type'] == 'textarea'): ?>
          <textarea name="<?php echo $key; ?>"<?php echo $attrs; ?>><?php echo $options['value']; ?></textarea>
        <?php elseif ($options['type'] == 'upload'): ?>
          <input type="text" size="50" name="<?php echo $key; ?>" value="<?php echo $options['value']; ?>"/>
          <a href="#" data-uploader data-input="<?php echo $key; ?>">Upload</a><br><br>
        <?php elseif ($options['type'] == 'boolean'): ?>
          <label class="ipga-checkbox-field">
            <input type="checkbox"
                   name="<?php echo $key; ?>"
                   value="1"
                   <?php if ($options['value'] == '1') echo 'checked'; ?>>
            <?php echo $options['title']; ?>
          </label>
        <?php else: ?>
          <input type="<?php echo $options['type']; ?>"
                 size="50"
                 name="<?php echo $key; ?>"
                 value="<?php echo $options['value']; ?>"<?php echo $attrs; ?>>
        <?php endif; ?>
      </p>

      <?php if (array_key_exists('tip', $options)): ?>
        <small><?php echo $options['tip']; ?></small>
      <?php elseif ($options['type'] == 'textarea'): ?>
        <small>É permitido usar HTML, mas não é permitido o uso de aspas (tanto simples quanto duplas). Para formatação, por favor prefira <a href="http://daringfireball.net/projects/markdown/basics" target="_blank">Markdown</a></small>
      <?php elseif ($options['type'] == 'number'): ?>
        <small>Por favor, separe as casas decimais com . ao invés de vírgula e não use separadores para os milhares. Exemplos: 1000, 102.32, 5.1, 500000.78.</small>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>

  <div class="ipga-field-div">
    <button type="submit" class="button button-primary button-large">Salvar</button>
  </div>
</form>
