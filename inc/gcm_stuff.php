<?php

/*
 * Send feedback after comment posted
 */

function send_feedback_after_comment($comment_id){

    $comment = get_comment($comment_id);

    $author = $comment->comment_author;
    $raw_message =$author.": ".$comment->comment_content;

    //get author of original post
    $post_id = $comment->comment_post_ID;
    $post = get_post($post_id);
    $author_id = $post->post_author;

    $message = array("feedback" => $raw_message);
    send_push_notification(users_gcm_ids($author_id), $message);
}

/*
 * Get all users GCM ID
 */

add_action('comment_post', 'send_feedback_after_comment', 10, 3);

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
 * Send GCM Message
 * TODO: create new post 'message'
 */
function send_push_notification($registration_ids, $message) {


    // Set POST variables
    $url = 'https://android.googleapis.com/gcm/send';

    $fields = array(
        'registration_ids' => $registration_ids,
        'data' => $message,
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
