<?php
  $terms = get_terms(array($field), array(
    'hide_empty' => 0
  ));
  $select_first = ($saved_value == '0') ? true : false;
?>
<?php foreach ($terms as $term): ?>
    <?php
      $checked = '';
      if ($select_first || $term->slug == $saved_value) {
        $checked = ' checked';
      };
    ?>
    <label class="qdia-f__checkbox">
      <input type="radio"
        name="<?php echo $field_name; ?>"
        value="<?php echo $term->slug; ?>"
        <?php echo $checked; ?>>
      <?php echo $term->name; ?>
    </label><br>
    <?php $select_first = false; ?>
<?php endforeach; ?>
