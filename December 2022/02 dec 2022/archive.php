<?php get_header();
 // Page title
		echo '<div class="page-title full-section">';       
		  echo '<div class="container">';
				echo '<h1>';
				   foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; }  
				echo '</h1>';
		  echo '</div>'; // container
		echo '</div>'; // page-title
?>

<div class="content-wrapper full-section">
<div class="container">
  <div class="gdl-page-item">
    <div class="blog-content-area">
			<?php
            if (have_posts()) {
                while (have_posts()) {
            the_post(); ?>
            <?php get_template_part( 'blog', 'loop' ); ?>
            <?php }
            }
            ?>
<!--         <div class="page-navi"><?php //wp_pagenavi(); ?></div> -->
    </div>
  <div class="sidebar-content-area">
    <?php dynamic_sidebar('Blog'); ?>
  </div>
</div>
</div><!-- .container -->

<?php get_footer(); ?>