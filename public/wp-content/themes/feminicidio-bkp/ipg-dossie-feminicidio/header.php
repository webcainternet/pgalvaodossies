<?php

global $tpl_engine;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="X-UA-TextLayoutMetrics" content="gdi" />

  <?php $tpl_engine->partial('template/favicons'); ?>

  <title><?php bloginfo('name');?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
