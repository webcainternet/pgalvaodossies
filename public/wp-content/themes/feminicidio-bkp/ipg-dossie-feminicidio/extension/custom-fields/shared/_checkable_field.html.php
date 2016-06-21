<?php
  $select_first = ($saved_value == '0') ? true : false;
  $field_type = ($value['multiple']) ? 'checkbox' : 'radio';
  if ($value['multiple']) {
    $field_name .= '[]';
  }

  if (!is_array($saved_value)) {
    $saved_value = array($saved_value);;
  }
?>
<?php foreach ($value['options'] as $option_key => $option_name): ?>

    <?php
      $checked = '';
      if ($select_first || in_array($option_key, $saved_value)) {
        $checked = ' checked';
      };
    ?>
    <label class="qdia-f__checkbox">
    <input type="<?php echo $field_type; ?>"
        name="<?php echo $field_name; ?>"
        value="<?php echo $option_key; ?>"
        <?php echo $checked; ?>>
      <?php echo $option_name; ?>
    </label>
    <?php $select_first = false; ?>
<?php endforeach; ?>
