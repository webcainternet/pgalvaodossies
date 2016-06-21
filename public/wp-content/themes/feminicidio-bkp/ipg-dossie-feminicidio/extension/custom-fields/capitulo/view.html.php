<div class="ipga-field-div">
  <label>Ordem</label>
  <input type="number" name="_cf_order" value="<?php echo $order; ?>">
  <small>Os posts serão ordenados em ordem crescente.</small>
</div>

<div class="ipga-field-div">
  <label class="ipga-checkbox-field">
    <input type="checkbox"
           name="_cf_not_hidden_index"
           value="1"
           <?php if ($not_hidden_index) echo 'checked'; ?>>
    Mostrar na página de índice de capítulos
  </label>
</div>
