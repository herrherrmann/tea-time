<?php get_header(); ?>

  <article>

    <h1 class="page-title error">Page not found!</h1>
    <p>Hi! Unfortunately this page was not found.</p>
    <p>Please try going back to the <a href="<?php echo home_url(); ?>">Blog</a> and start another journey through the huge landscape that is this website.</p>
    <img src="<?php echo get_template_directory_uri(); ?>/img/404.jpg" class="aligncenter" alt="404" title="What happened?!">

  </article>

<?php get_footer(); ?>
