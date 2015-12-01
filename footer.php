<?php
if ( is_home() ) {

} else {?>
	<footer>
		<div class="cont_company">
			<div class="c_c_group">&copy; ООО &laquo;ФоксГруп&raquo;, 2015</div>
			<div class="c_c_m"><a href=""><?php echo get_theme_mod('mail_textbox'); ?></a></div>
		</div>
		<ul class="f_nav">

			<?php
			wp_nav_menu( array(
				'menu_class'=>'menu',
				'theme_location'=>'header_menu'
			) );
			?>
		</ul>
		<div class="made_in">
			<div class="m_i">Сайт разработан в</div>
			<div class="m_i_name"><a href="">Бренд-бюро</a></div>
		</div>
	</footer>
	<?php

}
?>
<?php
$mypost = array( 'post_type' => 'city', );
$city = new WP_Query( $mypost );
//prn($city);
?>
<div class="popUpCity disable" id="popUpCity">
	<div class="bold">Укажите Ваш город:</div>
	<div class="close" id="closeCityChoose"></div>
	<div class="holderCity">
		<?php foreach ($city->posts as $c) {
			?>
			<span data="1" id="hCity1" dataCity="<?=$c->post_title;?>"><?=$c->post_title;?></span>
			<?
		}
		?>
		<!--<span data="1" id="hCity1" dataCity="Оренбург" class="active">Оренбург</span>
		<span data="2" id="hCity2" dataCity="Ставрополь">Ставрополь</span>
		<span data="3" id="hCity3" dataCity="Новочеркаск">Новочеркасск</span>
		<span data="4" id="hCity4" dataCity="Шахты">Шахты</span>
		<span data="5" id="hCity5" dataCity="Ростов-на-Дону">Ростов-на-Дону</span>
		<span data="6" id="hCity6" dataCity="Уфа">Уфа</span>
		<span data="7" id="hCity7" dataCity="Тольятти">Тольятти</span>-->
	</div>
</div>

<?php wp_footer();?>
<script type="text/javascript">
	addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
	var myajax = '/wp-admin/admin-ajax.php',
		pagenow = 'toplevel_page_mainpage',
		typenow = '',
		adminpage = 'toplevel_page_mainpage',
		thousandsSeparator = ' ',
		decimalPoint = ',',
		isRtl = 0;
</script>

</body>
</html>
