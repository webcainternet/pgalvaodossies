<?php
if (!isset($query)) {
  global $wp_query;
  $query = $wp_query;
}

$max = (int) $query->max_num_pages;
$page = (int) $query->query_vars['paged'];
if ($page == 0) { $page = 1; }
$posts_per_page = $query->query_vars['posts_per_page'];
$pages_per_side = 4;
$pages_to_show = ($pages_per_side * 2) + 1;

$current_query_vars = array();
foreach ($_GET as $key => $value) {
  if ($key == 'paged') { continue; }
  if (is_array($value)) {
    foreach ($value as $val) {
      array_push($current_query_vars, $key . '[]=' . $val);
    }
  } else {
    array_push($current_query_vars, $key . '=' . $value);
  }
}
array_push($current_query_vars, 'paged=');

$current_query_vars = implode('&', $current_query_vars);
$base_url .= '?' . $current_query_vars;

$init = ($page - $pages_per_side);
if ($init < 1) { $init = 1; }

$end = $init + $pages_to_show;
if ($end > $max) { $end = $max + 1; }

?>

<div class="aligner">
  <ul class="pagination__list">
    <?php if ($page > ceil($pages_to_show / 2)): ?>
      <li class="pagination__item"><a class="pagination__link" href="<?php echo $base_url; ?>1"><span class="icon icon-angle-double-left"></span></a></li>
      <li class="pagination__item"><a class="pagination__link" href="<?php echo $base_url; ?><?php echo $page - 1; ?>"><span class="icon icon-angle-left"></span></a></li>
    <?php endif; ?>

    <?php for ($i = $init; $i < $end; $i++): ?>
      <?php if ($i == $page): ?>
        <li class="pagination__item"><span class="pagination__link pagination__link--active" href="#"><?php echo $i; ?></span></li>
      <?php else: ?>
        <li class="pagination__item"><a class="pagination__link" href="<?php echo $base_url; ?><?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $max - ceil($pages_to_show / 2)): ?>
      <li class="pagination__item"><a class="pagination__link" href="<?php echo $base_url; ?><?php echo $page + 1; ?>"><span class="icon icon-angle-right"></span></a></li>
      <li class="pagination__item"><a class="pagination__link" href="<?php echo $base_url; ?><?php echo $max; ?>"><span class="icon icon-angle-double-right"></span></a></li>
    <?php endif; ?>
  </ul>
</div>
