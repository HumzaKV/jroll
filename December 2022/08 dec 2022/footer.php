<div class="footer-wrapper full-section">
    <div class="container">
        <div class="footer-col col-1">
            <?php dynamic_sidebar('Footer 1'); ?>
        </div>
        <div class="footer-col col-2">
            <?php dynamic_sidebar('Footer 2'); ?>
        </div>
        <div class="footer-col col-3">
            <?php dynamic_sidebar('Footer 3'); ?>
        </div>
        <div class="footer-col col-4">
            <?php dynamic_sidebar('Footer 4'); ?>
        </div>
        <div class="footer-col col-5">
            <?php dynamic_sidebar('Footer 5'); ?>
        </div>
    </div>
</div>
<div class="copyright-wrapper full-section">
    <div class="container">
        <?php
        $copyright_text = get_field('copyright_text', 'option');
        if ($copyright_text) {
            echo '<div class="copyright-text">';
            echo '<p>' . $copyright_text . '</p>';
            echo '</div>';
        }
        ?>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
    </div>
</div>
<script>
    // Responsive Menu
    jQuery(document).ready(function($) {
        $('.menu-button').click(function() {
            $('.mobile-menu').toggleClass('active');
            $('.mobile-menu').toggle();
            $('.menu-button').toggleClass('open');
        });
        $('.menu-item-has-children').click(function() {
            $(this).toggleClass('active');
        });
        $('.close-strip i').click(function() {
            $('.promotion-strip').toggle();
            $('.promotion-strip').toggleClass('open');
        });
        $(document).on('click', 'ul li.buynow a', function(e) {
            e.preventDefault();
            const url = 'https://staging2.jroll.com/?add-to-cart=697&quantity=1';
            $.ajax({
                type: 'GET',
                url:url,
                success: function(response) {
                    $( document.body ).trigger( 'wc_fragment_refresh' );
                    $('.cart .xoo-wsc-cart-trigger').click();
                },
            });
        })
        $(document).on('wc_fragment_refresh','body',()=>{
            //$('.xoo-wsc-basket').click()
        })
    });
    
    jQuery(document).ready(function ($) {
        jQuery('body *').mouseenter(function (e) {
            if (!jQuery(e.target).parents().andSelf().is('#account_op ul') && !jQuery(e.target).parents().andSelf().is('#account_op a#hover_acc')) {
                jQuery('#account_op ul').stop(true, true).delay(200).fadeOut(200);
            }
        });
        jQuery('#account_op a#hover_acc').mouseenter(function () {
            jQuery('#account_op ul').stop(true, true).delay(200).fadeToggle(200);
        });
    });
</script>
<?php
echo '</div>'; //Main Wrapper
wp_footer();
?>
</body>

</html>