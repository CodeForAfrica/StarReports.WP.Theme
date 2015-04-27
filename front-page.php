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
                        $i=0;
                        foreach($posts_array as $p){
                            $i++;
                            ?>
                            <div class="featured-post clearfix">
                                <?php

                                    $address = get_post_meta( $p->ID, 'assignment_address', true);

                                    // args
                                    $args = array(
                                        'post_type' => 'post',
                                        'meta_key' => 'assignment_id',
                                        'meta_value' => $p->ID
                                    );
                                    $responses = get_posts( $args );
                                    $responses = sizeof($responses);
                                ?>
                                <div class="contributors-icon"><i class="fa fa-users"></i> <?php print $responses;?></div>

                                <h3 class="feature-main-title<?php if($i%2==0)echo ' feature-main-title-even';?>"><a href="#"><?php print $p->post_title;?></a> </h3>

                                <figure class="post-thumb clearfix">
                                    <?php echo get_the_post_thumbnail( $p->ID, 300, 'thumbnail' );?>
                                </figure>
                                
                                <div class="post-desc clearfix">

                                    <?php
                                        $assignment_type = get_post_meta( $p->ID, 'assignment_type', true);

                                        print '<div class="feature-main-icons">';
                                        $assignment_type = get_post_meta( $p->ID, 'assignment_type', true);
                                        if(in_array("image", $assignment_type)){
                                            print '<i class="fa fa-camera"></i>';
                                        }
                                        if(in_array("video", $assignment_type)){
                                            print '<i class="fa fa-video-camera"></i>';
                                        }
                                        if(in_array("audio", $assignment_type)){
                                            print '<i class="fa fa-microphone"></i>';
                                        }
                                        if(in_array("narrative", $assignment_type)){
                                            print '<i class="fa fa-edit"></i>';
                                        }
                                        print '</div>';

                                        //date
                                        $end_date = get_post_meta( $p->ID, 'assignment_date', true);
                                        print '<div class="post-date feature-main-date"><i class="fa fa-clock-o"></i> ';
                                        if(!empty($end_date)){
                                           $end_date = timeBetweenNowAndDeadline($end_date);
                                            print $end_date;
                                        }else{
                                            print "Open Ended";
                                        }
                                        print '</div>';
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