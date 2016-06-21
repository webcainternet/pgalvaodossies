<?php

$email_subject = urlencode(get_bloginfo('name') . '-' . get_the_title());
$email_body = urlencode(get_the_excerpt());

?>

<div class="social-media-box js-shared-container"
  data-url="<?php the_permalink(); ?>"
  data-title="<?php the_title(); ?>"
  data-caption="<?php get_bloginfo('name'); ?>"
  data-description="<?php the_excerpt(); ?>"
  data-picture="<?php echo bloginfo('template_url'); ?>/public/images/social-thumb.png">
  <span class="social-media-box__title">Compartilhe:</span>
  <a class="social-media-box__icon" href="#"><span class="icon icon-facebook3 js-fb-share"></span></a>
  <a class="social-media-box__icon" href="#"><span class="icon icon-twitter3 js-twitter-share"></span></a>
  <a class="social-media-box__icon" href="#"><span class="icon icon-google-plus3 js-gplus-share"></span></a>
  <a class="social-media-box__icon" href="mailto:?subject=<?php echo $email_subject; ?>&body=<?php echo $email_body; ?>"><span class="icon icon-mail5"></span></a>
</div>
