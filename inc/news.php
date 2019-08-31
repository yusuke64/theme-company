<?php
// add_action('init', 'register_post_type_and_taxonomy');
// function register_post_type_and_taxonomy() {
//   register_post_type(
//     'news',
//     array(
//       'labels' => array(
//         'name' => 'お知らせ',
//         'all_items' => 'お知らせ一覧',
//         'add_new_item' => 'お知らせを追加',
//         'add_new' => 'お知らせを追加',
//         'edit_item' => 'お知らせの編集',
//         'view_item' => 'お知らせを表示',
//         'search_items' => 'お知らせを検索',
//         'not_found' => 'お知らせは見つかりませんでした',
//       ),
//       'public' => true,
//       'hierarchical' => false,
//       'has_archive' => true,
//       'supports' => array(
//         'title',
//         'editor',
//         'custom-fields',
//         'thumbnail',
//       ),
//       'menu_position' => 5,
//       'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
//     )
//   );

// /* カテゴリタクソノミー(カテゴリー分け)を使えるように設定する */
//   register_taxonomy(
//     'orijinal_themes_cat',
//     'news',
//     array(
//       'hierarchical' => true,
//       'update_count_callback' => '_update_post_term_count',
//       'label' => 'オリジナルテーマ作成カテゴリー',
//       'singular_label' => 'オリジナルテーマ作成カテゴリー',
//       'public' => true,
//       'show_ui' => true
//     )
//   );
// /* カスタムタクソノミー、タグを使えるようにする */
//   register_taxonomy(
//     'orijinal_themes_tag',
//     'news',
//     array(
//       'hierarchical' => false,
//       'update_count_callback' => '_update_post_term_count',
//       'label' => 'オリジナルテーマ作成タグ',
//       'singular_label' => 'オリジナルテーマ作成タグ',
//       'public' => true,
//       'show_ui' => true
//     )
//   );
// }
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = 'お知らせ';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = $name.'を追加';
}
function Change_objectlabel() {
	global $wp_post_types;
	$name = 'お知らせ';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );
