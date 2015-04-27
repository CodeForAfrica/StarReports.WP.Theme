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
                        $args = array(
                            'posts_per_page'   => 10,
                            'orderby'          => 'post_date',
                            'order'            => 'DESC',
                            'post_type'        => 'assignment',
                            'post_status'      => 'publish',
                            'suppress_filters' => true
                        );
                        $posts_array = get_posts( $args );
                        if(sizeof($posts_array)<1){
                            print "<h2>No open assignments</h2>";
                        }

                        foreach($posts_array as $p){
                            ?>
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    <?php echo get_the_post_thumbnail( $p->ID, 300, 'thumbnail' );?>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#"><?php print $p->post_title;?></a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                    <?php
                                        $address = get_post_meta( $p->ID, 'assignment_address', true);

                                        // args
                                        $args = array(
                                            'post_type' => 'post',
                                            'meta_key' => 'assignment_id',
                                            'meta_value' => $post->ID
                                        );
                                        $responses = sizeof(new WP_Query( $args ));

                                        $assignment_type = get_post_meta( get_the_ID(), 'assignment_type', true);


                                    ?>
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