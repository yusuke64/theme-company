<?php
function add_admin_css(){

 echo '<link href="' .get_bloginfo('template_directory') .'/css/admin-style.css' .'" rel="stylesheet" type="text/css" />' ."\n";

}

add_action('admin_head', 'add_admin_css');