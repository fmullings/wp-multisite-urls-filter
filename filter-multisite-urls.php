<?php
/**
 * Plugin Name: Filter Multisite Media URLs
 * Description: Changes media URLs to work on Pantheon's platform
 * Plugin URI: https://www.customername.org
 * Author: Milan Ivanovic
 * Author URI: https://lanche86.com/
 * Version: 0.1
 * License: GPL2
*/

/** added line 14 17-19 to catch for when blog_id is one so the main site doesn't look to a blog.dir directory for its files */
function customer_name_filter_multisite_media( $upload_dir ) {
   if(get_current_blog_id() != 1){
   
        $upload_dir['baseurl'] = network_site_url() . 'wp-content/uploads/blogs.dir/' . get_current_blog_id() . '/files';
   } else {
    $upload_dir['baseurl'] = network_site_url() .'wp-content/uploads';
   }
        return $upload_dir;
   
   
}

add_filter( 'upload_dir', 'customer_name_filter_multisite_media' );

// wp_calculate_image_srcset_meta filter to stop WordPress from adding the srcset attribute.
add_filter( 'wp_calculate_image_srcset_meta', '__return_false' );
