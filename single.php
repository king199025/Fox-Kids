<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>


<main class="page-container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="main_article">
            <div class="date_tags">
                <span class="date"><?=date('d-m-Y', strtotime($post->post_date));?></span>
                <br class="mobile_br">
						<span class="tags">
							<span class="ts_m_m">Теги:</span>
                            <?php the_tags('<span class="t_name_m_m">', '</span>, <span class="t_name_m_m">', '</span>'); ?>
                            <!--<span class="t_name_m_m">Новости</span>,
                            <span class="t_name_m_m">События</span>,
                            <span class="t_name_m_m">Питание школьника</span>,
                            <span class="t_name_m_m">Советы родителям</span>-->
						</span>
            </div>
            <div class="name_m_a_m"><?php the_title(); ?></div>
            <?= get_the_post_thumbnail($post->ID, 'full', ['class' => "inner_img_m"]); ?>
            <!--<img src="<? /*=get_the_post_thumbnail($post->ID); */ ?>" alt="" class="inner_img_m">-->
            <div class="text_m_a_m">
                <?= the_content(); ?>
            </div>
        </article>


    <?php endwhile; ?>
    <?php endif; ?>
    <div class="subscribe_inner">
        <span>Подписаться на рассылку</span>
        <label for="subscribe"></label>
        <input type="email" id="subscribe" placeholder="Ваш e-mail">
        <button id="mail_delivery">подписаться</button>
    </div>


            <?php
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
                $tag_ids = array();
                foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                $args = array(
                    'tag__in' => $tag_ids, // Сортировка производится по тегам
                    'post__not_in' => array($post->ID),
                    'showposts' => 2, // Цифра означает количество выводимых записей
                    'cat' => 3
                );
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) { ?>
                    <section class="e_articles_inner">
                    <div class="e_a_i_read">Читать
                        <br>на эту тему:
                    </div>
                    <div class="e_a_i_wrapper">
            <?php
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        ?>
                        <article class="article_m">
                            <span class="date"><?=date('d-m-Y', strtotime($post->post_date));?></span>
                            <br class="mobile_br">
                            <span class="tags">
                                <span class="ts_m">Теги:</span>
                                <?php the_tags('<span class="t_name_m">', '</span>, <span class="t_name_m">', '</span>'); ?>
                            </span>

                            <div class="name_m_a" onclick="location.href='<?php the_permalink() ?>'"><?php the_title(); ?></div>
                            <a href="<?php the_permalink() ?>" class="img_m_a"><?=get_the_post_thumbnail($post->ID);?></a>

                            <div class="text_m_a">
                                <?=get_extended( $post->post_content )['main']; ?>
                            </div>
                            <div class="read_more_m_a" onclick="location.href='<?php the_permalink() ?>'">Читать подробнее</div>
                            <div class="share_m_a">
                                <span class="share_m_a_name">Рассказать друзьям:</span>

                                <div class="vk_m_a">
                                    <div class="s_icon"></div>
                                    <div class="s_number">24</div>
                                </div>
                                <div class="fb_m_a">
                                    <div class="s_icon"></div>
                                    <div class="s_number">2</div>
                                </div>
                                <div class="od_m_a">
                                    <div class="s_icon"></div>
                                    <div class="s_number">2</div>
                                </div>
                            </div>
                            <div class="line_m_a"></div>
                        </article>

                        <?php
                    }

                }
                wp_reset_query();?>
            </div>
    </section>
           <?php }
            ?>


</main>
<!-- .site-main -->
<?php get_footer(); ?>
<div class="up_button" id="up_button"></div>