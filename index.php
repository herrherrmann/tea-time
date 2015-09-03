<?php get_header(); ?>

    <?php if (is_tag()) {
      $tag = get_queried_object();
      single_tag_title('<div class="info">Currently selected Tag: <a href="' . get_tag_link($tag->term_id) . '"><strong>');
      echo '</strong></a></div>';
    }?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if ( ! post_password_required() && ! is_attachment() ) : the_post_thumbnail(); endif; ?>

        <h1 class="title">
          <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h1>

        <div class="meta">
          <span class="date">
            <?php echo get_the_date(); ?>
          </span>
          <span class="comments">
            <a href="<?php the_permalink(); ?>#comments" title="Show comments">
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

    <?php endwhile; ?>

    <nav id="pagination">
      <div class="previous">
        <?php next_posts_link( 'Older posts' ); ?>
      </div>
      <div class="next">
        <?php previous_posts_link( 'Newer posts' ); ?>
      </div>
      <div class="clearfix"></div>
    </nav>

    <?php else : ?>
      <p>Sorry, no posts found.</p>
    <?php endif; ?>

<?php get_footer(); ?>
