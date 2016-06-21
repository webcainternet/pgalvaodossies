<div class="ipga-field-div">
  <label>Ordem</label>
  <input type="number" name="_cf_order" value="<?php echo $order; ?>">
  <small>Os posts serão ordenados em ordem crescente.</small>
</div>

<div class="ipga-field-div">
  <label class="ipga-checkbox-field">
    <input type="checkbox"
           name="_cf_not_hidden"
           value="1"
           <?php if ($not_hidden) echo 'checked'; ?>>
    Usar como taxonomia/filtro
  </label>
  <small>Caso marcado este campo, este artigo aparecerá como opção de taxonomia ou filtro nas páginas de pesquisa e fontes.</small>
</div>

<div class="ipga-field-div">
  <label class="ipga-checkbox-field">
    <input type="checkbox"
           name="_cf_not_hidden_index"
           value="1"
           <?php if ($not_hidden_index) echo 'checked'; ?>>
    Mostrar na página "Sobre as violências..."
  </label>
  <small>Caso marcado este campo, este artigo aparecerá como thumbnail na página "Sobre as violências..."</small>
</div>

<hr>

<div class="ipga-field-div">
  <h4>Usar os quadrinhos da chave</h4>
  <?php foreach ($quadrinho_terms as $term): ?>
    <?php
      $checked = '';
      if ($chave_sel_first || $term->slug == $quadrinho_radio) {
        $checked = ' checked';
      };
    ?>
    <label class="ipga-checkbox-field">
      <input type="radio"
             name="_cf_qd_chave"
             value="<?php echo $term->slug; ?>"
             <?php echo $checked; ?>>
      <?php echo $term->name; ?>
    </label>

    <?php $chave_sel_first = false; ?>
  <?php endforeach; ?>
</div>
