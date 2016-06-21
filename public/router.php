<?php
$url = $_SERVER["REQUEST_URI"];
$base_ptn = '\/(violencias|fontes\-e\-pesquisas|feminicidio)(.*?)';
$ptn = '/' . $base_ptn  . '\.(png|jpe?g|gif|svg|js|css)(.*?)$/';

if (preg_match($ptn, $url)) {
  $url = preg_replace($ptn, '$2.$3$4', $url);
  header('Location: ' . $url);
  exit;
}

if (preg_match('/\.(woff|ttf|png|jpg|jpeg|gif|svg|js|css)/', $url)) {
  return false;
}

$php_ptn = '/(.*?)\.(php)(.*?)$/';
$ptn = '/' . $base_ptn  . '\.(php)$/';

if (preg_match($php_ptn, $url)) {
  $root = $_SERVER['DOCUMENT_ROOT'];
  $url = preg_replace($php_ptn, '$1.$2', $url);
  $url = preg_replace($ptn, '$2.$3', $url);
  include $root . $url;
  exit;
}

$ptn = '/.*?wp-admin\/?$/';

if (preg_match($ptn, $url)) {
  $root = $_SERVER['DOCUMENT_ROOT'];
  include $root . '/wp-admin/index.php';
  exit;
}

include 'index.php';
