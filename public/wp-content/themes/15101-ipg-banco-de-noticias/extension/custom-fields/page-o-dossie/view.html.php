<?php

global $post;
$stored_post = $post;

?>

<div class="ipga-field-div">
  <label>Botão 1: Link</label>
    <input type="text"
           name="_cf_o_dossie_btn1_link"
           value="<?php echo $_cf_o_dossie_btn1_link; ?>">
</div>

<div class="ipga-field-div">
  <label>Botão 1: Texto</label>
    <input type="text"
           name="_cf_o_dossie_btn1_text"
           value="<?php echo $_cf_o_dossie_btn1_text; ?>">
</div>

<div class="ipga-field-div">
  <label>Botão 2: Link</label>
    <input type="text"
           name="_cf_o_dossie_btn2_link"
           value="<?php echo $_cf_o_dossie_btn2_link; ?>">
</div>

<div class="ipga-field-div">
  <label>Botão 2: Texto</label>
    <input type="text"
           name="_cf_o_dossie_btn2_text"
           value="<?php echo $_cf_o_dossie_btn2_text; ?>">
</div>

<?php $post = $stored_post; ?>
