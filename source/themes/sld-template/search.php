<?php get_header(); ?>

<main id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2><?php printf( __( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></h2>
			<?php the_content(); ?>
		</article>
	<?php endwhile; else : ?>
		<article id="post-0" class="post no-results not-found">
			<p>Sorry, nothing matched your search. Please try again.</p>
			<?php get_search_form(); ?>
		</article>
	<?php endif; ?>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>