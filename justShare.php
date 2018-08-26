<?php

/*
*Plugin Name: JustShare
*Plugin URI:  www.wordpress.org/plugins/justshare
*Author: Lennox Brain
*Author URI:  www.facebook.com/kaidzro.lennox
*version: 1.0.0
*Description: A light weight plugin to help share your wordpress posts on social media
*License: GPL v2
*/
ob_start();

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post;
function share($content){

    /*@params $post_uri
    * @get the uri of the current post in context
    */
   $post_uri = rawurlencode(get_permalink($post->ID));
   $fb = '</br><span><a target="_blank" href="https://facebook.com/sharer/sharer.php?u='.$post_uri.'"class="fb"><span><img src="'.              plugins_url('assets/images/fb.png',__FILE__ ).'"></span></a></span>';
   $twt = '<span><a target="_blank" href="https://twitter.com/intent/tweet?original_referer='.$post_uri.'"class="twt"><span><img src="'.              plugins_url('assets/images/twt.png',__FILE__ ).'"></span></a></span>';
	
    $content.=$fb;
	$content.=$twt;
    return $content;
}
add_filter('the_content', 'share',12);

//wp_enqueue_style( 'just_share_style', plugins_url( 'assets/css/just_share_style.css' , __FILE__ ));
ob_end_flush();
?>