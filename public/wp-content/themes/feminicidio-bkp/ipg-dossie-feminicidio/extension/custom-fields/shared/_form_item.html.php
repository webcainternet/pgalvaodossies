<?php
$saved_value = (isset($meta[$field])) ? $meta[$field] : $value['default'];
$field_name = $prefix . $field;
$special_fields = array(
  'upload', 'taxonomy', 'checkable', 'select', 'textarea'
);
?>

<div class="qdia-f__field">
  <label class="qdia-f__label" for="<?php echo $field_name; ?>"><?php echo $value['name']; ?></label>

  <?php if (in_array($value['type'], $special_fields)): ?>
    <?php include(CFPATH . '/shared/_' . $value['type'] . '_field.html.php'); ?>
  <?php else: ?>
    <?php include(CFPATH . '/shared/_default_field.html.php'); ?>
  <?php endif; ?>
</div>
