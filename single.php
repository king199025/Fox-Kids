<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>


    <main>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="main_article">
					<div class="date_tags">
						<span class="date">23.10.15</span>
						<br class="mobile_br">
						<span class="tags">
							<span class="ts_m_m">Теги:</span>
						<span class="t_name_m_m">Новости</span>,
						<span class="t_name_m_m">События</span>,
						<span class="t_name_m_m">Питание школьника</span>,
						<span class="t_name_m_m">Советы родителям</span>
						</span>
					</div>
					<div class="name_m_a_m"><?php the_title(); ?></div>
					<img src="<?php bloginfo('template_directory'); ?>/images/inner_page.png" alt="" class="inner_img_m">
					<div class="text_m_a_m">
						<?= the_content(); ?>
					</div>
				</article>


			<?php endwhile; ?>
			<?php endif; ?>


	</main>
<!-- .site-main -->
<?php get_footer(); ?>
<div class="up_button" id="up_button"></div>