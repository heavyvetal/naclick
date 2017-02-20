<?php
//Отключение лишних ссылок в head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links',2);
remove_action('wp_head', 'feed_links_extra',3);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_shortlink_wp_head',10,0);

//Убираем поддержку admin-bar
add_theme_support('admin-bar', array( 'callback' => '__return_false'));
//Отключаем CSS для admin-bar
function registerResource(){
	wp_dequeue_script( 'admin-bar' );
	wp_dequeue_style( 'admin-bar' );
};
add_action('wp_enqueue_scripts', 'registerResource');

function jquery_another_version() {
	wp_deregister_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'jquery_another_version' );

//excerpt segment more
function mayak_segment_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '"> Читать далее»</a>';
}
add_filter('excerpt_more', 'mayak_segment_more');

function dateToRussian($date) {
    $month = array("january"=>"января", "february"=>"февраля", "march"=>"марта", "april"=>"апреля", "may"=>"мая", "june"=>"июня", "july"=>"июля", "august"=>"августа", "september"=>"сентября", "october"=>"октября", "november"=>"ноября", "december"=>"декабря");
    $days = array("monday"=>"Понедельник", "tuesday"=>"Вторник", "wednesday"=>"Среда", "thursday"=>"Четверг", "friday"=>"Пятница", "saturday"=>"Суббота", "sunday"=>"Воскресенье");
    return str_replace(array_merge(array_keys($month), array_keys($days)), array_merge($month, $days), strtolower($date));
}