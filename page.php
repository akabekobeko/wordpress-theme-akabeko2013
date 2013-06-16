<?php get_header(); ?>

<div id="main">
	<div id="primary">
		<div id="content-single">

<?php if( have_posts() ) :
while( have_posts() ) : the_post(); ?>
			<!-- post -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="post-meta">
					<?php edit_post_link( __( 'Edit' ), '<i class="icon-edit"></i> ', '' ); ?> 
					<i class="icon-calendar-empty"></i> <span class="post-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
					<i class="icon-comment"></i> <span class="comment-num"><?php comments_popup_link( '0','1','%','','-' ); ?></span>
				</div>

				<?php the_content(); ?>

				<?php comments_template(); ?>
			</article>
			<!-- /post -->
<?php endwhile;
else : ?>
			<article class="post">
				<h2>No page found</h2>
				<p>Page you are looking for was not found.</p>
			</article>
<?php endif; ?>

		</div><!-- /content-single -->
	</div><!-- /primary -->
</div><!-- /main -->

<?php get_footer(); ?>