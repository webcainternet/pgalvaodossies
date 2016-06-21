<?php

function ipg_get_partial($partial, $vars = false) {
  if ($vars) {
    extract($vars, EXTR_OVERWRITE);
  }

  include(PATHS_PARTIALS . '/_' . $partial . '.html.php');
}

function ipg_get_svg($svg) {
  include(PATHS_SVG . '/' . $svg . '.svg');
}
