<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ProfitMag
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/css/custom.css'; ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
        $settings = get_option( 'profitmag_options' );    
?>

<div id="page" class="hfeed site">
	

	<header id="masthead" class="site-header clearfix" role="banner">
        <div class="top-header-block clearfix">
            <div class="wrapper">

                        <?php 
                            $recent_args = array(
                                            'numberposts' => 5,
                                            'post_status' => 'publish',      
                                            );
                            $recent_posts = wp_get_recent_posts( $recent_args );
                            if( !empty( $recent_posts ) ):
                        ?>
                                <div class="header-latest-posts f-left">                                                                    
                                    <ul id="js-latest" class="js-hidden">                        
                                    <?php foreach( $recent_posts as $recent ): ?>
                                            
                                            <li><a href="<?php echo get_permalink( $recent["ID"] ); ?>" title="<?php echo esc_attr( $recent['post_title'] ); ?>"><?php echo $recent['post_title']; ?></a></li>
                                             
                                    <?php endforeach; ?>
                                    </ul>
                                </div> <!-- .header-latest-posts -->
                        <?php                    
                           endif; 
                        ?>
                        
                        <div class="right-header f-right">
                            <?php
                                if( $settings['show_social_header'] == 0 ) {
                                    do_action( 'profitmag_social_links' );   
                                }
                            ?>
                        </div>
             </div>          
         </div><!-- .top-header-block -->
        <header id="topbar">
            <div class="download_app">
                <a href="https://play.google.com/store/apps/details?id=org.codeforafrica.starreports" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/gplay.png"> Get the app on Play Store & start submitting reports</a>
            </div>
            <ul>
                <li class="first leaf classic-105 mid-1819"><a href="http://www.ustream.tv/channel/classic105-kenya?utm_campaign=JPER&amp;utm_medium=FlashPlayer&amp;utm_source=embed" title="" target="_blank">Classic 105</a></li>
                <li class="leaf east-fm mid-1822"><a href="http://www.ustream.tv/channel/east-fm?utm_campaign=JPER&amp;utm_medium=FlashPlayer&amp;utm_source=embed" title="" target="_blank">East fm</a></li>
                <li class="leaf kiss-100 mid-1818"><a href="http://www.ustream.tv/channel/kiss100-kenya?utm_campaign=JPER&amp;utm_medium=FlashPlayer&amp;utm_source=embed" title="" target="_blank">Kiss 100</a></li>
                <li class="leaf radio-jambo mid-1820"><a href="http://www.ustream.tv/channel/radiojambo-fm?utm_campaign=JPER&amp;utm_medium=FlashPlayer&amp;utm_source=embed" title="" target="_blank">Radio Jambo</a></li>
                <li class="last leaf xfm mid-1821"><a href="http://www.ustream.tv/channel/xfm-kenya?utm_campaign=JPER&amp;utm_medium=FlashPlayer&amp;utm_source=embed" title="" target="_blank">XFM</a></li>
            </ul>
        </header>
        <div class="wrapper header-wrapper clearfix">

        		<div class="header-container">
                    <div class="site-branding clearfix">
            			<div class="site-logo f-left">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php if( get_header_image() ): ?>
                                    <img src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>" />
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri().'/images/logo.png'; ?>" >
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="span4" style="float:right;width:280px !important;">

                            <div class="date-section">
                                <?php date_default_timezone_set("Africa/Nairobi"); echo date('l, M j<\sup>S</\sup> Y');?>
                            </div>
                            <div class="search-block">
                                <?php echo get_search_form(); ?>
                            </div>
                            <div class="input-append" style="display:none;">
                                <input type="text" placeholder="Type to search..." class="search" id="main_search">
                                <script>
                                    jQuery(document).ready(function(){
                                        jQuery('#main_search').keypress(function (e) {
                                            if (e.which == 13) {
                                                jQuery('#site_search_submit').click();
                                                return false;    //<---- Add this line
                                            }
                                        });

                                        jQuery('#site_search_submit').click(function(){

                                            if(jQuery('#main_search').val().length == 0){
                                                alert('Please enter a search query!');
                                            }else{
                                                window.location = "http://the-star.co.ke/search/node/" + jQuery('#main_search').val();
                                            }

                                        });
                                    });
                                </script>

                                <button class="btn add-on red_button" role="button" id="site_search_submit">
                                    <i class="icon-search"></i>
                                </button>
                            </div>
                        </div>
                        <?php if( !empty( $settings['header_ads'] ) && $settings['header_ads'] != '' ): ?>
                                   <div class="header-ads f-right">
                                        <?php echo $settings['header_ads']; ?>
                                   </div>
                        <?php endif; ?>
                        			
            		</div>
            
            		<nav id="site-navigation" class="main-navigation clearfix <?php do_action( 'profitmag_menu_alignment' ); ?>" role="navigation" >
            			<div class="desktop-menu clearfix">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                        <div class="search-block">
                            <?php if( !empty( $settings['show_search']) && $settings['show_search'] == 1 ): ?>
                                <?php echo get_search_form(); ?>
                            <?php endif; ?>
                        </div>
                        </div>
                        <div class="responsive-slick-menu clearfix"></div>
                        
            		</nav><!-- #site-navigation -->
        
                </div> <!-- .header-container -->
        </div><!-- header-wrapper-->
        
	</header><!-- #masthead -->
    

    <div class="wrapper content-wrapper clearfix">
        <?php
            if(is_home() || is_front_page() ){
        ?>
        <div class="slider-feature-wrap clearfix">
            <!-- Slider -->
            <?php //do_action( 'profitmag_slider' ); ?>
                    <!-- Slider -->
                    <script type="text/javascript">
                        jQuery(document).ready(function() {

                            jQuery('.home-bxslider').bxSlider( {
                                pager: false,
                                auto: true,

                            });
                        })
                    </script>
                    <!--Get featured posts -->
                    <?php
                    $args = array(
                        'posts_per_page'   => 5,
                        'orderby'          => 'post_date',
                        'order'            => 'DESC',
                        'post_type'        => 'post',
                        'post_status'      => 'publish',
                        'meta_key'        => 'post_featured',
                        'meta_value'        => '1',
                        'suppress_filters' => true
                    );
                    $posts_array = get_posts( $args );
                    ?>
                    <div class="slider-section">
                        <ul class="home-bxslider">
                            <?php
                                $i = 0;
                                foreach($posts_array as $p){
                                    if($i==0){
                                        print '<li><a href="'.$p->guid.'">
                                            '.get_the_post_thumbnail( $p->ID, 400, 'thumbnail' ).'
                                            <div class="slider-desc">
                                                <div class="slide-date">
                                                    <i class="fa fa-calendar"></i>'.$p->post_date.'
                                                </div>
                                                <div class="slider-details">
                                                    <div class="slide-title">'.$p->post_title.'</div>
                                                    <div class="slide-caption"></div>
                                                </div>
                                            </div></a>
                                        </li>';
                                    }
                                    $i++;
                                }
                            ?>
                        </ul>
                    </div>

                    <!-- Featured Post Beside Slider -->
                    <div class="besides-block">
                        <?php
                        $i = 0;
                        //print_r($posts_array);
                        foreach($posts_array as $p){
                            if($i>0){
                                print'<div class="beside-post clearfix">
                            <a href="'.$p->guid.'">
                                <figure class="beside-thumb clearfix">
                                    '.get_the_post_thumbnail( $p->ID, 300, 'thumbnail' ).'
                                    <div class="overlay"></div>
                                </figure>
                                <div class="beside-caption clearfix">
                                    <h3 class="post-title">'.$p->post_title.'</h3>
                                    <div class="post-date"><i class="fa fa-calendar"></i>'.$p->post_date.'</div>
                                </div>
                            </a>
                        </div>';
                            }
                            $i++;
                        }
                        ?>

                    </div><!-- .beides-block -->

        </div>
        <?php
            }
        if(is_home() || is_front_page() ){
            $profitmag_content_id = "home-content";
        }else{
            $profitmag_content_id ="content";
        }
        ?>
            <div id="<?php echo $profitmag_content_id; ?>" class="site-content">
    
   