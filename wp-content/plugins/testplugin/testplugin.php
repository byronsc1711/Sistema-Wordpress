<?php
/*
Plugin Name: Test Plugin
Plugin URI: http://solodata.es
Description: Plugin para Crud
Version: 0.0.1
*/

function Activar(){
    global $wpdb;

    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}datoss(
         `id` INT(11) NOT NULL AUTO_INCREMENT , 
         `titulo` VARCHAR(100) NOT NULL , 
         `descripcion` VARCHAR(300) NOT NULL , 
         `cultura` VARCHAR(100) NOT NULL , 
         `archivo` LONGBLOB, 
         PRIMARY KEY (`id`));";

         $wpdb->query($sql);

}

function Desactivar(){
    flush_rewrite_rules();

}

register_activation_hook(__FILE__, 'Activar');
register_deactivation_hook(__FILE__,'Desactivar');
add_action('admin_menu','CrearMenu');

function CrearMenu(){
    add_menu_page(
        'SISTEMA PARA CRUD',
        'Desarrollo de un crud',
        'manage_options',
        plugin_dir_path(__FILE__).'admin/lista.php',
        null,
        plugin_dir_url(__FILE__).'admin/icon.png',
        '1'
    );

}

function MostrarContenido(){
    echo "<h1>SISTEMA PARA CRUD</H1>";
}

function EncolarBootstrapJS($hook){
    //echo "<script>console.log('$hook')</script>";
    if($hook != "testplugin/admin/lista.php"){
        return ;

    }
    wp_enqueue_script('bootstrapJs',plugins_url('admin/bootstrap/js/bootstrap.min.js',__FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts','EncolarBootstrapJS');


function EncolarBootstrapCSS($hook){
    //echo "<script>console.log('$hook')</script>";
    if($hook != "testplugin/admin/lista.php"){
        return ;

    }
    wp_enqueue_style('bootstrapCSS',plugins_url('admin/bootstrap/css/bootstrap.min.css',__FILE__));
}
add_action('admin_enqueue_scripts','EncolarBootstrapCSS');


function EncolarJS($hook){
    //echo "<script>console.log('$hook')</script>";
    if($hook != "testplugin/admin/lista.php"){
        return ;
    }
    wp_enqueue_script('JsExterno',plugins_url('admin/js/lista.js',__FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts','EncolarJS');