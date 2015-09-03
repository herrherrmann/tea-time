<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="content">
      <?php the_content(); ?>
    </div>

  </article>

<?php endwhile; ?>

<?php get_footer(); ?>
