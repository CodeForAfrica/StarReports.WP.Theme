<?php
$profitmag_settings = get_option( 'profitmag_options' );
if( 'page' == get_option( 'show_on_front' ) ) {
    include( get_page_template() );
}else {
    get_header();          
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

               <div class="home-featured-block">                
                        <h2 class="block-title"><span class="bordertitle-red"></span>Assignments</h2>
                        <div class="feature-post-wrap clearfix">
                        <?php
                        for($i=0; $i<10; $i++){
                            ?>
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    
                                            <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"/></a>
                                    
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Politics Nulla</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
            </div>      

    </main><!-- #main -->
</div><!-- #primary -->
                    
<?php get_sidebar( 'right' ); ?>
    
<?php get_footer(); ?>  

<?php    
};
?>