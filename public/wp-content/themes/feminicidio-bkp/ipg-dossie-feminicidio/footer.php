<?php

$jquery_cdn_url = 'https://ajax.googleapis.com/ajax/libs/jquery/';
$jquery_cdn_url .= JQUERY_VERSION;
$jquery_cdn_url .= '/jquery.min.js';

$jquery_js_name = (ENV == 'production') ? 'jquery.min.js' : 'jquery.js';
$jquery_js_url = get_bloginfo('template_url');
$jquery_js_url .= '/public/js/' . $jquery_js_name;

?>
    <script src="<?php echo $jquery_cdn_url; ?>"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $jquery_js_url; ?>"><\/script>')</script>

    <?php wp_footer(); ?>
  </body>
</html>
