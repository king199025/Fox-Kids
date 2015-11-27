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
    wp_enqueue_style( 'istyle', get_template_directory_uri() . '/css/istyle.css', array(), '1');
}

function add_script(){
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1');
    wp_enqueue_script( 'jq', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js', array(), '1');
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1');
    wp_enqueue_script( 'likely', get_template_directory_uri() . '/js/likely.js', array(), '1');
    wp_enqueue_script( 'mobile_script', get_template_directory_uri() . '/js/mobile_script.js', array(), '1');
    wp_enqueue_script( 'device', get_template_directory_uri() . '/js/device.js', array(), '1');
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

/*---------------------------------САЙДБАР--------------------------------------------*/
/*КАСТОМНЫЕ ПОСТЫ АНОНСЫ*/
add_action('save_post', 'myExtraFieldsUpdate', 10, 1);

/* Сохраняем данные, при сохранении поста */
function myExtraFieldsUpdate($post_id)
{
    if (!isset($_POST['extra'])) return false;
    foreach ($_POST['extra'] as $key => $value) {
        if (empty($value)) {
            delete_post_meta($post_id, $key); // удаляем поле если значение пустое
            continue;
        }

        update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
    }
    return $post_id;
}
add_action('init', 'myCustomInitAnounce');
function myCustomInitAnounce()
{
    $labels = array(
        'name' => 'Анонсы', // Основное название типа записи
        'singular_name' => 'Анонс', // отдельное название записи типа Book
        'add_new' => 'Добавить анонс',
        'add_new_item' => 'Добавить новый анонс',
        'edit_item' => 'Редактировать анонс',
        'new_item' => 'Новый анонс',
        'view_item' => 'Посмотреть анонс',
        'search_items' => 'Найти анонс',
        'not_found' => 'Анонсов не найдено',
        'not_found_in_trash' => 'В корзине анонсов не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Анонсы'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','thumbnail','editor')
    );
    register_post_type('anounces', $args);
}

function extraFieldsLink($post)
{
    ?>
    <p>
        <span>Ссылка на анонс: </span>
        <input type="text" name='extra[link]' value="<?php echo get_post_meta($post->ID, "link", 1); ?>">
    </p>
    <?php
}

function myExtraFieldsAnounce()
{
    add_meta_box('extra_link', 'Link', 'extraFieldsLink', 'anounces', 'normal', 'high');
}

add_action('add_meta_boxes', 'myExtraFieldsAnounce', 1);
/* В боковой колонке*/
register_sidebar(
    array(
        'id' => 'main_sidebar', // уникальный id
        'name' => 'Боковая колонка', // название сайдбара
        'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
        'before_widget' => '<div class="widget-block">', // по умолчанию виджеты выводятся <li>-списком
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">', // по умолчанию заголовки виджетов в <h2>
        'after_title' => '</div>'
    )
);

/*Создаем виджет*/
/**/
class Anounce_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
            'anounce_widget', // Base ID
            'Анонсы', // Name
            array('description' => __( 'Показывает последние анонсы. Выводит картинку, текст и кнопку с ссылкой на событие'))
        );
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
        return $instance;
    }
    function form($instance) {
        if( $instance) {
            $title = esc_attr($instance['title']);
            $numberOfListings = esc_attr($instance['numberOfListings']);
        } else {
            $title = '';
            $numberOfListings = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок виджета', 'anounce_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('numberOfListings'); ?>"><?php _e('Количество записей:', 'anounce_widget'); ?></label>
            <select id="<?php echo $this->get_field_id('numberOfListings'); ?>"  name="<?php echo $this->get_field_name('numberOfListings'); ?>">
                <?php for($x=1;$x<=10;$x++): ?>
                    <option <?php echo $x == $numberOfListings ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
                <?php endfor;?>
            </select>
        </p>
        <?php
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $numberOfListings = $instance['numberOfListings'];
        //echo $before_widget;
        if ( $title ) {
            echo $title;
        }
        $this->getAnounceListings($numberOfListings);
        //echo $after_widget;
    }
    function getAnounceListings($numberOfListings) { //html
        global $post;
        add_image_size( 'anounce_widget_size', 85, 45, false );
        $listings = new WP_Query();
        $listings->query('post_type=anounces&posts_per_page=' . $numberOfListings );
        if($listings->found_posts > 0) {
            //echo '<ul class="anounce_widget">';
            while ($listings->have_posts()) {
                $listings->the_post();

                $listItem = '<article class="aside_a">';
                $listItem .= '<div class="name_a_a">'.get_the_title() . '</div>';
                $listItem .= '<div class="img_a_a">'.get_the_post_thumbnail($post->ID, 'anounce_widget_size').'</div>';
                $listItem .= ' <div class="text_a_a">'.get_the_content().'</div>';
                $listItem .= '<a href="' . get_post_meta($post->ID, "link", 1) . '"><div class="button_a_a">Узнать подробнее</div></a></article>';

                echo $listItem;
            }
            //echo '</ul>';
            wp_reset_postdata();
        }else{
            echo '';
        }
    }
} //end class Anounce_Widget
register_widget('Anounce_Widget');
/**/
/**/
class Contacts_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
            'contacts_widget', // Base ID
            'Контакты', // Name
            array('description' => __( 'Показывает контакты. Выводит адрес и телефон'))
        );
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['address'] = strip_tags($new_instance['address']);
        return $instance;
    }
    function form($instance) {
        if( $instance) {
            $phone = esc_attr($instance['phone']);
            $address = esc_attr($instance['address']);
        } else {
            $phone = '';
            $address = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Телефон', 'contact_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Адрес', 'contact_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" />
        </p>
        <?php
    }
    function widget($args, $instance) {
        extract( $args );
        $phone = apply_filters('widget_phone', $instance['phone']);
        $address = $instance['address'];
        echo '<div class="contacts_a">';
        if ( $phone ) {
            echo '<div class="number_a">'. $phone .'</div>';
        }
        if ( $address ) {
            echo '<div class="mail_a">'. $address .'</div>';
        }
        echo '</div><div class="line_a"></div>';
    }
} //end class Anounce_Widget
register_widget('Contacts_Widget');
/**/
/**/
class Social_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
            'Social_widget', // Base ID
            'Социальные сети', // Name
            array('description' => __( 'Показывает соц сети. Выводит соц сети'))
        );
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['fb'] = strip_tags($new_instance['fb']);
        $instance['ok'] = strip_tags($new_instance['ok']);
        $instance['vk'] = strip_tags($new_instance['vk']);
        return $instance;
    }
    function form($instance) {
        if( $instance) {
            $fb = esc_attr($instance['fb']);
            $ok = esc_attr($instance['ok']);
            $vk = esc_attr($instance['vk']);
        } else {
            $fb = '';
            $ok = '';
            $vk = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('fb'); ?>"><?php _e('Facebook', 'social_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('fb'); ?>" name="<?php echo $this->get_field_name('fb'); ?>" type="text" value="<?php echo $fb; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('ok'); ?>"><?php _e('Одноклассники', 'social_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('ok'); ?>" name="<?php echo $this->get_field_name('ok'); ?>" type="text" value="<?php echo $ok; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('vk'); ?>"><?php _e('Вконтакте', 'social_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('vk'); ?>" name="<?php echo $this->get_field_name('vk'); ?>" type="text" value="<?php echo $vk; ?>" />
        </p>
        <?php
    }
    function widget($args, $instance) {
        extract( $args );
        $fb = apply_filters('widget_fb', $instance['fb']);
        $ok = apply_filters('widget_ok', $instance['ok']);
        $vk = apply_filters('widget_vk', $instance['vk']);

       // echo $before_widget;

        echo '<div class="social_a">';

        if ( $fb ) {
            echo '<a href="'.$fb.'"><div class="soc_a fb_a"></div></a>';
        }

        if ( $ok ) {
            echo '<a href="'.$ok.'"><div class="soc_a od_a"></div></a>';
        }

        if ( $vk ) {
            echo '<a href="'.$vk.'"><div class="soc_a vk_a"></div></a>';
        }

        echo '</div>';
       // echo $after_widget;
    }
} //end class Anounce_Widget
register_widget('Social_Widget');
/**/
/**/
class Tags_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
            'tags_widget', // Base ID
            'Популярные теги', // Name
            array('description' => __( 'Показывает 8 популярных тегов.'))
        );
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
    function form($instance) {
        if( $instance) {
            $title = esc_attr($instance['title']);
        } else {
            $title = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок виджета', 'tags_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        echo '<div class="pop_tags">';
        if ( $title ) {
            echo '<div class="pop_tags_name">'.$title.'</div>';
        }
        $this->getPopularTags();
        echo '</div>';
    }
    function getPopularTags() { //html
       // global $post;
        $params = array(
            'orderby' => 'count',
            'number' => 8,
            'order' => 'DESC'
        );

        $tags = get_tags($params);
        echo '<ul class="b_w_tags">';
        foreach ($tags as $tag) :
            echo '<li><a href="'.get_tag_link($tag->term_id).'"></a>'.$tag->name.'</li>';
        endforeach;
        echo '</ul>';
    }
} //end class Tags_Widget
register_widget('Tags_Widget');
/**/
/**/
class Lesson_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
            'lesson_widget', // Base ID
            'Урок', // Name
            array('description' => __( 'Выводит ссылку для урока'))
        );
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['link'] = strip_tags($new_instance['link']);
        return $instance;
    }
    function form($instance) {
        if( $instance) {
            $title = esc_attr($instance['title']);
            $link = esc_attr($instance['link']);
        } else {
            $title = '';
            $link = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заголовок', 'lesson_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Ссылка', 'lesson_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
        </p>
        <?php
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $link = $instance['link'];
        echo '<div class="enroll_a">';
        if ( $title && $link) {
            echo '<div class="number_a"><a href="'.$link.'">'. $title .'</a></div>';
        }
        echo '</div>';
    }
} //end class Lesson_Widget
register_widget('Lesson_Widget');
/**/
/*----------------------------КОНЕЦ САЙДБАР-------------------------------------------*/