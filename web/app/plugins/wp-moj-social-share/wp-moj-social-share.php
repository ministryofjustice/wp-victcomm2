<?php
/**
 * Plugin Name: MOJ Social Share
 * Description: Share a news page to Facebook and Twitter
 * Version: 1.0
 * License: GPL
 * Author: Stephanie David, MoJ Digital
 **/

include_once('mss-options.php');
$moj_social_share_options = new MoJSocialShareOptions();

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

// Register and enqueue plugin style sheet.
add_action('wp_enqueue_scripts', 'register_plugin_styles');

function register_plugin_styles()
{
    wp_register_style('wp-moj-social-share', plugins_url('wp-moj-social-share/assets/css/main.css'));
    wp_enqueue_style('wp-moj-social-share');
}

function social_share_add_to_content( $content ) {

   if( is_single() && ! empty( $GLOBALS['post'] ) ) {

       if ( $GLOBALS['post']->ID == get_the_ID() ) {

           $content .= moj_share_page();

       }

   }

   return $content;
}
add_filter('the_content', 'social_share_add_to_content');

function moj_share_page()
{
 return ' <div class="responsive-bottom-margin">
        <div class="share-page">
            <h2 style="font-family:inherit;line-height:1.5;color:#a60f51">Share this page</h2>
            <ul style="list-style:none;margin-left:40px">
                <li style="position:relative;display:inline-block;list-style-type:none;min-height:32px;margin-bottom:10px;line-height:32px;margin-left:-40px">
                    <a target="_blank" rel="noopener noreferrer external" style="-webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
  box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);font-weight:400;text-transform:none;line-height:1.1428571429;text-decoration:none;display:inline-block;padding-left:40px;padding-right:50px"
                       href="https://www.facebook.com/sharer/sharer.php?u=<?= get_page_link(); ?>">
                        <span class="link-icon" style="position:absolute;top:0;left:0;width:32px;height:32px;vertical-align:top;right:0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="32" height="32" style="vertical-align:middle; color:#3a559f">
                                <path fill="currentColor" d="M31.006 
    0H.993A.997.997 0 0 0 0 .993v30.014c0 
    .55.452.993.993.993h30.013a.998.998 0 0 0 .994-.993V.993A.999.999 0 0 0 
    31.006 0z"></path>
                                <path fill="#FFF" d="M17.892 
    10.751h1.787V8.009L17.216 8c-2.73 0-3.352 2.045-3.352 
    3.353v1.828h-1.581v2.824h1.581V24h3.322v-7.995h2.242l.291-2.824h-2.533V11.52c.001-.623.415-.769.706-.769z"></path>
                            </svg>
                        </span>
                        <span class="visually-hidden" style="position:absolute!important;width:1px!important;height:1px!important;margin:0!important;padding:0!important;overflow:hidden!important;clip:rect(0 0 0 0)!important;-webkit-clip-path:inset(50%)!important;clip-path:inset(50%)!important;border:0!important;white-space:nowrap!important">Share on </span>
                        Facebook</a>
                </li>
                <li>
                    <a target="_blank" rel="noopener noreferrer external"
                       style="margin-left:-2px; -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
  box-shadow: 0 0 0 0 rgba(0, 0, 0, 0)"
                       href="https://twitter.com/share?url=<?= get_page_link(); ?>">
                    <span class="link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="32" height="32" style="vertical-align:middle; color:#1ab2e8">
                            <path fill="currentColor" d="M31.007 
    0H.993A.999.999 0 0 0 0 .993v30.014c0 
    .55.452.993.993.993h30.014a.997.997 0 0 0 .993-.993V.993A.998.998 0 0 0 
    31.007 0z"></path>
                            <path fill="#FFF" d="M8 21.027a9.286 9.286 
    0 0 0 5.032 1.475c6.038 0 9.34-5.002 9.34-9.339 
    0-.143-.004-.284-.012-.425a6.619 6.619 0 0 0 
    1.639-1.699c-.6.265-1.234.439-1.885.516a3.287 3.287 0 0 0 1.443-1.816 
    6.571 6.571 0 0 1-2.086.797 3.28 3.28 0 0 0-5.592 2.993 9.311 9.311 0 0 
    1-6.766-3.43 3.294 3.294 0 0 0-.443 1.651 3.28 3.28 0 0 0 1.46 2.732 
    3.278 3.278 0 0 1-1.488-.411v.041a3.288 3.288 0 0 0 2.633 3.22 3.28 3.28 
    0 0 1-1.481.055 3.285 3.285 0 0 0 3.065 2.281 6.59 6.59 0 0 1-4.076 
    1.404A6.76 6.76 0 0 1 8 21.027z"></path>
                        </svg>
                    </span>
                        <span class="visually-hidden" style="position:absolute!important;width:1px!important;height:1px!important;margin:0!important;padding:0!important;overflow:hidden!important;clip:rect(0 0 0 0)!important;-webkit-clip-path:inset(50%)!important;clip-path:inset(50%)!important;border:0!important;white-space:nowrap!important">Share on </span>
                        <span class="visually-hidden" >Share on </span>
                        Twitter</a>
                </li>
            </ul>
        </div>
    </div> ';
}