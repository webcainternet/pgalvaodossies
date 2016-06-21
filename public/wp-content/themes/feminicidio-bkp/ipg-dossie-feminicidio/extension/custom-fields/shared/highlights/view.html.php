<div class="ipga-field-div">
  <label>Número de seções</label>
  <input type="number"
        name="_highlights_count"
        value="<?php echo ($highlight_count) ? $highlight_count : '0'; ?>">
  <small>Por favor, insira o número de seções que gostaria de ter e clique no botão para atualizar/publicar o post.</small>
</div>

<div class="ipga-field-div">
  <label class="ipga-checkbox-field">
    <input type="checkbox"
           name="_highlights_summary"
           value="1"
           <?php if ($highlight_summary) echo 'checked'; ?>>
    Expor sumário
  </label>
</div>

<div class="ipga-field-div">
  <label class="ipga-checkbox-field">
    <input type="checkbox"
           name="_highlights_nav"
           value="1"
           <?php if ($highlight_nav) echo 'checked'; ?>>
    Expor navegação de seções
  </label>
</div>

<hr>

<div class="js-highlights-container">
  <?php
    for ($i = 0; $i < $highlight_count; $i++) {
      $value = $highlights[$i];
      $title = html_entity_decode($value['title'], ENT_QUOTES, 'UTF-8');
      $description = html_entity_decode($value['description'], ENT_QUOTES, 'UTF-8');
      $index = $i + 1;
      $key = $i;
      include('_highlight.html.php');
    }
  ?>
</div>
