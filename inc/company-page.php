<?php
// add_action('init', 'register_post_type_company');
// function register_post_type_company() {
//   register_post_type(
//     'company',
//     array(
//       'labels' => array(
//         'name' => '会社概要',
//         'all_items' => '会社概要',
//         'add_new_item' => '会社概要の追加',
//         'add_new' => '会社概要の追加',
//         'edit_item' => '会社概要を編集',
//         'view_item' => '会社概要を表示',
//       ),
//       'public' => true,
//       'hierarchical' => false,
//       'supports' => array(
//         'title',
//         'custom-fields',
//         'thumbnail',
//       ),
//       'menu_position' => 5,
//       'rewrite' => array('with_front' => false), // パーマリンクの編集（companyの前の階層URLを消して表示）
//     )
//   );
// }

// カスタムフィールド
add_action('admin_menu', 'add_custom_inputbox');
add_action('save_post', 'save_custom_postdata');

function add_custom_inputbox(){
  add_meta_box('company', '会社概要', 'custom_area', 'page', 'normal');
}

$max_item_num = 11;

function custom_area(){
  global $post;
  global $max_item_num;

  echo '<table class="setCompany">';
  echo '<p>右側設定エリアの、ページ属性＞テンプレート: で「会社概要ページ」を選択し、下記の入力欄に表示したい項目を入力してください。</p>';
  echo '<p>10項目まで入力できます</p>';
  for($i = 1; $i < $max_item_num; $i++){

      echo '<tr class="setCompany-items"><td class="setCompany-itemName"><input placeholder="項目名'.$i.'" name="itemName'.$i.'" value="'.get_post_meta($post->ID, 'itemName'.$i, true).'">： </td><td class="setCompany-item"><textarea placeholder="内容'.$i.'" name="item'.$i.'">'.get_post_meta($post->ID, 'item'.$i, true).'</textarea></td></tr>';
  }
  echo '</table>';
}

function save_custom_postdata($post_id){
  global $max_item_num;

  $itemName = '';
  $item = '';

  for($i = 1; $i < $max_item_num; $i++){
    if(isset($_POST['itemName'.$i])){
        $itemName = $_POST['itemName'.$i];
    }
    if($itemName != get_post_meta($post_id, 'itemName'.$i, true)){
        update_post_meta($post_id, 'itemName'.$i, $itemName);
    }elseif($itemName == ''){
        delete_post_meta($post_id, 'itemName'.$i, get_post_meta($post_id, 'itemName'.$i, true));
    }
  }

  for($i = 1; $i < $max_item_num; $i++){
    if(isset($_POST['item'.$i])){
        $item = $_POST['item'.$i];
    }
    if($item != get_post_meta($post_id, 'item'.$i, true)){
        update_post_meta($post_id, 'item'.$i, $item);
    }elseif($item == ''){
        delete_post_meta($post_id, 'item'.$i, get_post_meta($post_id, 'item'.$i, true));
    }
  }

}