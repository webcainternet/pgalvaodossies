<?php

// TODO: Dar um jeito em cidades
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
  ),
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
    'name' => 'Tipos de violência',
    'key' => 'violencias'
  )
);

$orders = array(
  'relevancia' => 'Relevância',
  'alfabetica' => 'Ordem Alfabética'
);

ipg_get_partial('filters-loops', array(
  'types' => $types,
  'taxonomies' => $taxonomies,
  'orders' => $orders
));
