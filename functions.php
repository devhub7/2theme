<?php

add_theme_support('menus');
add_theme_support('widgets');
add_theme_support('custom-header');
add_theme_support('custom-background');
add_theme_support('post-formats', ['video', 'audio', 'gallery']);
// add_theme_support( 'post-formats', array(
//     'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
//     ) );
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');

register_sidebar([
 'name'        => 'Right Sidebar',
 'description' => '2theme Right Sidebar',
 'id'          => 'right_Sidebar',
]);
register_sidebar([
 'name'        => 'Left Sidebar',
 'description' => '2theme Right Sidebar',
 'id'          => 'left_Sidebar',
]);

register_nav_menu(
 'primary', 'Primary Menu'
);
register_nav_menu(
 'footer', 'Footer Menu'
);

register_nav_menus([
 'primary' => 'Primary Menu',
 'footer'  => 'Footer Menu',
]);

// Our custom post type function
function create_posttype()
{

 register_post_type('movies',
  // CPT Options
  array(
   'labels'       => array(
    'name'          => __('Movies'),
    'singular_name' => __('Movie'),
   ),
   'public'       => true,
   'has_archive'  => true,
   'rewrite'      => array('slug' => 'movies'),
   'show_in_rest' => true,

  )
 );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');

register_post_type('project', [
 'public'    => true,
 'labels'    => [
  'name'         => 'Project',
  'all_items'    => 'All Project',
  'add_new'      => 'Add new Project',
  'add_new_item' => 'Add new Project',
 ],
 'menu_icon' => 'dashicons-welcome-learn-more',
 'supports'  => ['title', 'editor', 'thumbnail'],
]);

register_post_type('nb', [
 'public'    => true,
 'labels'    => [
  'name'         => 'Notice Board',
  'all_items'    => 'All notice',
  'add_new'      => 'Add new notice',
  'add_new_item' => 'Add new notice',
 ],
 'menu_icon' => 'dashicons-megaphone',
 'supports'  => ['title', 'editor', 'thumbnail'],
]);

register_post_type('team-member', [
 'public'        => true,
 'labels'        => [
  'name'                  => 'Team Members',
  'all_items'             => 'All team member',
  'add_new'               => 'Add new member',
  'add_new_item'          => 'Add new team member',
  'featured_image'        => 'Team Member Image',
  'set_featured_image'    => 'Upload a team Photo',
  'remove_featured_image' => 'Remove team Photo',
 ],
 'menu_icon'     => 'dashicons-groups',
 'supports'      => ['title', 'editor', 'thumbnail'],

 /*  menu_position
 Default: null – defaults to below Comments

 5 – below Posts
 10 – below Media
 15 – below Links
 20 – below Pages
 25 – below comments
 60 – below first separator
 65 – below Plugins
 70 – below Users
 75 – below Tools
 80 – below Settings
 100 – below second separator
  */

 'menu_position' => 15,
]);

register_taxonomy('team-member-tag', 'team-member', [
 'public' => true,
]);

register_taxonomy('team-member-category', 'team-member', [
 'public'       => true,
 'hierarchical' => true,
]);
