<?php
global $wp_query;

$stored_query = $wp_query;
$parent_id = 0;
?>

<div class="row">
  <div class="col-sm-6">
    <div class="filters__item">
      <label class="filters__label" for="ordem">Ordenar por</label>
      <select class="filters__select" name="ordem">
        <?php foreach($orders as $key => $name): ?>
          <?php
            $is_selected = (isset($_GET) && array_key_exists('ordem', $_GET));
            $is_selected = ($is_selected && $_GET['ordem'] == $key);
            $selected = ($is_selected) ? ' selected' : '';
          ?>
          <option value="<?php echo $key; ?>"<?php echo $selected; ?>><?php echo $name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <?php foreach($types as $type => $vals): ?>
    <?php
      $args = array(
          'post_type' => $vals['key'],
          'posts_per_page' => -1
      );

      if ($vals['key'] == 'violencias') {
        $args['meta_query'] = array(
          array(
            'key' => '_cf_not_hidden',
            'value' => '1',
            'compare' => '='
          )
        );
      }

      $list = new WP_Query($args);
      $default_name = (array_key_exists('default_name', $vals)) ? $vals['default_name'] : '-';
    ?>
    <?php if ($list->have_posts()): ?>
      <div class="col-sm-6">
        <div class="filters__item">
          <label class="filters__label" for="<?php echo $type; ?>"><?php echo $vals['name']; ?></label>
          <select class="filters__select" name="<?php echo $type; ?>">
            <option value="-"><?php echo $default_name; ?></option>
            <?php while($list->have_posts()): $list->the_post(); ?>
              <?php
                $id = get_the_ID();
                $is_selected = (isset($_GET) && array_key_exists($type, $_GET));
                $is_selected = ($is_selected && $_GET[$type] == $id);
                $selected = ($is_selected) ? ' selected' : '';
              ?>
              <option value="<?php echo $id; ?>"<?php echo $selected; ?>>
                <?php the_title(); ?>
              </option>
            <?php endwhile; ?>
          </select>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
  <?php wp_reset_query(); ?>
  <?php wp_reset_postdata(); ?>
</div>

<div class="row">
  <?php foreach($taxonomies as $tax => $vals): ?>
    <?php
      $has_state = (isset($_GET) && array_key_exists('ies', $_GET));
      $has_state = ($has_state && $tax == 'ici');

      $parent_id = 0;

      if ($has_state) {
        if ($_GET['ies'] != '-') {
          $term_id = get_term_by('slug', $_GET['ies'], 'cidade');
          $parent_id = (int) $term_id->term_id;
        } else {
          $parent_id = 9999;
        }
      }

      $terms = get_terms(array($vals['key']), array(
        'hide_empty' => true,
        'parent' => $parent_id
      ));

      if (is_object($terms) && $terms->errors && count($terms->errors) > 0) {
        $terms = array();
      }

      $default_name = (array_key_exists('default_name', $vals)) ? $vals['default_name'] : '-';
    ?>
    <div class="col-sm-4">
      <div class="filters__item">
        <label class="filters__label" for="<?php echo $tax; ?>"><?php echo $vals['name']; ?></label>
        <select class="filters__select" name="<?php echo $tax; ?>">
          <option value="-"><?php echo $default_name; ?></option>
          <?php foreach($terms as $term): ?>
            <?php
              $is_selected = (isset($_GET) && array_key_exists($tax, $_GET));
              $is_selected = ($is_selected && $_GET[$tax] == $term->slug);
              $selected = ($is_selected) ? ' selected' : '';
            ?>
            <option value="<?php echo $term->slug; ?>"<?php echo $selected; ?>>
              <?php echo $term->name; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php $wp_query = $stored_query; ?>
