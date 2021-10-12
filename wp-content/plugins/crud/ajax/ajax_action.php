<?php
add_action('wp_ajax_wqnew_entry', 'wqnew_entry_callback_function');
add_action('wp_ajax_nopriv_wqnew_entry', 'wqnew_entry_callback_function');

function wqnew_entry_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `wp_crud` WHERE `title` = '".$_POST['wqtitle']."' AND `description` = '".$_POST['wqdescription']."' AND `media` = '".$_POST['wqmedia']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->insert("wp_crud", array(
      "title" => $_POST['wqtitle'],
      "description" => $_POST['wqdescription'],
      "media" => $_POST['wqmedia'],
      "created_at" => time(),
      "updated_at" => time()
    ));

    $response = array('message'=>'Los datos se han insertado correctamente', 'rescode'=>200);
  } else {
    $response = array('message'=>'Los datos ya existen', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}



add_action('wp_ajax_wqedit_entry', 'wqedit_entry_callback_function');
add_action('wp_ajax_nopriv_wqedit_entry', 'wqedit_entry_callback_function');

function wqedit_entry_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `wp_crud` WHERE `title` = '".$_POST['wqtitle']."' AND `description` = '".$_POST['wqdescription']."' AND `media` = '".$_POST['wqmedia']."' AND `id`!='".$_POST['wqentryid']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->update( "wp_crud", array(
      "title" => $_POST['wqtitle'],
      "description" => $_POST['wqdescription'],
      "media" => $_POST['wqmedia'],
      "updated_at" => time()
    ), array('id' => $_POST['wqentryid']) );

    $response = array('message'=>'Los datos se han actualizado correctamente ', 'rescode'=>200);
  } else {
    $response = array('message'=>'Los datos ya existen', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}
