<?php
/*
Template Name: Ajax
*/

$auth = array();

$action = $_REQUEST['ajax_action'];

if (!in_array($action, $auth)) {
  echo '403';
  exit;
}

$action = 'sos_ajax_' . $action;

$action();
exit;
