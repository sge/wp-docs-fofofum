<?php
/**
 * The sidebar for FAQ's.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<div id="secondary" class="widget-area left-sidebar faq-sidebar" role="complementary">
   <?php
    $taxonomy     = 'faq_category';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no
    $title        = '';
    $empty        = 0;

    $args = array(
      'taxonomy'     => $taxonomy,
      'orderby'      => $orderby,
      'show_count'   => $show_count,
      'pad_counts'   => $pad_counts,
      'hierarchical' => $hierarchical,
      'title_li'     => $title,
      'hide_empty'   => $empty,
      'walker'       => new faq_slug_walker
    );
  ?>
  <div class="faq-list">
    <ul>
      <li class="parent_item"><a href="#">All</a></li>
      <?php wp_list_categories($args); ?>
    </ul>
  </div>

  <div class="contact-nav">
    <ul>
      <!-- <li>
        <a href="#">Contact Us</a>
      </li> -->
      <li>
        <a href="mailto:#">Email us</a>
      </li>
      <li>
        Join #sleepygiant<br />
        on Twitter
      </li>
    </ul>
  </div>
</div><!-- #secondary -->