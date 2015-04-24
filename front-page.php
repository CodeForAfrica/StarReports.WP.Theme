<?php
$profitmag_settings = get_option( 'profitmag_options' );
if( 'page' == get_option( 'show_on_front' ) ) {
    include( get_page_template() );
}else {
    get_header();          
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <?php if( !empty( $profitmag_settings['featured_block_one'] ) && $profitmag_settings['featured_block_one']>0 ) : ?>
            <!-- Featured Block One -->
            <div class="home-featured-block">
                <?php
                    $featured_block=$profitmag_settings['featured_block_one'];
                    $no_of_block=$profitmag_settings['no_of_block_one'];                    
                    $query1=new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );
                    if( $query1->have_posts() ):
                        $cat_name = get_cat_name( $featured_block );                       
                ?>
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                        <div class="feature-post-wrap clearfix">
                <?php
                    $count = 0;
                        while( $query1->have_posts() ):
                            $query1->the_post();
                        $count++;
                ?>
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    <?php
                                        if( has_post_thumbnail() ):
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'three-col-thumb' );
                                    ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                    <?php
                                        endif;
                                    ?>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                                </div>
                            </div>
                <?php
                if($count % 3 == 0) echo "<div class='clear'></div>";
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
                  </div>
            </div>  
            <!-- End of Featured Block One -->  
            
    <?php else: ?>
               <div class="home-featured-block">                
                        <h2 class="block-title"><span class="bordertitle-red"></span>Politics</h2>
                        <div class="feature-post-wrap clearfix">
                
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    
                                            <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"/></a>
                                    
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Politics Nulla</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                </div>
                            </div>
                            
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    
                                            <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/apple-designer-desk-3898.jpg' ?>"/></a>
                                    
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Politics Nulla</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                </div>
                            </div>
                            
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    
                                            <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"/></a>
                                    
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Politics Nulla</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                </div>
                            </div>
                            
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    
                                            <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/apple-designer-desk-3898.jpg' ?>"/></a>
                                    
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Politics Nulla</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                </div>
                            </div>
                            
                            
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    
                                            <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"/></a>
                                    
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Politics Nulla</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                </div>
                            </div>
                            
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    
                                            <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/apple-designer-desk-3898.jpg' ?>"/></a>
                                    
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Politics Nulla</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                </div>
                            </div>
                            
                    </div>
            </div>      
    <?php  endif; ?>
    
        
    <?php if( !empty( $profitmag_settings['featured_block_two'] ) && $profitmag_settings['featured_block_two']>0 ) : ?>
            <!-- Featured Block Two -->
            <div class="home-featured-block clearfix">
                <?php
                    $featured_block=$profitmag_settings['featured_block_two'];
                    $no_of_block=$profitmag_settings['no_of_block_two'];                    
                    $query2=new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );
                    if( $query2->have_posts() ):
                        $cat_name = get_cat_name( $featured_block );                       
                ?>
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                <?php
                    $count = 0;
                        while( $query2->have_posts() ):
                            $query2->the_post();
                        $count++;
                ?>
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                    <?php
                                        if( has_post_thumbnail() ):
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'three-col-thumb' );
                                    ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                    <?php
                                        endif;
                                    ?>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                                </div>
                            </div>
                <?php
                if($count % 3 == 0) echo "<div class='clear'></div>";
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>   
            <!-- Featured Block Two --> 
    <?php else: ?>
                 <div class="home-featured-block clearfix">
                
                        <h2 class="block-title"><span class="bordertitle-red"></span>Finance</h2>
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Nulla finance</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>December 18, 2014</div>
                                </div>
                            </div>
                            
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/apple-designer-desk-3898.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Nulla finance</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>December 18, 2014</div>
                                </div>
                            </div>
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Nulla finance</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>December 18, 2014</div>
                                </div>
                            </div>
                            
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/apple-designer-desk-3898.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Nulla finance</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>December 18, 2014</div>
                                </div>
                            </div>
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Nulla finance</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>December 18, 2014</div>
                                </div>
                            </div>
                            
                            <div class="featured-post clearfix">
                                <figure class="post-thumb clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/apple-designer-desk-3898.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Nulla finance</a></h3>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>December 18, 2014</div>
                                </div>
                            </div>
               
            </div>     
            
    <?php  endif; ?>
    
    
    
    
    <?php if( !empty( $profitmag_settings['featured_block_three'] ) && $profitmag_settings['featured_block_three']>0 ) : ?>            
            <!-- Featured Block Three -->
            <div class="home-featured-block block-3 clearfix">
                <?php
                    $featured_block=$profitmag_settings['featured_block_three'];
                    $no_of_block=$profitmag_settings['no_of_block_three'];                    
                    $query3=new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );
                    if( $query3->have_posts() ):
                        $cat_name = get_cat_name( $featured_block );                       
                ?>
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                <?php
                        $i = 0;
                        while( $query3->have_posts() ):
                        $i++;
                            $query3->the_post();
                ?>
                            <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <?php
                                        if( has_post_thumbnail() ):
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'five-col-thumb' );
                                    ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                    <?php
                                        endif;
                                    ?>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                    
                                </div>
                            </div>
                <?php
                if($i%5==0){
                    echo '<div class="clear"></div>';
                }
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>   
            <!-- End Featured Block Three --> 
    
    <?php else: ?>
                <div class="home-featured-block block-3 clearfix">
               
                        <h2 class="block-title"><span class="bordertitle-red"></span>Life</h2>
              
                            <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/baking-biscuits-candy-3902-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                            
                            <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/autumn-leaf-leaves-3823-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                            
                            <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/beach-holiday-idyllic-3847-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                             <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/baking-biscuits-candy-3902-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                            
                            <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/autumn-leaf-leaves-3823-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                            
                            <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/beach-holiday-idyllic-3847-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                             <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/baking-biscuits-candy-3902-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                            
                            <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/autumn-leaf-leaves-3823-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                            
                            <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/beach-holiday-idyllic-3847-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                            <div class="featured-post-three clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/baking-biscuits-candy-3902-148.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Life pellentesque</a></h3>
                                    
                                </div>
                            </div>
                
            </div>      
    <?php  endif; ?>
    
    <?php if( !empty( $profitmag_settings['mid_section_ads'] ) && $profitmag_settings['mid_section_ads'] != '' ): ?>
                        <div class="mid-section-ads">
                            <?php echo $profitmag_settings['mid_section_ads']; ?>
                        </div>
    <?php else: ?>
            <div class="mid-section-ads">
                <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832.jpg' ?>"/></a>
            </div>
    <?php endif; ?>
    
    
    <?php if( !empty( $profitmag_settings['featured_block_four'] ) && $profitmag_settings['featured_block_four']>0 ) : ?>            
            <!-- Featured Block Four Slider -->
            <div class="home-featured-block block-4">
                <?php
                    $featured_block=$profitmag_settings['featured_block_four'];
                    $no_of_block=$profitmag_settings['no_of_block_four'];                   
                    $query4=new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );
                    if( $query4->have_posts() ):
                        $cat_name = get_cat_name( $featured_block );
                        $skip_flag=1;                       
                ?>
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                        <div class="featured-excerpt-block clearfix">
                <?php
                        while( $query4->have_posts() ):
                            $query4->the_post();
                            $content=substr( strip_tags(get_the_content()), 0, 70 );
                            $content=substr($content,0,strrpos($content," "));
                            if( $skip_flag == 1):
                                $skip_flag = 0;
                                $content=substr( get_the_content(), 0, 600 );
                                $content=substr($content,0,strrpos($content," "));
                ?>
                            
                            <div class="featured-post-main clearfix">
                                <figure class="post-main-thumb clearfix">
                                    <?php
                                        if( has_post_thumbnail() ):
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'block4-main-thumb' );
                                    ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                    <?php
                                        endif;
                                    ?>
                                </figure>
                                
                                <div class="post-main-desc clearfix">
                                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                    <p class="post-excerpt"><?php echo $content; ?>...</p>
                                </div>
                            </div>
                        <?php else: ?>
                                <div class="featured-post clearfix">
                                    <figure class="post-thumb-small clearfix">
                                        <?php
                                            if( has_post_thumbnail() ):
                                                $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'block4-post-thumb' );
                                        ?>
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                        <?php
                                            endif;
                                        ?>
                                    </figure>
                                    
                                    <div class="post-main-desc clearfix">
                                        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                        <p class="post-excerpt"><?php echo $content; ?></p>
                                    </div>
                                </div>
                <?php                                    
                            endif;
                        endwhile;
                ?>
                        </div><!-- .featured-excerpt-block -->
                <?php
                    endif;
                    wp_reset_postdata();
                ?>
            </div>   
            <!-- End Featured Block Four --> 
            
    <?php else: ?>
            <div class="home-featured-block block-4">
                
                        <h2 class="block-title"><span class="bordertitle-red"></span>Entertainment</h2>
                        <div class="featured-excerpt-block clearfix">
                
                            
                            <div class="featured-post-main clearfix">
                                <figure class="post-main-thumb clearfix">
                                    <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/clouds-mountains-nature-3826.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-main-desc clearfix">
                                    <h3><a href="#" >Nulla porttitor accumsan</a></h3>
                                    <p class="post-excerpt">Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed...</p>
                                </div>
                            </div>
                        
                                <div class="featured-post clearfix">
                                    <figure class="post-thumb-small clearfix">
                                        <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/apple-designer-desk-3898-100.jpg' ?>"/></a>
                                    </figure>
                                    
                                    <div class="post-main-desc clearfix">
                                        <h3><a href="#" >Enter malesuada</a></h3>
                                        <p class="post-excerpt">Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor</p>
                                    </div>
                                </div>
                                
                                <div class="featured-post clearfix">
                                    <figure class="post-thumb-small clearfix">
                                        <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/beach-holiday-idyllic-3847-100.jpg' ?>"/></a>
                                    </figure>
                                    
                                    <div class="post-main-desc clearfix">
                                        <h3><a href="#" >Enter malesuada</a></h3>
                                        <p class="post-excerpt">Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor</p>
                                    </div>
                                </div>
                                
                                <div class="featured-post clearfix">
                                    <figure class="post-thumb-small clearfix">
                                        <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/clouds-mountains-nature-3826-100.jpg' ?>"/></a>
                                    </figure>
                                    
                                    <div class="post-main-desc clearfix">
                                        <h3><a href="#" >Enter malesuada</a></h3>
                                        <p class="post-excerpt">Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor</p>
                                    </div>
                                </div>
                                
                                 <div class="featured-post clearfix">
                                    <figure class="post-thumb-small clearfix">
                                        <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/apple-designer-desk-3898-100.jpg' ?>"/></a>
                                    </figure>
                                    
                                    <div class="post-main-desc clearfix">
                                        <h3><a href="#" >Enter malesuada</a></h3>
                                        <p class="post-excerpt">Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor</p>
                                    </div>
                                </div>
                                
                                <div class="featured-post clearfix">
                                    <figure class="post-thumb-small clearfix">
                                        <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/beach-holiday-idyllic-3847-100.jpg' ?>"/></a>
                                    </figure>
                                    
                                    <div class="post-main-desc clearfix">
                                        <h3><a href="#" >Enter malesuada</a></h3>
                                        <p class="post-excerpt">Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor</p>
                                    </div>
                                </div>
                                
                                <div class="featured-post clearfix">
                                    <figure class="post-thumb-small clearfix">
                                        <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/clouds-mountains-nature-3826-100.jpg' ?>"/></a>
                                    </figure>
                                    
                                    <div class="post-main-desc clearfix">
                                        <h3><a href="#" >Enter malesuada</a></h3>
                                        <p class="post-excerpt">Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor</p>
                                    </div>
                                </div>
                                
                                
                
                        </div><!-- .featured-excerpt-block -->
                
            </div> 
            
    <?php  endif; ?>
    
    
    <div class="single-col clearfix">
    <?php if( !empty( $profitmag_settings['featured_block_left'] ) && $profitmag_settings['featured_block_left']>0 ) : ?>            
            <!-- Featured Block Left -->
            <div class="home-featured-block-single-col">
                <?php
                    $featured_block=$profitmag_settings['featured_block_left'];
                    $no_of_block=$profitmag_settings['no_of_block_left'];                    
                    $query5=new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );
                    if( $query5->have_posts() ):
                        $cat_name = get_cat_name( $featured_block );                       
                ?>
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                <?php
                        while( $query5->have_posts() ):
                            $query5->the_post();
                            $content=substr( strip_tags(get_the_content()), 0, 60 );
                            $content=substr($content,0,strrpos($content," "));
                ?>
                            <div class="featured-post-block-coltype clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <?php
                                        if( has_post_thumbnail() ):
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'block-left-right' );
                                    ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                    <?php
                                        endif;
                                    ?>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                    <p><?php echo $content; ?></p>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                                </div>
                            </div>
                <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>   
            <!-- End Featured Block Lefte --> 
    <?php else: ?>
        <div class="home-featured-block-single-col">                
                        <h2 class="block-title"><span class="bordertitle-red"></span>Entertainment</h2>               
                            
                            <div class="featured-post-block-coltype clearfix">
                                <figure class="post-thumb-mini clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-174.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Entertainment consectetur</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 27, 2014</div>
                                </div>
                            </div>
                            
                            <div class="featured-post-block-coltype clearfix">
                                <figure class="post-thumb-mini clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-173.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Entertainment consectetur</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 27, 2014</div>
                                </div>
                            </div>  
                            
                            <div class="featured-post-block-coltype clearfix">
                                <figure class="post-thumb-mini clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-174.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Entertainment consectetur</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 27, 2014</div>
                                </div>
                            </div>              
            </div>             
            
    <?php  endif; ?>
   
    
    
    
    <?php if( !empty( $profitmag_settings['featured_block_right'] ) && $profitmag_settings['featured_block_right']>0 ) : ?>            
            <!-- Featured Block Right -->
            <div class="home-featured-block-single-col">
                <?php
                    $featured_block=$profitmag_settings['featured_block_right'];
                    $no_of_block=$profitmag_settings['no_of_block_right'];                    
                    $query6=new WP_Query( 'cat='.$featured_block.'&posts_per_page='.$no_of_block );
                    if( $query6->have_posts() ):
                        $cat_name = get_cat_name( $featured_block );                       
                ?>
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                <?php
                        while( $query6->have_posts() ):
                            $query6->the_post();
                            $content=substr( strip_tags(get_the_content()), 0, 60 );
                            $content=substr($content,0,strrpos($content," "));
                ?>
                            <div class="featured-post-block-coltype clearfix">
                                <figure class="post-thumb-mini clearfix">
                                    <?php
                                        if( has_post_thumbnail() ):
                                            $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'block-left-right' );
                                    ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                    <?php
                                        endif;
                                    ?>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                    <p><?php echo $content; ?></p>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                                </div>
                            </div>
                <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>  
    <?php else: ?>
                  <div class="home-featured-block-single-col">
                
                        <h2 class="block-title"><span class="bordertitle-red"></span>Finance</h2>
                
                            <div class="featured-post-block-coltype clearfix">
                                <figure class="post-thumb-mini clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-174.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Finance consectetur</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 27, 2014</div>
                                </div>
                            </div>
                            
                            <div class="featured-post-block-coltype clearfix">
                                <figure class="post-thumb-mini clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-173.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Finance consectetur</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 27, 2014</div>
                                </div>
                            </div>  
                            
                            <div class="featured-post-block-coltype clearfix">
                                <figure class="post-thumb-mini clearfix">
                                   <a href="#" ><img src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-174.jpg' ?>"/></a>
                                </figure>
                                
                                <div class="post-desc clearfix">
                                    <h3 class="feature-main-title"><a href="#">Finance consectetur</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <div class="post-date feature-main-date"><i class="fa fa-calendar"></i>October 27, 2014</div>
                                </div>
                            </div> 
                            
               
            </div>    
             
    <?php  endif; ?>

     </div><!--single-col-->
            <!-- End Featured Block Left -->
            
            <!-- Popular Widget Area -->
                <?php if( is_active_sidebar( 'home-popular' ) ) : ?>
                        <div class="home-featured-block popular-widget-area clearfix">
                         <?php   dynamic_sidebar( 'home-popular' ); ?>
                        </div>
                <?php else: ?>
                        <div class="home-featured-block popular-widget-area clearfix">
                            <aside id="profitmag-popular-posts-2" class="widget profitmag_widget_popular_entries">		
                                <h3 class="widget-title"><span>Popular</span></h3>		
                                <ul>
                					<li>
                				        <figure class="popular-image clearfix">
                                          <a href="#"><img src="<?php echo get_template_directory_uri().'/images/demo/baking-biscuits-candy-3902-193.jpg' ?>"></a>
                                        </figure>
                                
                                        <p class="post-desc">
                                            <a href="#">Nulla porttitor accumsan</a>
                                            </p><div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                        <p></p>        			
        		                  </li>
                                  
                                  <li>
                				        <figure class="popular-image clearfix">
                                          <a href="#"><img src="<?php echo get_template_directory_uri().'/images/demo/beach-holiday-idyllic-3847-193.jpg' ?>"></a>
                                        </figure>
                                
                                        <p class="post-desc">
                                            <a href="#">Nulla porttitor accumsan</a>
                                            </p><div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                        <p></p>        			
        		                  </li>
                                  <li>
                				        <figure class="popular-image clearfix">
                                          <a href="#"><img src="<?php echo get_template_directory_uri().'/images/demo/baking-biscuits-candy-3902-193.jpg' ?>"></a>
                                        </figure>
                                
                                        <p class="post-desc">
                                            <a href="#">Nulla porttitor accumsan</a>
                                            </p><div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                        <p></p>        			
        		                  </li>
                                  
                                  <li>
                				        <figure class="popular-image clearfix">
                                          <a href="#"><img src="<?php echo get_template_directory_uri().'/images/demo/beach-holiday-idyllic-3847-193.jpg' ?>"></a>
                                        </figure>
                                
                                        <p class="post-desc">
                                            <a href="#">Nulla porttitor accumsan</a>
                                            </p><div class="post-date"><i class="fa fa-calendar"></i>October 31, 2014</div>
                                        <p></p>        			
        		                  </li>
                					
        				        </ul>
        		          </aside>
                      </div>
                <?php endif; ?>
            <!-- End Popular Widget Area -->
            
            
            <!-- Media Gallery -->            
            <?php if( !empty( $profitmag_settings['media_gallery'] ) ): ?>
                    <div class="home-media-gallery">
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php _e( 'Media Gallery', 'profitmag' ); ?></h2>
                        
                  <div class="gallery-block">
                        <div id="gallery-slider" class="flexslider">
                            <ul class="slides">
                            <?php 
                              foreach( $profitmag_settings['media_gallery'] as $image ): 
                                    $attachment_id = profitmag_get_image_id( $image );
                                    $img_url = wp_get_attachment_image_src($attachment_id,'gallery-full');
                                    
                            ?>
                                    <li><img id="previewHolder" src="<?php echo $img_url[0]; ?>" alt="Gallery" /></li>
                            <?php   break; endforeach; ?>
                            </ul>
                        </div>
                   
		                    <div id="gallery-carousel" class="flexslider clearfix scroll-content">
		                        <ul class="slides ">
		                                <?php   foreach( $profitmag_settings['media_gallery'] as $image ): 
		                                        $attachment_id = profitmag_get_image_id( $image );
		                                        $img_url = wp_get_attachment_image_src($attachment_id,'gallery-thumb');
		                                        $img_url_full = wp_get_attachment_image_src($attachment_id,'gallery-full');
		                                ?>
		                                        <li><img class="fullPreview" src="<?php echo $img_url[0]; ?>" alt="Gallery" data-image-full="<?php echo $img_url_full[0]; ?>" /></li>
		                                <?php   endforeach;?>
		                        </ul>
		                    </div>
                     </div><!--gallery-block-->
                </div>
             <?php else: ?>   
                <div class="home-media-gallery">
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php _e( 'Media Gallery', 'profitmag' ); ?></h2>
                        
                  <div class="gallery-block">
                        <div id="gallery-slider" class="flexslider">
                            <ul class="slides">
                            
                                    <li><img id="previewHolder" src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-818.jpg' ?>" alt="Gallery" /></li>                            
                            </ul>
                        </div>
                   
		                    <div id="gallery-carousel" class="flexslider clearfix scroll-content">
		                        <ul class="slides ">
		                                
		                                        <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/analog-camera-photography-rolleicord-3832-818.jpg' ?>" /></li>
                                                <li><img class="fullPreview" src="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-73.jpg' ?>" alt="Gallery" data-image-full="<?php echo get_template_directory_uri().'/images/demo/flowers-marguerites-oxeye-daisies-3878-818.jpg' ?>" /></li>
                                                
		                                
		                        </ul>
		                    </div>
                     </div><!--gallery-block-->
                </div>
             <?php endif; ?>  
            <!-- End Media Gallery -->
                         
        
   
    </main><!-- #main -->
</div><!-- #primary -->
                    
<?php get_sidebar( 'right' ); ?>
    
<?php get_footer(); ?>  

<?php    
};
?>