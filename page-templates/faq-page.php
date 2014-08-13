<?php
/**
 * Template Name: FAQ Template
 *
 * Description: This page allows for a custom sidebar to go with the FAQs page.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
  <?php the_breadcrumb(); ?>
  <h1><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent ); ?></h1>
  <hr />
  <div id="primary" class="grid-right col-700 fit faq">
    <div id="content" role="main">

      <div class="content-boundingbox clearfix">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'page' ); ?>
        <?php endwhile; // end of the loop. ?>
      </div>


    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_sidebar('faq'); ?>
<?php get_footer(); ?>