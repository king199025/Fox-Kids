<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
	<meta name="description" content="">
	<link rel="icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body>
<?php
$mypost = array( 'post_type' => 'city', );
$city = new WP_Query( $mypost );
//prn($city);
?>
<header class="page_with_mob_name">
	<a href="/" class="logo"><img src="<?php echo get_theme_mod('logo_section'); ?>" alt=""></a>
	<div class="buttons">
		<div class="first_lesson">Пробный урок</div>
		<div class="franchise">Франшиза Fox&amp;Kids</div>
	</div>
	<div class="number"><span><?php echo get_theme_mod('phone_textbox'); ?></span></div>
	<div class="map" id="map"><?=$city->post->post_title;?></div>
	<nav class="pc_menu">
		<!--<ul>
			<li class="active"><a href="">Новости</a></li>
			<li><a href="">Статьи</a></li>
			<li><a href="">Вебинары</a></li>
			<li><a href="">Фотогаллерея</a></li>
			<li><a href="">3D-тур</a></li>
			<li><a href="">Программа</a></li>
			<li><a href="">Меню</a></li>
			<li><a href="">Контакты</a></li>
		</ul>-->
		<?php
		wp_nav_menu( array(
			'menu_class'=>'menu',
			'theme_location'=>'header_menu'
		) );
		?>
	</nav>
	<div class="mob_name">Блог Fox&amp;Kids</div>

	<div class="mobile_menu_name" id="mobile_menu">
            <span class="mobile_hamburger">
                <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
            </span>
		Меню
	</div>
	<nav class="mobile_menu">
		<!--<ul>
			<li><a href="">Блог</a></li>
			<li><a href="">Статьи</a></li>
			<li><a href="">Вебинары</a></li>
			<li><a href="">Фотогаллерея</a></li>
			<li><a href="">3D-тур</a></li>
			<li><a href="">Программа</a></li>
			<li><a href="">Контакты</a></li>
		</ul>-->
		<?php
		wp_nav_menu( array(
			'menu_class'=>'menu',
			'theme_location'=>'header_menu'
		) );
		?>
	</nav>
</header>