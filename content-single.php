<?php
/**
 * @package ProfitMag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="single-feat clearfix">
    <div class="entry-content">
        <figure class="single-thumb">
            <?php
                if( has_post_thumbnail() ):
                    $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-thumb' );
            ?>
            <img src="<?php echo $img_url[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
            <?php
                endif;
            ?>
        </figure>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

            <div class="entry-meta">
                <?php  profitmag_posted_on(); ?>
            </div><!-- .entry-meta -->

            <div class="assignment-icons"<?php if(!is_singular('assignment')) print " style='display:none;'";?>>
                <div class="icons-bit">
                    <?php print assignmentIcons(get_the_ID());?>
                </div>
                <?php
                $address = get_post_meta( get_the_ID(), 'assignment_address', true);
                // args
                $args = array(
                    'post_type' => 'post',
                    'meta_key' => 'assignment_id',
                    'meta_value' => get_the_ID()
                );
                $responses = get_posts( $args );
                $responses = sizeof($responses);
                ?>
                <div class="icons-bit">
                <i class="fa fa-users"></i> <?php print $responses;?> Contributions
                </div>
                <div class="icons-bit">
                <i class="fa fa-clock-o"></i>

                <?php
                $end_date = get_post_meta( get_the_ID(), 'assignment_date', true);

                if(!empty($end_date)){
                    $end_date = timeBetweenNowAndDeadline($end_date);
                    print $end_date;
                    }else{
                    print "Open Ended";
                    }
                    print '';
                ?>
                </div>
            </div>

        </header><!-- .entry-header -->

        <figure></figure>
        <?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'profitmag' ),
				'after'  => '</div>',
			) );
		?>
        </div>
	</div>
    <?php edit_post_link( __( 'Edit', 'profitmag' ), '<span class="edit-link">', '</span>' ); ?>
    <!-- .entry-content -->
    <div class="home-featured-block"<?php if(!is_singular('assignment')) print " style='display:none;'";?>>

        <div class="contrib_button">
            <a href="https://play.google.com/store/apps/details?id=org.codeforafrica.starreports" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/gplay.png"> Use the Android app to contribute</a>
        </div>
        <h2 class="block-title"><span class="bordertitle-red"></span>Contributions</h2>

        <div class="feature-post-wrap clearfix">
        <?php
        $args = array(
            'post_type' => 'post',
            'meta_key' => 'assignment_id',
            'meta_value' => get_the_ID()
        );
        $posts_array = get_posts( $args );
        if(sizeof($posts_array)<1){
            print "<h2>No contributions yet</h2>";
        }
        $i=0;
        foreach($posts_array as $p){
            $i++;
            ?>
            <a href="<?php echo $p->guid;?>">
                <div class="featured-post clearfix">

                    <h3 class="feature-main-title<?php if($i%2==0)echo ' feature-main-title-even';?>"><?php print $p->post_title;?> </h3>
                    <figure class="post-thumb clearfix">
                        <?php echo get_the_post_thumbnail( $p->ID, 300, 'thumbnail' );?>
                    </figure></a>

            <div class="post-desc clearfix">
                <?php
                //date
                $end_date = get_post_meta( $p->ID, 'assignment_date', true);
                print '<div class="post-date feature-main-date"><i class="fa fa-calendar"></i>'.get_the_date( 'F d, Y').'</div>';
                ?>
            </div>
        </div></a>
        <?php
    }

    ?>
    </div>
    </div>
	<footer class="entry-footer">

			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'profitmag' ) );
				if ( $categories_list && profitmag_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'profitmag' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'profitmag' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'profitmag' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
