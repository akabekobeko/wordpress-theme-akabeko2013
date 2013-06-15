<?php

// ★コンテンツ幅の定義
if( ! isset( $content_width ) ) { $content_width = 640; }

// ★「RSS 登録」、「投稿サムネイル」
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

// サイドバー登録
register_sidebar(
	array( 'name' => 'サイドバーウィジット-1',
		   'id' => 'sidebar-1',
		   'description' => 'サイドバーのウィジットエリアです。',
		   'before_widget' => '<div id="%1$s" class="widget %2$s">',
		   'after_widget' => '</div>',
	)
);

/**
 * 記事のコメント数を取得します。
 *
 * @return コメント数。
 */
function get_comment_only_number() {
	global $wpdb, $tablecomments, $post;
	$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type NOT REGEXP '^(trackback|pingback)$' AND comment_approved = '1'");

	return count( $comments );
}

/**
 * 記事に対するピンバックを出力します。
 *
 * @param $comment コメント。
 * @param $args
 * @param $depth
 */
function mytheme_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li><i class="icon-external-link-sign"></i> <?php echo comment_date(); ?> : <?php comment_author_link(); ?>
<?php }

/**
 * 記事に対するコメントを出力します。
 *
 * @param $comment コメント。
 * @param $args
 * @param $depth
 */
function mytheme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment-body">
		<?php echo get_avatar( $comment->comment_author_email, 40 ); ?>
		<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link()) ?>
		<?php if( $comment->comment_approved == '0') : ?>
			<p class="wait">*このコメントはただいま承認待ちです*</p>
		<?php endif; ?>
		<div class="comment-meta">
			<?php printf( __( '%1$s' ), get_comment_date() . ' ' . get_comment_time() ) ?><?php edit_comment_link( __( 'Edit' ),'  ','' ) ?>
		</div>
		<?php comment_text() ?>
		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => '返信 <i class="icon-reply"></i>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
		</div>
	</div>
<?php }

?>