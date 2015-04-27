<?php

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