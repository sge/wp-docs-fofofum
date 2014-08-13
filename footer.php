<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
</div><!-- #page -->
<footer id="colophon" role="contentinfo">
  <div class="footer-wrapper">
    <div class="grid col-380">
      <h1>Can’t find your answer?</h1>
      Email Us: <a href="mailto:support@fofofum.com">support@fofofum.com</a>
    </div>
    <!-- <div class="grid col-220">
      <h1>Sales inquiries?</h1>
      <a href="#">Schedule a demo</a> with
      <br />
      one of our sales reps.
    </div> -->
    <div class="grid col-540 fit">
      <a href="http://www.sleepygiant.com" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_sleepygiant.png" class="sleepygiant" alt="sleepy giant" /></a>
      <br />
      <a href="http://www.fofofum.com/" target="_blank">fofofum</a><sup>sm</sup> © <?php _e(date('Y')); ?> Sleepy Giant Entertainment, Inc. All Rights Reserved.
    </div>
  </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>