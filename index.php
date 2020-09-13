<?php get_header() ?>

<?php

if (have_posts()) {
  while (have_posts()) {
    the_post();

    get_template_part('components/content-header');

    the_excerpt();
    the_content();
    the_post_thumbnail();
  }
}
?>


<?php get_footer() ?>