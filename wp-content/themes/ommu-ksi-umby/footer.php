<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Ommu_Notoboso
 * @since Ommu-Notoboso 5.0.3
 */
?>

	<footer>
		<?php if(is_front_page()) {?>
		<div class="maps">
			<div class="address">
				<div class="box">
					<h3>Contact Info</h3>
					<div class="desc">
					Jl. Jend Sudirman, Yogyakarta,</br>
					Daerah Istimewa Yogyakarta,</br>
					Indonesia (#TuguJogja Location)</br>
					Phone : (+62)811-2540-432</br>
					Email : <a href="mailto:support@tugujogja.ommu.co" title="Support #TuguJogja">support@tugujogja.ommu.co</a>
					</div>
					<div class="social">
						<a class="facebook" href="https://www.facebook.com/hashtag/tugujogja" title="Facebook" target="_blank">Facebook</a>
						<a class="twitter" href="https://twitter.com/hashtag/tugujogja" title="Twitter" target="_blank">Twitter</a>
						<a class="google-plus" href="https://plus.google.com/s/%23tugujogja" title="Google Plus" target="_blank">Google Plus</a>
						<a class="pinterest" href="http://www.pinterest.com/search/?q=tugujogja" title="Pinterest" target="_blank">Pinterest</a>
					</div>
					
				</div>
			</div>
			<div id="maps"></div>
		</div>
		<?php } else {?>
		<div class="social">
			<div class="container clearfix">
				<div class="address">
					Jl. Jend Sudirman, Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia (#TuguJogja Location)</br>
					<span><em>Phone</em>: (+62)811-2540-432</span>
					<span><em>Email</em>: <a href="mailto:support@tugujogja.ommu.co" title="Support #TuguJogja">support@tugujogja.ommu.co</a></span>
				</div>
				<div class="media">
					<a class="facebook" href="https://www.facebook.com/hashtag/tugujogja" title="Facebook" target="_blank">Facebook</a>
					<a class="twitter" href="https://twitter.com/hashtag/tugujogja" title="Twitter" target="_blank">Twitter</a>
					<a class="google-plus" href="https://plus.google.com/s/%23tugujogja" title="Google Plus" target="_blank">Google Plus</a>
					<a class="pinterest" href="http://www.pinterest.com/search/?q=tugujogja" title="Pinterest" target="_blank">Pinterest</a>
				</div>
			</div>
		</div>
		<?php }?>
		<div class="copyright">
			<div class="container clearfix">
				Copyright © 2014 <a href="<?php echo get_permalink(2);?>" title="#TuguJogja">#TuguJogja</a>. All rights reserved.
				<div class="right">
					Design by <a target="_blank" href="http://company.ommu.co/" title="Ommu Platform">ommu.co</a>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
 
 </body>
</html>

<?php /*
	</section><!-- #main .wrapper -->
    
	<?php
        if ( ! is_404() )
        get_sidebar( 'footer' );
    ?>    
        
	<footer id="footer" class="row" role="contentinfo">
        <!--
        <div class="large-7 columns">
        
        	<?php wp_nav_menu( array(
            	'theme_location' => 'secondary',
                'container' => false,
                'menu_class' => 'inline-list left',
                'fallback_cb' => false
            ) ); ?>
                
       	</div><!-- .seven columns -->
             
        <!--     
		<div id="ftxt" class="site-info large-5 columns">
        
			<?php if ( get_theme_mod('ommu_footer_text') ) : echo get_theme_mod( 'ommu_footer_text'); else : ?>
            
				<p><?php _e( 'Powered by', 'ommu_notoboso' ); ?> <a href="<?php echo esc_url(__('http://themeawesome.com/responsive-wordpress-theme/','ommu_notoboso')); ?>" rel="nofollow" target="_blank" title="<?php _e( 'Responsive WordPress Theme by ThemeAwesome.com', 'ommu_notoboso' ); ?>"><?php _e( 'Ommu-Notoboso', 'ommu_notoboso' ); ?></a> &amp; <a href="<?php echo esc_url(__('http://wordpress.org/','ommu_notoboso')); ?>" target="_blank" title="<?php _e( 'WordPress', 'ommu_notoboso' ); ?>"><?php _e( 'WordPress', 'ommu_notoboso' ); ?></a></p>
                
            <?php endif; ?>
            
		</div><!-- .site-info -->        
	               

        <div class="container large-12 columns foots">
            <div class="large-6 columns">
                <h2><i class="fa fa-home"></i> CONTACT INFO</h2>                    
                    <p>Address: No.28-63877 street</p>
                    <p>lorem ipsum city, Country</p>
                    <p>Phone : (123) 456-7890</p>
                    <p>Fax : (123) 456-7890</p>
                    <p>Email : <a href="javascript:;">support@vectorlab.com</a></p>                    
            </div>
            <div class="large-6 columns">
                <h2>STAY CONNECTED</h2>
                    <ul class="social-link-footer">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>                        
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
            </div>    
        </div>  

    </footer><!-- .row --> 
    </div><!-- #wrapper -->    
    
    <div id="backtotop">Top</div><!-- #backtotop -->

<?php wp_footer(); ?>
</body>
</html>
*/?>