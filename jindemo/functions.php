<?php

function my_scripts() {
  wp_enqueue_style( 'style-name', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/setting.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

function my_setup() {
  add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
  add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
  add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
  add_theme_support( 'html5', array( /* HTML5のタグで出力 */
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );
}
add_action( 'after_setup_theme', 'my_setup' );

function my_menu_init() {
  register_nav_menus( array(
    'global'  => 'グローバルメニュー',
    'utility' => 'ユーティリティメニュー',
    'drawer'  => 'ドロワーメニュー',
    'footer-navigation' => 'Footer Navigation',
  ) );
}
add_action( 'init', 'my_menu_init' );

function my_widget_init() {
  register_sidebar( array(
    // 'name'          => 'サイドバー',
    // 'id'            => 'sidebar',
    'before_widget' => '<div class="thema">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="side-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar(array(
    'name' => 'フッター',
    'id' => 'footer',
  ));
}
add_action( 'widgets_init', 'my_widget_init' );

//タグクラウドの出力変更
function wp_tag_cloud_custom_ex( $output ) {
  //style属性を取り除く
  $output = preg_replace( '/\s*?style="[^"]+?"/i', '',  $output);
  //カッコを取り除く
  $output = str_replace( ' (', '',  $output);
  $output = str_replace( ')', '',  $output);
  return $output;
}
add_filter( 'wp_tag_cloud', 'wp_tag_cloud_custom_ex');


function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="'.home_url( '/' ).'" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'my_search_form' );

// ページネイショん
function the_pagination() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '&larr;',
    'next_text'    => '&rarr;',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</nav>';
}
