<?php get_header(); ?>

    <article>
      <h1 class="title"><?php _e( 'Software', 'tea-time' ); ?></h1>
      <?php show_page_content( 'software-content' ); ?>
    </article>

    <?php $loop = new WP_Query( array(
      'post_type'      => 'software',
      'posts_per_page' => 10,
      'order'          => 'DESC'
    )); ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if ( ! post_password_required() && ! is_attachment() ) : the_post_thumbnail(); endif; ?>
        <h1 class="title">
          <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h1>
        <div class="content">
          <?php the_content(); ?>
        </div>

      </article>

    <?php endwhile; ?>

    <nav id="pagination">
      <div class="previous">
        <?php next_posts_link( '<i class="fa fa-arrow-circle-left"></i> ' . __( 'Older projects', 'tea-time' ) ); ?>
      </div>
      <div class="next">
        <?php previous_posts_link(  __( 'Newer projects', 'tea-time' ) . ' <i class="fa fa-arrow-circle-right"></i>' ); ?>
      </div>
      <div class="clearfix"></div>
    </nav>

<?php get_footer(); ?>
