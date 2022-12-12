<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="main-wrapper full-section">
<div class="header-wrapper full-section">
	<div class="container">
    	<div class="logo-wrapper">
        	<?php
				$logo = get_field('logo_image', 'option');
				echo '<a href="' . home_url( '/' ) . '">';
					if($logo) {
						echo '<img src="' . $logo . '" />';
					} else {
						echo '<img src="' . get_stylesheet_directory_uri() . '/images/logo.png" />';
					}
				echo '</a>';
			?>
        </div>
        <div class="header-right">
	        <?php
				// Main Menu
				if( has_nav_menu('main-menu') ){   
					echo '<div class="navigation-wrapper">';
							wp_nav_menu(
							array(
								'theme_location'  => 'main-menu',
								'container_class' => 'main-menu'
							));
					echo '</div>';
				}
			?>
			<div class="cart">
			       <a class="xoo-wsc-cart-trigger" href="javascript:void(0)" title="<?php _e( 'View your shopping cart' ); ?>">
			         <i class="fa-solid fa-cart-shopping"></i>
			       </a>
			   <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { $count = WC()->cart->cart_contents_count; ?>
				<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>">
			   <?php 
				if ( $count > 0 ) {
			   ?>
				<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
				<?php
					}
				?>
				</a>
			      <?php } ?>
			</div>
			<div class="my-account" id="account_op">
				<a href="my-account"><i class="fa-solid fa-user"></i></a>				
			</div>
        </div>
    </div>
</div>
<div class="promotion-strip full-section">
  <div class="close-strip"><i class="fa-solid fa-xmark"></i></div>
  <div class="container">
  	<?php 
	   $rows = get_field('promotion_strip_content', 'option');
		if( $rows ) {
		echo '<div id="owl-demo" class="owl-carousel promotion-strip-content">';
		foreach( $rows as $row ) {
		$text = $row['text'];
		  echo '<div class="item">';
			echo ''.$text.'';
		  echo '</div>';
		}
		echo '</div>';
	   }
	?>
  </div>
</div>