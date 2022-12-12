<?php get_header();
 /* 
 * The default page template
 */
$show_page_title = get_field('show_page_title');
if ($show_page_title == 'true') {
	// Page title
		{
	  echo '<div class="page-banner full-section">';
			 if ( has_post_thumbnail() ) { ?>
			<div class="featured-image" style="background:url(<?php the_post_thumbnail_url();?>) no-repeat center;background-size:cover;"></div>
               <?php }  else { ?> 
            <div class="featured-image" style="background:url(<?php echo wp_get_attachment_url( 965 ); ?>) no-repeat center;background-size:cover;"></div>        
            <?php } 	
		echo '<div class="page-title">';       
		  echo '<div class="container">';
			echo '<h1>';
			   the_title();
			echo '</h1>';
		  echo '</div>'; // container
		echo '</div>'; // page-title
    echo '</div>'; // page-banner
		}
	}
?>
<div class="content-wrapper full-section">
<div class="container">
	<div class="gdl-page-item">
	<?php
		if( have_posts() ){
			while ( have_posts() ){
				the_post();
				the_content();
			}
		}
		?>		
	</div>
</div>
</div>
<?php get_footer(); ?>