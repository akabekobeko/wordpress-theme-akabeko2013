<?php get_header(); ?>

<!-- main -->
<div class="page-main">
	<div class="page-primary">
		<div class="page-content">

<?php if( have_posts() ) :
while( have_posts() ) : the_post(); ?>
			<!-- post -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post-header">
					<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<div class="post-meta">
						<i class="icon-calendar-empty"></i> <span class="post-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
						<i class="icon-comment"></i> <span class="comment-num"><?php comments_popup_link( '0','1','%','','-' ); ?></span>
						<br>
						<i class="icon-folder-close" title="category"></i> <?php the_category( ', ' ); ?> 
						<i class="icon-tags" title="tags"></i> <?php the_tags( '', ', ' ); ?>
					</div>
				</div>

				<?php the_content( __( '(more...)' ) ); ?>

			</article>
			<!-- /post -->
<?php endwhile;
else : ?>
			<article class="post">
				<h2><?php __( 'No posts found', 'akabeko2013' ); ?></h2>
				<p><?php __( 'Posts you are looking for was not found.', 'akabeko2013' ); ?></p>
			</article>
<?php endif; ?>

			<!-- post navigation -->
			<nav class="post-navigation">
				<div class="alignleft"><?php previous_posts_link( '<i class=" icon-chevron-sign-left icon-large"></i> PREV' ); ?></div>
				<div class="alignright"><?php next_posts_link( 'NEXT <i class=" icon-chevron-sign-right icon-large"></i>' ); ?></div>
				<div class="clear"></div>
			</nav>
			<!-- /post navigation -->
		</div>
		<!-- /content -->
	</div>
	<!-- /primary -->

	<?php get_sidebar(); ?>

	<div class="clear"></div>
</div>
<!-- /main -->

<?php get_footer(); ?>