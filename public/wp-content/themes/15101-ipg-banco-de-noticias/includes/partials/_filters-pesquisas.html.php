<?php

$taxonomies = array(
  'iam' => array(
    'name' => 'Âmbito',
    'key' => 'ambito',
    'default_name' => 'Todos os âmbitos'
  ),
  'ian' => array(
    'name' => 'Ano',
    'key' => 'ano',
    'default_name' => 'Todos os anos'
  ),
  'iis' => array(
    'name' => 'Órgão/instituição',
    'key' => 'instituicao',
    'default_name' => 'Todos os órgãos/instituições'
  )
);

$types = array(
  'ivi' => array(
    'name' => 'Tipos de violência',
    'key' => 'violencias'
  )
);

$orders = array(
  'alfabetica' => 'Ordem Alfabética',
  'ano' => 'Ano'
);

ipg_get_partial('filters-loops', array(
  'types' => $types,
  'taxonomies' => $taxonomies,
  'orders' => $orders
));
