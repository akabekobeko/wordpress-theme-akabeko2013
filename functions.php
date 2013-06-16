<?php

load_theme_textdomain( 'akabeko2013', get_template_directory() . '/languages' );

// Require: Content width
if( ! isset( $content_width ) ) { $content_width = 640; }add_theme_support( 'automatic-feed-links' );

// Require: Post thumbnail
add_theme_support( 'post-thumbnails' );

// Require: Support sidebar
register_sidebar(
	array( 'name'          => 'Sidebar',
		   'id'            => 'sidebar-1',
		   'description'   => 'Suderbar area',
		   'before_widget' => '<div id="%1$s" class="widget %2$s">',
		   'after_widget'  => '</div>',
	)
);

/**
 * Get the comments of the article.
 *
 * @return comments.
 */
function get_comment_only_number()
{
	global $wpdb, $tablecomments, $post;
	$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type NOT REGEXP '^(trackback|pingback)$' AND comment_approved = '1'");

	return count( $comments );
}

/**
 * Output the pin-backs to the article.
 *
 * @param $comment Comment.
 * @param $args    Default args.
 * @param $depth   Defaukt depth.
 */
function mytheme_pings( $comment, $args, $depth )
{
	$GLOBALS['comment'] = $comment; ?>
	<li><i class="icon-external-link-sign"></i> <?php echo comment_date(); ?> : <?php comment_author_link(); ?>
<?php }

/**
 * Output the comment to the article.
 *
 * @param $comment Comment.
 * @param $args    Default args.
 * @param $depth   Defaukt depth.
 */
function mytheme_comment( $comment, $args, $depth )
{
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment-body">
		<?php echo get_avatar( $comment->comment_author_email, 40 ); ?>
		<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link()) ?>
		<div class="comment-meta">
			<?php printf( __( '%1$s' ), get_comment_date() . ' ' . get_comment_time() ) ?><?php edit_comment_link( __( 'Edit' ),'  ','' ) ?>
		</div>
		<?php if( $comment->comment_approved == '0') : ?>
			<p class="wait">*Pending*</p>
		<?php endif; ?>
		<?php comment_text() ?>
		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply <i class="icon-reply"></i>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
		</div>
	</div>
<?php }

/**
 * Customize the tag-cloud.
 *
 * @param $args Default settings.
 *
 * @return New settings.
 */
function mytheme_widget_tag_cloud_args( $args )
{
	$args = array(
		'unit'     => 'em',
		'number'   => 30,
		'smallest' => 0.6,
		'largest'  => 1.2
	);

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'mytheme_widget_tag_cloud_args');

?>