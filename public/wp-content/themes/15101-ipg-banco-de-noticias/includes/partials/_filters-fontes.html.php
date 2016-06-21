<?php

$taxonomies = array(
  'ies' => array(
    'name' => 'Estados',
    'key' => 'cidade',
    'default_name' => 'Todos os estados'
  ),
  'ici' => array(
    'name' => 'Cidades',
    'key' => 'city',
    'default_name' => 'Todas as cidades'
  )
);

$types = array(
  'ivi' => array(
    'name' => 'Sobre o que fala',
    'key' => 'violencias',
    'default_name' => '-'
  )
);

$orders = array(
  'alfabetica' => 'Ordem Alfabética de A-Z',
  'z-a' => 'Ordem Alfabética de Z-A'
);

ipg_get_partial('filters-loops', array(
  'types' => $types,
  'taxonomies' => $taxonomies,
  'orders' => $orders
));
