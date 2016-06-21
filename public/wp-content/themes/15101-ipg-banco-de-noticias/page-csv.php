<?php
/*
Template Name: Download CSV
*/

$redirect_user = false;

$redirect_user = ($_SERVER['REQUEST_METHOD'] != 'POST');
$redirect_user = ($redirect_user || !isset($_POST));

if ($redirect_user) { header('Location: ' . home_url()); }
if (!array_key_exists('post__in', $_POST)) { header('Location: ' . home_url()); }

$post__in_raw = trim($_POST['post__in']);

if (empty($post__in_raw)) { header('Location: ' . home_url()); }

$post__in_raw = explode(',', $post__in_raw);
$post__in = array();

foreach ($post__in_raw as $id) {
  array_push($post__in, (int) $id);
}

$query = new WP_Query(array(
  'post_type' => 'fontes',
  'post__in' => $post__in,
  'posts_per_page' => -1
));

$uniq_id = date('YmdHiS');
$uniq_id = md5($uniq_id);
$uniq_id = substr($uniq_id, 0, 10);


$content = array(
  array(
    'Fonte',
    'Atuação',
    'Email',
    'Cidade/Estado'
  )
);

$count = 0;

if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();

    $post_id = get_the_ID();
    $all_terms = '';

    $terms = get_the_terms($post_id, 'cidade');

    if ($terms && ! is_wp_error($terms)) {
      $url = get_bloginfo('url');

      foreach ($terms as $term) {
        $terms_links[$count][] = $term->name;
      }

      $all_terms = implode('/', $terms_links[$count]);
    }

    $description = get_post_meta($post_id, '_cf_description', true);
    $contact_info = get_post_meta($post_id, '_cf_contact_email', true);

    $title = (strtolower(get_the_title()) != 'csv') ? get_the_title() : '';

    $content[] = array(
      $title,
      $description,
      $contact_info,
      $all_terms
    );

    $count++;
  }
}

$file_name = date("Ym") . '-' . $uniq_id  . '-fontes.csv';
header('Content-Type: application/csv; charset=utf-8');
header("Content-length: " . filesize(''));
header('Content-Disposition: attachment; filename="' . $file_name . '"');
echo generateCsv($content);

exit;
