<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 11/4/14
 * Time: 11:15 AM
 */

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
?>
<?php
add_action('admin_head-index.php', 'wpse_57350_script_enqueuer');

function wpse_57350_script_enqueuer()
{
    // Check if Welcome Panel is being displayed
    $option = get_user_meta( get_current_user_id(), 'show_welcome_panel', true );
    if( !$option )
        return;
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/lp.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/plugins/metisMenu/metisMenu.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/plugins/timeline.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/plugins/morris.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/font-awesome-4.1.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/sb-admin-2.css" />

    <style type="text/css">
        /*
         * Hide the Welcome Panel and the "dismiss" message at the bottom
         */
        #welcome-panel {opacity:0.01;}
        p.welcome-panel-dismiss {display:none}
        .welcome-panel-close{display:none}
        .col-lg-5{width:25% !important};
        .row{margin-left:0 !important; margin-right: 0 !important};
    </style>
    <script type="text/javascript">
        jQuery(document).ready( function($)
        {
            /*
             * Left side image and text
             * - changing CSS properties and raw Html content of the Div
             */
            $('div.wp-badge').css('background-image','url(http://lifelabsnewyork.com/sitebuilder/images/brain-filled-173x192.jpg)');
            $('div.wp-badge').css('color','#000000');
            $('div.wp-badge').html('Custom Welcome');

            // Right side H3 (change raw Html content)
            //$('div.welcome-panel-content h3').html('Submissions');
            //$('p.about-description').html('<div class=""><div class="col-lg-5 col-md-6"> <div class="panel panel-primary"> <div class="panel-heading"> <div class="row"> <div class="col-xs-3"> <i class="fa fa-pencil fa-5x"></i> </div> <div class="col-xs-9 text-right"> <div class="huge"><?php print count(media_totals(null));?></div> <div> Stories</div> </div> </div> </div> <a href="<?php print admin_url();?>edit.php"> <div class="panel-footer"><span class="pull-left">View</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <div class="clearfix"></div> </div> </a> </div> </div> <div class="col-lg-5 col-md-6"> <div class="panel panel-green"> <div class="panel-heading"> <div class="row"> <div class="col-xs-3"> <i class="fa fa-video-camera fa-5x"></i> </div> <div class="col-xs-9 text-right"> <div class="huge"><?php print count(media_totals('video'));?></div> <div>Videos</div> </div> </div> </div> <a href="<?php print admin_url();?>upload.php?post_mime_type=video"> <div class="panel-footer"> <span class="pull-left">View</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div> </div> </a> </div> </div> <div class="col-lg-5 col-md-6"> <div class="panel panel-yellow"> <div class="panel-heading"> <div class="row"> <div class="col-xs-3"> <i class="fa fa-photo fa-5x"></i> </div> <div class="col-xs-9 text-right"> <div class="huge"><?php print count(media_totals('image'));?></div> <div>Photos</div> </div> </div> </div> <a href="<?php print admin_url();?>upload.php?post_mime_type=image"> <div class="panel-footer"> <span class="pull-left">View</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <div class="clearfix"></div> </div> </a> </div> </div> <div class="col-lg-5 col-md-6"> <div class="panel panel-red"> <div class="panel-heading"> <div class="row"> <div class="col-xs-3"> <i class="fa fa-music fa-5x"></i> </div> <div class="col-xs-9 text-right"> <div class="huge"><?php print count(media_totals('audio'));?></div> <div> Audio</div> </div> </div> </div> <a href="<?php print admin_url();?>upload.php?post_mime_type=audio"> <div class="panel-footer"> <span class="pull-left">View</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <div class="clearfix"></div> </div> </a> </div> </div></div><hr />');
            $('div.welcome-panel-content').html('<div class=""><div class="col-lg-5 col-md-6"> <div class="panel panel-primary"> <div class="panel-heading"> <div class="row"> <div class="col-xs-3"> <i class="fa fa-list-alt fa-5x"></i> </div> <div class="col-xs-9 text-right"> <div class="huge"><?php print count(media_totals(null));?></div> <div> Stories</div> </div> </div> </div> <a href="<?php print admin_url();?>edit.php"> <div class="panel-footer"><span class="pull-left">View</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <div class="clearfix"></div> </div> </a> </div> </div> <div class="col-lg-5 col-md-6"> <div class="panel panel-green"> <div class="panel-heading"> <div class="row"> <div class="col-xs-3"> <i class="fa fa-video-camera fa-5x"></i> </div> <div class="col-xs-9 text-right"> <div class="huge"><?php print count(media_totals('video'));?></div> <div>Videos</div> </div> </div> </div> <a href="<?php print admin_url();?>upload.php?post_mime_type=video"> <div class="panel-footer"> <span class="pull-left">View</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div> </div> </a> </div> </div> <div class="col-lg-5 col-md-6"> <div class="panel panel-yellow"> <div class="panel-heading"> <div class="row"> <div class="col-xs-3"> <i class="fa fa-photo fa-5x"></i> </div> <div class="col-xs-9 text-right"> <div class="huge"><?php print count(media_totals('image'));?></div> <div>Photos</div> </div> </div> </div> <a href="<?php print admin_url();?>upload.php?post_mime_type=image"> <div class="panel-footer"> <span class="pull-left">View</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <div class="clearfix"></div> </div> </a> </div> </div> <div class="col-lg-5 col-md-6"> <div class="panel panel-red"> <div class="panel-heading"> <div class="row"> <div class="col-xs-3"> <i class="fa fa-music fa-5x"></i> </div> <div class="col-xs-9 text-right"> <div class="huge"><?php print count(media_totals('audio'));?></div> <div> Audio</div> </div> </div> </div> <a href="<?php print admin_url();?>upload.php?post_mime_type=audio"> <div class="panel-footer"> <span class="pull-left">View</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <div class="clearfix"></div> </div> </a> </div> </div></div><hr />');

            // Right side paragraph (idem)
            //$('p.about-description').html('Request new assignment');

            /*
             * Everything modified, fade in the whole Div
             * The fade in effect can be removed deleting this and the CSS opacity property
             */
            $('#welcome-panel').delay(300).fadeTo('slow',1);
        });
    </script>
<?php
}

