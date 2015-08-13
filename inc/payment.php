<?php

/*
 * Create Payment Content Type
 */

function register_payment() {
    $labels = array(
        'name'               => _x( 'Payments', 'post type general name' ),
        'singular_name'      => _x( 'Payment', 'post type singular name' ),
        'add_new'            => _x( 'Compose New', 'payment' ),
        'add_new_item'       => __( 'Compose New Payment' ),
        'new_item'           => __( 'New Payment' ),
        'all_items'          => __( 'All Payments' ),
        'view_item'          => __( 'View Payments' ),
        'search_items'       => __( 'Search Payments' ),
        'not_found'          => __( 'No payments found' ),
        'not_found_in_trash' => __( 'No payments found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Payments'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Defines payment structure',
        'public'        => true,
        'menu_position' => 6,
        'supports'      => array( 'title'),
        'has_archive'   => false,
    );
    register_post_type( 'payment', $args );
}
add_action( 'init', 'register_payment' );


//Recipient meta box
add_action( 'add_meta_boxes', 'recipient_box' );
function recipient_box() {
    add_meta_box(
        'recipient_box',
        __( 'Choose Payment Recipient', 'myplugin_textdomain' ),
        'recipient_box_content',
        'payment',
        'side',
        'high'
    );
}

function recipient_box_content( $post ) {
    wp_nonce_field( plugin_basename( __FILE__ ), 'recipient_box_content_nonce' );
    $recipient = get_post_meta( get_the_ID(), 'recipient', true);
    if(empty($recipient)){
        $recipient = array();
    }

    //list of users in drop down
    $blogusers = get_users( 'blog_id=1&orderby=nicename' );
    print '<select name="recipient">';
    foreach ( $blogusers as $user ) {

        print '<option value="' . $user->ID . '">' . esc_html($user->user_login) . '</option>';

    }
    print '</select>';
    ?>
    <?php
}

add_action( 'save_post', 'recipient_box_save' );

function recipient_box_save( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if ( !wp_verify_nonce( $_POST['recipient_box_content_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
            return;
    }
    $recipient= $_POST['recipient'];
    update_post_meta( $post_id, 'recipient', $recipient );

    $notified = get_post_meta( $post_id, 'notified' );

    if(empty($notified)){
        update_post_meta( $post_id, 'notified', "1" );

        $pushPayment = get_the_title($post_id);

        $reg_ids = users_gcm_ids($recipient);
        $payment = array("chat" => $pushPayment, "user"=>"admin");
        send_push_notification($reg_ids, $payment);
    }
}


/*
 * Send feedback after comment posted
 */

function send_feedback_after_comment($comment_id){

    $comment = get_comment($comment_id);

    $author_uname = $comment->comment_author;
    $raw_payment = $comment->comment_content;

    //get author of original post
    $post_id = $comment->comment_post_ID;
    $post = get_post($post_id);
    $author_id = $post->post_author;

    //get comment author gravatar
    $author = get_user_by('login', $author_uname);
    $author_email = $author->user_email;
    $gravatar = get_gravatar_url($author_email);

    $payment = array("feedback" => $raw_payment, "author"=>$author_uname, "icon_url"=>$gravatar);
    send_push_notification(users_gcm_ids($author_id), $payment);
}
add_action('comment_post', 'send_feedback_after_comment', 10, 3);

/*
 * Get all users GCM ID
 */

function users_gcm_ids($user_id=null){
    $ids = array();

    if($user_id == null) {
        $blog_users = get_users(array());
        foreach ($blog_users as $user) {
            $user_gcm_id = get_user_meta($user->ID, 'gcm_id', true);
            if (!empty($user_gcm_id)) {
                $ids[] = $user_gcm_id;
            }
        }
    }else{
        $user_gcm_id = get_user_meta($user_id, 'gcm_id', true);
        if (!empty($user_gcm_id)) {
            $ids[] = $user_gcm_id;
        }
    }

    return $ids;
}

/*
 * Send GCM Payment
 * TODO: create new post 'payment'
 */
function send_push_notification($registration_ids, $payment) {


    // Set POST variables
    $url = 'https://android.googleapis.com/gcm/send';

    $fields = array(
        'registration_ids' => $registration_ids,
        'data' => $payment,
    );

    define("GOOGLE_API_KEY", "AIzaSyB7kt9gh8p6cVu5lpK-NF_4AFVpO8A_nfA");

    $headers = array(
        'Authorization: key=' . GOOGLE_API_KEY,
        'Content-Type: application/json'
    );
    //print_r($headers);
    // Open connection
    $ch = curl_init();

    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    // Execute post
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }

    // Close connection
    curl_close($ch);
}
/*
 * Get user gravatars for notifications
 */


function get_gravatar_url( $email ) {
    $hash = md5( strtolower( trim ( $email ) ) );
    return 'http://gravatar.com/avatar/' . $hash;
}
