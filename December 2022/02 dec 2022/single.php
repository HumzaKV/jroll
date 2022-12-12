<?php get_header();
 // Page title
		echo '<div class="page-title full-section">';       
		  echo '<div class="container">';
		   echo '<div class="title-left-area">';
				echo '<h1>';
				   the_title();
				echo '</h1>';
			echo '</div>'; // title-left-area
		  echo '</div>'; // container
		echo '</div>'; // page-title
?>
	<div class="content-wrapper full-section">
        <div class='container'>
           <div class='gdl-page-item'>
             <div class="blog-content-area">
						<?php
                if( have_posts() ){
                    while ( have_posts() ){
                        the_post();?>
            <div class="post-wrapper">
                <div class="post-thumbnail"> <?php echo get_the_post_thumbnail( get_the_ID(), 'post_size' );?> </div>
                <div class="post-info">
                   <div class="post-category"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></div>
                   <div class="post-date"><?php echo get_the_time('F d Y'); ?></div>
                </div>
                <div class="post-title"><h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3></div>
                <div class="post-except"><?php the_content(); ?></div>
             </div>
              <?php }
                }
                ?>	
             </div> <!-- post-content -->
             <div class="sidebar-content-area">
                <?php dynamic_sidebar('Blog'); ?>
             </div>
          </div> <!-- gdl-page-item -->
		</div> <!-- container --> 
	</div> <!-- content-wrapper -->
<?php get_footer(); ?>