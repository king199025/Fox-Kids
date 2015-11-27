<?php

define('TM_DIR', get_template_directory(__FILE__));
define('TM_URL', get_template_directory_uri(__FILE__));

require_once TM_DIR . '/lib/Parser.php';

function add_style(){
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css', array(), '1');
    wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css', array(), '1');
    wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css', array(), '1');
    wp_enqueue_style( 'likely', get_template_directory_uri() . '/css/likely.css', array(), '1');
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '1');
    wp_enqueue_style( 'font', get_template_directory_uri() . '/css/font/font.css', array(), '1');
    wp_enqueue_style( 'inner', get_template_directory_uri() . '/css/inner.css', array(), '1');

}

function add_script(){
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1');
    wp_enqueue_script( 'jq', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js', array(), '1');
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1');
    wp_enqueue_script( 'likely', get_template_directory_uri() . '/js/likely.js', array(), '1');
    wp_enqueue_script( 'mobile_script', get_template_directory_uri() . '/js/mobile_script.js', array(), '1');
    /*wp_enqueue_script( 'device', get_template_directory_uri() . '/js/device.js', array(), '1');*/
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.js', array(), '1');
    wp_enqueue_script( 'newParallax', get_template_directory_uri() . '/js/newParallax.js', array(), '1');
    wp_localize_script('jquery', 'myajax',
        array(
            'url' => admin_url('admin-ajax.php'),
            'dir' => get_template_directory_uri()
        )
    );
}

function add_admin_script(){
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '1');
    wp_enqueue_script('admin',get_template_directory_uri() . '/js/admin.js', array(), '1');
    wp_enqueue_style( 'my-bootstrap-extension-admin', get_template_directory_uri() . '/css/bootstrap.css', array(), '1');
    wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_style( 'my-style-admin', get_template_directory_uri() . '/css/admin.css', array(), '1');
}

add_action('admin_enqueue_scripts', 'add_admin_script');
add_action( 'wp_enqueue_scripts', 'add_style' );
add_action( 'wp_enqueue_scripts', 'add_script' );

function prn($content) {
    echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
    print_r ( $content );
    echo '</pre>';
}

function wp_corenavi() {
    global $wp_query;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;
    $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
    $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

    if ($max > 1) echo '<div class="navigation">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}

function excerpt_readmore($more) {
    return '... <br><a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Читать далее' . '</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');


if ( function_exists( 'add_theme_support' ) )
    add_theme_support( 'post-thumbnails' );


register_nav_menus(array(
    'header_menu' => 'Верхнее меню',
));

function my_pagenavi($recent) {
    global $wp_query;
   /* $i = 0;
    foreach($wp_query->posts as $post){
        $cat = get_the_category( $post->ID );
        if($cat[0]->name == 'Блог'){
            $i++;
        }
    }*/
    $big = 999999999; // уникальное число для замены

    $args = array(
        'base' => '?page=%_%',
        'format' => '%#%',
        'total' => $recent->max_num_pages,
        'show_all' => TRUE,
        'current' => (isset($_GET['page'])) ? $_GET['page'] : 1,
        'end_size' => 1,
        'mid_size' => 2,
        'prev_next' => False,
        'type' => 'array',
        'add_args' => False,
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => ''
    );
    $result = paginate_links($args);

    if( is_array( $result ) ) {
       // $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pag_numbers">';
        foreach ( $result as $page ) {
            echo '<span class="p_num">'.$page.'</span>';
        }
        echo '</div>';
    }
    // удаляем добавку к пагинации для первой страницы
    //$result = str_replace( '/page/1/', '', $result );

}

add_action('customize_register', function($customizer){
    /*Меню настройки контактов*/
    $customizer->add_section(
        'contacts_section',
        array(
            'title' => 'Настройки контактов',
            'description' => 'Контакты',
            'priority' => 35,
        )
    );

    $customizer->add_setting(
        'mail_textbox',
        array('default' => 'info@foxandkids.ru')
    );

    $customizer->add_setting(
        'mail_textbox_delivery',
        array('default' => 'info@foxandkids.ru')
    );

    $customizer->add_setting(
        'phone_textbox',
        array('default' => '+7 (3532) 45-18-17')
    );

    $customizer->add_control(
        'mail_textbox',
        array(
            'label' => 'Email',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'mail_textbox_delivery',
        array(
            'label' => 'Email для рассылок',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'phone_textbox',
        array(
            'label' => 'Телефон',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );

    $customizer->add_section(
        'logo_section',
        array(
            'title' => 'Логотип',
            'description' => 'Логотип',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
        'logo_textbox'
    );
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'logo',
            array(
                'label' => __( 'Upload a logo', 'theme_name' ),
                'section' => 'logo_section',
                'settings' => 'logo_textbox'
            )
        )
    );
});

add_action('wp_ajax_delivery', 'delivery');
add_action('wp_ajax_nopriv_delivery', 'delivery');

function delivery(){
    mail(get_theme_mod('mail_textbox_delivery'),'Подписка на рассылку','email - '.$_POST['email']);
    die();
}