function media_totals($mediaType){

    if($mediaType==null){
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => null,
        );
    }else{
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => null,
            'post_mime_type' => $mediaType,
        );
    }

    $attachments = get_posts($args);

    return $attachments;
}

function user_totals(){
    // prepare arguments
    $args  = array('role' => 'Author');
    // Create the WP_User_Query object
    $wp_user_query = new WP_User_Query($args);
    // Get the results
    $authors = $wp_user_query->get_results();

    return $authors;
}

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function add_latest_posts_widget() {

    wp_add_dashboard_widget(
        'latest_posts_widget',         // Widget slug.
        'Most recent posts',         // Title.
        'latest_posts_widget_function' // Display function.
    );
}
add_action( 'wp_dashboard_setup', 'add_latest_posts_widget' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function latest_posts_widget_function() {
    remove_meta_box( 'dashboard_activity', 'dashboard', 'core' );
?>
    <style type="text/css">
        .recent_posts_table td{
            padding:5px;
            border-bottom:1px solid rgba(128, 128, 128, 0.24);
        }
        .recent_posts_table th{
            padding:5px;
        }
        .recent_posts_table img{
            width: 100px;
            height:100px;
        }
        .recent_posts_table{
            font-size: 0.9em;
            width:100%;
        }
        .recent_posts_table .fa-photo{
            font-size: 90px;
        }
        .recent-post-metadata{
            font-size: 0.9em;
            color: lightgray;
        }
        .quick_input{
            width:100%;
            margin-bottom:10px;
        }
        .quick_input .ta{
            min-height: 100px;;
        }
        .wrap h2{
            display:none;
        }
    </style>

    <div id="recent_posts">
    <table class="recent_posts_table">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Details</th>
                <th>Assignment</th>
            </tr>
        </thead>
    <?php
        $recent = new WP_Query();
        $recent->query('showposts=10');
        if($recent->have_posts()) : while($recent->have_posts()): $recent->the_post();
            ?>
            <tr>
                <td><?php
                        if(get_the_post_thumbnail( $thumbnail->ID, 'thumbnail' )==null){
                            ?>
                                <i class="fa fa-photo"></i>
                            <?php
                        }else{
                            echo get_the_post_thumbnail( $thumbnail->ID, 'thumbnail' );
                        }
                     ?>
                </td>
                <td><a href="<?php print get_edit_post_link();?>"><?php print the_title();?></a><?php the_excerpt();?><br /><span class="recent-post-metadata">Posted on: <?php the_date()?> by: <?php the_author()?></span></td>
                <!--check associated assignment if any -->
                <td valign="top">
                    <?php
                    $key_1_value = get_post_meta( get_the_ID(), 'assignment_id', true );
                    // check if the custom field has a value
                    if( ! empty( $key_1_value ) ) {
                        $assignment_id = $key_1_value;

                        $assignment = get_post($assignment_id);

                        if($assignment!=null){

                            $title = $assignment->post_title;

                            print '<a href="'.get_edit_post_link($assignment_id).'">'.$title.'</a>';

                        }
                    }
                ?>
                </td>
            </tr>
        <?php endwhile ?>
        <?php else : ?>
        <?php endif ?>
    </table>
    </div>
<?php
}

function add_quick_draft_assignment_dashboard_widget() {

    wp_add_dashboard_widget(
        'quick_draft_assignment_dashboard_widget',         // Widget slug.
        'New Assignment',         // Title.
        'quick_draft_assignment_dashboard_widget_function' // Display function.
    );
}
add_action( 'wp_dashboard_setup', 'add_quick_draft_assignment_dashboard_widget' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function quick_draft_assignment_dashboard_widget_function() {

    print '<a href="'.admin_url().'post-new.php?post_type=assignment"><h1><i class="fa fa-pencil fa-2x"></i>Create New Assignment</h1></a>';
}

function remove_dashboard_meta() {
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );


function stats_add_dashboard_widgets() {

    wp_add_dashboard_widget(
        'stats_dashboard_widget',         // Widget slug.
        'Statistics',         // Title.
        'stats_dashboard_widget_function' // Display function.
    );
}
add_action( 'wp_dashboard_setup', 'stats_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function stats_dashboard_widget_function() {

    // Display whatever it is you want to show.
    echo "General stats go here!";
}


function myassignments_add_dashboard_widgets() {

    wp_add_dashboard_widget(
        'myassignments_dashboard_widget',         // Widget slug.
        'My assignments',         // Title.
        'myassignments_dashboard_widget_function' // Display function.
    );
}
add_action( 'wp_dashboard_setup', 'myassignments_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function myassignments_dashboard_widget_function() {

    // Display whatever it is you want to show.
    echo "Assignments created by me";
}

//add post featured
add_action( 'add_meta_boxes', 'post_featured_box' );
function post_featured_box() {
    add_meta_box(
        'post_featured_box',
        __( 'Featured Post', 'myplugin_textdomain' ),
        'post_featured_box_content',
        'post',
        'side',
        'high'
    );
}

function post_featured_box_content( $post ) {
    wp_nonce_field( plugin_basename( __FILE__ ), 'post_featured_box_content_nonce' );
    $post_featured = get_post_meta( get_the_ID(), 'post_featured', true);

    ?>
    <input type="checkbox" name="post_featured" value="1"<?php if($post_featured=="1")print " checked";?>/> Featured post?
<?php
}

add_action( 'save_post', 'post_featured_box_save' );

function post_featured_box_save( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if ( !wp_verify_nonce( $_POST['post_featured_box_content_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
            return;
    }
    $post_featured = $_POST['post_featured'];
    update_post_meta( $post_id, 'post_featured', $post_featured );
}

//add post assignment
add_action( 'add_meta_boxes', 'post_assignment_box' );
function post_assignment_box() {
    add_meta_box(
        'post_assignment_box',
        __( 'Assignment', 'myplugin_textdomain' ),
        'post_assignment_box_content',
        'post',
        'side',
        'high'
    );
}

function post_assignment_box_content( $post ) {
    wp_nonce_field( plugin_basename( __FILE__ ), 'post_assignment_box_content_nonce' );
    $post_assignment= get_post_meta( get_the_ID(), 'assignment_id', true);

    //args
    $args = array(
        'post_type' => 'assignment'
    );
    $assignments = get_posts( $args );
    print "<select name='post_assignment' id='post_assignment'>";
    print "<option selected disabled value=''>Select assignment</option>";
    foreach($assignments as $a){
        print "<option";
        if($post_assignment == $a->ID){
            print " selected";
        }
        print">".$a->post_title."</option>";
    }
    ?>
    <?php
    print "</select>";

}

add_action( 'save_post', 'post_assignment_box_save' );

function post_assignment_box_save( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if ( !wp_verify_nonce( $_POST['post_assignment_box_content_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
            return;
    }
    $post_assignment = $_POST['post_assignment'];
    update_post_meta( $post_id, 'assignment_id', $post_assignment );
}