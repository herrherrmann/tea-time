<?php if ( post_password_required() ) return; ?>

<div id="comments">

  <h2><?php _e('Comments', 'tea-time'); ?></h2>
  <?php if ( have_comments() ) : ?>
    <?php foreach ($comments as $comment) : ?>
      <div class="comment" id="comment-<?php comment_ID(); ?>">

        <div class="meta">
          <?php echo get_avatar( $comment, 32 ); ?>
          <a href="<?php comment_author_url(); ?>" target="_blank" class="author">
            <?php comment_author(); ?>
          </a>
          <br>
          <span class="date">
            <?php comment_date(); ?> <?php comment_time(); ?>
          </span>
        </div><!-- .meta -->

        <div class="content">
          <?php comment_text(); ?>
          <?php if ($comment->comment_approved == '0') : ?>
            <p class="text-muted">
              <?php _e('Your comment needs to be approved before it will be publicly shown.', 'tea-time'); ?>
            </p>
          <?php endif; ?>
        </div>

      </div><!-- .comment -->
    <?php endforeach; /* end for each comment */ ?>

  <?php if ( get_comment_pages_count()>1 && get_option( 'page_comments' ) ) : ?>
    <nav id="pagination">
      <div class="previous">
        <?php previous_comments_link( __( 'Older Comments', 'tea-time' ) ); ?>
      </div>
      <div class="next">
        <?php next_comments_link( __( 'Newer Comments', 'tea-time' ) ) ?>
      </div>
      <div class="clearfix"></div>
    </nav>
  <?php endif; ?>

  <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="text-muted">
      <?php _e('Comments are closed.', 'tea-time'); ?>
    </p>
  <?php endif; ?>

  <?php else : ?>
    <p class="text-muted">
      <?php _e('No comments yet.', 'tea-time'); ?>
    </p>
  <?php endif; ?>

</div><!-- #comments -->

<?php comment_form( array(
  'title_reply'    => __( 'Leave a comment', 'tea-time' ),
  'title_reply_to' => __( 'Reply to this comment', 'tea-time' ),
  'label_submit'   => __( 'Add comment', 'tea-time' ),
  'fields'         => apply_filters( 'comment_form_default_fields', array(
    'author' =>
      '<p class="comment-form">' . '
        <label for="author">' . __( 'Name', 'tea-time' ) . ( $req ? '*' : '' ) . '</label>' . '
        <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30" ' . $aria_req . ' required>
      </p>',
    'email' =>
      '<p class="comment-form"><label for="email">' . __( 'Email', 'tea-time' ) . ( $req ? '*' : '' ) . '</label>' . '
        <input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
        '" size="30" ' . $aria_req . ' required>
      </p>',
    'url' =>
      '<p class="comment-form">
        <label for="url">' . __( 'Website', 'tea-time' ) . '</label>' . '
        <input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '" size="30" />
      </p>' ) ),
    'comment_field' => '
        <p class="comment-form">
          <label for="comment">' . _x( 'Comment', 'noun', 'tea-time' ) . '*</label>
          <textarea id="comment" name="comment" cols="45" rows="5" aria-required="true" required>' . '</textarea>
        </p>',
    // 'comment_notes_after' => '',
    'comment_notes_before' => ''
)); ?>
