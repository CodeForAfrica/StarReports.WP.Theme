<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ProfitMag
 */
 
$profitmag_settings = get_option( 'profitmag_options' );
?>

	</div><!-- #content -->
    </div><!-- content-wrapper-->

	<footer id="colophon" class="site-footer clearrfix" role="contentinfo">
        <div class="wrapper footer-wrapper clearfix">

                <div class="top-bottom clearfix">
                		<div id="footer-top">
                            <div class="footer-columns">
                                
                                <?php if( is_active_sidebar( 'fo-top-col-one' ) || is_active_sidebar( 'fo-top-col-two' ) || is_active_sidebar( 'fo-top-col-three' ) || is_active_sidebar( 'fo-top-col-four' ) || 
                                    is_active_sidebar( 'fo-top-col-five' ) ||  is_active_sidebar( 'fo-top-col-six' ) ) : ?>
                                        <div class="footer1 col">
                                            <?php if( is_active_sidebar( 'fo-top-col-one' ) ) : ?>
                                                    <div class="footer-logo" class="footer-widget">
                                                     <?php   dynamic_sidebar( 'fo-top-col-one' ); ?>
                                                    </div>
                                                    
                                                    
                                            <?php endif; ?>
                                            
                                            <?php if( $profitmag_settings['show_social_header'] == 0 ) { ?>
                                                        <div class="social-links">
                                                            <?php do_action( 'profitmag_social_links' ); ?>
                                                        </div>   
                                            <?php } ?>
                                                        
                                        </div>
                                        
                                        <?php if( is_active_sidebar( 'fo-top-col-two' ) ) : ?>
                                                <div class="footer2 col" class="footer-widget">
                                                 <?php   dynamic_sidebar( 'fo-top-col-two' ); ?>
                                                </div>
                                        <?php endif; ?>
                                        
                                        <?php if( is_active_sidebar( 'fo-top-col-three' ) ) : ?>
                                                <div class="footer3 col" class="footer-widget">
                                                 <?php   dynamic_sidebar( 'fo-top-col-three' ); ?>
                                                </div>
                                        <?php endif; ?>
                                        
                                        <?php if( is_active_sidebar( 'fo-top-col-four' ) ) : ?>
                                                <div class="footer4 col" class="footer-widget">
                                                 <?php   dynamic_sidebar( 'fo-top-col-four' ); ?>
                                                </div>
                                        <?php endif; ?>
                                        
                                        <?php if( is_active_sidebar( 'fo-top-col-five' ) ) : ?>
                                                <div class="footer5 col" class="footer-widget">
                                                 <?php   dynamic_sidebar( 'fo-top-col-five' ); ?>
                                                </div>
                                        <?php endif; ?>
                                        
                                        <?php if( is_active_sidebar( 'fo-top-col-six' ) ) : ?>
                                                <div class="footer6 col" class="footer-widget">
                                                 <?php   dynamic_sidebar( 'fo-top-col-six' ); ?>
                                                </div>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <!-- Preview Content --> 
                                        <div class="top-bottom clearfix">
                                    		<div id="footer-top">
                                                <div class="footer-columns">                                                    
                                                    <div class="footer1 col">
                                                        <div class="footer-logo">
                                                            <aside id="text-4" class="widget widget_text">			
                                                                <div class="textwidget"><img src="http://wpgaint.com/wpgiantthemes/profitmag/wp-content/uploads/2014/10/profitmag1.png">
                                                                </div>
                		                                    </aside>                                            
                                                        </div>
                                                         
                                                        <div class="social-links">
                                                            <div class="socials">
                                            		    		<a href="#" class="facebook" data-title="Facebook" target="_blank"><span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span></a>                        		    
                                            		    		<a href="#" class="twitter" data-title="Twitter" target="_blank"><span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span></a>                        		    
                                            		    		<a href="#" class="pinterest" data-title="Pinterest" target="_blank"><span class="font-icon-social-pinterest"><i class="fa fa-pinterest"></i></span></a>                        		    
                                            		    		<a href="#" class="linkedin" data-title="Linkedin" target="_blank"><span class="font-icon-social-linkedin"><i class="fa fa-linkedin"></i></span></a>
                                            				</div>
                                                        </div>                                                                                                           
                                                    </div>
                                                    
                                                     
                                                     <div class="footer2 col">
                                                             <aside  class="widget widget_nav_menu"><h3 class="widget-title"><span>Footer</span></h3>
                                                                <div class="menu-menu-1-container">
                                                                    <ul id="menu-menu-1" class="menu">
                                                                        <li><a href="#">Footer 1</a></li>
                                                                        <li><a href="#">Footer 2</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 4</a></li>
                                                                    </ul>
                                                                </div>
                                                             </aside>                                        
                                                     </div>
                                                     <div class="footer2 col">
                                                             <aside  class="widget widget_nav_menu"><h3 class="widget-title"><span>Footer</span></h3>
                                                                <div class="menu-menu-1-container">
                                                                    <ul id="menu-menu-1" class="menu">
                                                                        <li><a href="#">Footer 1</a></li>
                                                                        <li><a href="#">Footer 2</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 4</a></li>
                                                                    </ul>
                                                                </div>
                                                             </aside>                                        
                                                     </div>
                                                     <div class="footer2 col">
                                                             <aside  class="widget widget_nav_menu"><h3 class="widget-title"><span>Footer</span></h3>
                                                                <div class="menu-menu-1-container">
                                                                    <ul id="menu-menu-1" class="menu">
                                                                        <li><a href="#">Footer 1</a></li>
                                                                        <li><a href="#">Footer 2</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 4</a></li>
                                                                    </ul>
                                                                </div>
                                                             </aside>                                        
                                                     </div>
                                                     <div class="footer2 col">
                                                             <aside  class="widget widget_nav_menu"><h3 class="widget-title"><span>Footer</span></h3>
                                                                <div class="menu-menu-1-container">
                                                                    <ul id="menu-menu-1" class="menu">
                                                                        <li><a href="#">Footer 1</a></li>
                                                                        <li><a href="#">Footer 2</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 4</a></li>
                                                                    </ul>
                                                                </div>
                                                             </aside>                                        
                                                     </div>
                                                     <div class="footer2 col">
                                                             <aside  class="widget widget_nav_menu"><h3 class="widget-title"><span>Footer</span></h3>
                                                                <div class="menu-menu-1-container">
                                                                    <ul id="menu-menu-1" class="menu">
                                                                        <li><a href="#">Footer 1</a></li>
                                                                        <li><a href="#">Footer 2</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 3</a></li>
                                                                        <li><a href="#">Footer 4</a></li>
                                                                    </ul>
                                                                </div>
                                                             </aside>                                        
                                                     </div>
                                                     
                                                                                    
                                                                                            
                                                </div>
                        
                        </div><!-- #foter-top -->
                                <?php endif; ?>
                                
                            </div>
                        
                        </div><!-- #foter-top -->
                        
                        <div id="footer-bottom">                            
                                <?php if( is_active_sidebar( 'fo-bottom-col-one' ) || is_active_sidebar( 'fo-bottom-col-two' ) ||  is_active_sidebar( 'fo-bottom-col-three' ) || is_active_sidebar( 'fo-bottom-col-four' ) ) : ?>
                                    <div class="footer-columns">

                                        <?php if( is_active_sidebar( 'fo-bottom-col-one' ) ) : ?>
                                                <div class="footer1 col" class="footer-widget">
                                                 <?php   dynamic_sidebar( 'fo-bottom-col-one' ); ?>
                                                </div>
                                        <?php endif; ?>
                                        
                                        <?php if( is_active_sidebar( 'fo-bottom-col-two' ) ) : ?>
                                                <div class="footer2 col" class="footer-widget">
                                                 <?php   dynamic_sidebar( 'fo-bottom-col-two' ); ?>
                                                </div>
                                        <?php endif; ?>
                                        <div class="clear"></div>
                                        <?php if( is_active_sidebar( 'fo-bottom-col-three' ) ) : ?>
                                                <div class="footer3 col" class="footer-widget">
                                                 <?php   dynamic_sidebar( 'fo-bottom-col-three' ); ?>
                                                </div>
                                        <?php endif; ?>
                                        
                                        <?php if( is_active_sidebar( 'fo-bottom-col-four' ) ) : ?>
                                                <div class="footer4 col" class="footer-widget">
                                                 <?php   dynamic_sidebar( 'fo-bottom-col-four' ); ?>
                                                </div>
                                        <?php endif; ?>                
                               
                                </div>
                            <?php endif; ?>
                        </div><!-- #foter-bottom -->
                </div><!-- top-bottom-->
                <div class="footer-copyright border t-center">
                    <p><?php if( !empty( $profitmag_settings['footer_copyright'] ) && $profitmag_settings['footer_copyright'] != '' ): ?>                        
                                    <?php echo $profitmag_settings['footer_copyright']; ?>
                            <?php endif; ?>
                    </p>
                    <p><?php echo sprintf( __('WordPress Theme by <a target="_blank" href="%s">WpGaint</a>'), esc_url('http://www.wpgaint.com/')); ?></p>
                </div>

        </div><!-- footer-wrapper-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
