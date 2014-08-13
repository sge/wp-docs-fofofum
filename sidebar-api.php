<?php
/**
 * The sidebar for API.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<div id="secondary" class="widget-area left-sidebar api-sidebar" role="complementary">
  <?php
    if($post->post_parent)
      $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
    else
      $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
    if ($children) {
      $parent_title = get_the_title($post->post_parent);
  ?>
    <ul>
      <li class="parent_item"><a href="<?php echo get_permalink($post->post_parent) ?>"><?php echo $parent_title;?></a></li>
      <?php echo $children; ?>
    </ul>
  <?php
    }
  ?>
</div><!-- #secondary -->