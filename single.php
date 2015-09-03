<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php if ( ! post_password_required() && ! is_attachment() ) : the_post_thumbnail(); endif; ?>

      <h1 class="title">
        <?php the_title(); ?>
      </h1>

      <div class="meta">
        <span class="date">
          <?php echo get_the_date(); ?>
        </span>
        <span class="comments">
          <a href="<?php the_permalink(); ?>#comments" title="Show Comments">
            <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?>
          </a>
        </span>
        <span class="tags">
          <?php the_tags( ' ', ', ', ''); ?>
        </span>
      </div>

      <div class="content">
        <?php the_content(); ?>
      </div>

    </article>

    <nav id="pagination">
      <?php previous_post_link( '<div class="previous">%link</div>', 'Previous post<span class="desktop-inline">: %title</span>' ); ?>
      <?php next_post_link( '<div class="next">%link</div>', 'Next post<span class="desktop-inline">: %title</span>' ); ?>
      <div class="clearfix"></div>
    </nav>

    <?php comments_template(); ?>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
