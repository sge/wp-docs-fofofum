<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
  <?php the_breadcrumb(); ?>
	<h1><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<hr />
	<section id="primary" class="grid col-700 search">
		<div id="content" role="main">
		<div class="count">
			Showing <?php
				$num_cb = $wp_query->post_count;
				$id_cb = $paged;
				$r_cb=1;
				$startNum_cb = $r_cb;
				$endNum_cb = 10;
				if($id_cb >=2) {
				  $s_cb=$id_cb-1;
				  $r_cb=($s_cb * 10) + 1;
				  $startNum_cb=$r_cb;
				  $endNum_cb=$startNum_cb + ($num_cb -1);
				}

				if (have_posts()) :
				 echo "<b>$startNum_cb-$endNum_cb</b>";
				endif;

				$totaltime= number_format($load,4);
			?> of <?php echo $wp_query->found_posts; ?> Result<?php if ($wp_query->found_posts > 1) : ?>s<?php endif; ?>
		</div>

		<?php if ( have_posts() ) : ?>


			<?php twentytwelve_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php # get_template_part( 'content', get_post_format() ); ?>
				<article id="post-733" class="post-733 page type-page status-publish hentry">
					<header class="entry-header">
						<h1 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title();  ?></a></h1>
						<h2><?php echo get_permalink(); ?></h2>
					</header>
					<div class="entry-summary">
						<p>
							<?php
								$content = get_the_content();
                $trimmed_content = wp_trim_words( $content, 25, '<a href="'. get_permalink() .'"> ...</a>' );
                echo $trimmed_content;
              ?>
						</p>
					</div>
				</article>
			<?php endwhile; ?>

			<?php twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar('search'); ?>
<?php get_footer(); ?>