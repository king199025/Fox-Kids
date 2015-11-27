
<?php get_header();?>

<section class="news_f_k parallax-window" data-parallax="scroll" data-image-src="<?=get_template_directory_uri()?>/images/news_f_k.png" id="news_f_k">
    <span class="f_k_solid f_k_op">Новости Fox&amp;Kids</span>
    <span class="f_k_thin f_k_op">Все новости детской академии в <span id="f_k_city">Оренбурге</span></span>
    <div class="f_k_a_d f_k_op" id="arrow_d"></div>
</section>

<main class="home-container">

    <section class="articles">
        <div class="wrapper">
            <?php
            $id = 3; // ID заданной рубрики

            //$page = (get_query_var('page')) ? get_query_var('page') : 1;

            $recent = new WP_Query(array(
                'posts_per_page' => 1,
                'cat'=> $id,
                'paged' => $_GET['page'],
                ));

            while($recent->have_posts()) : $recent->the_post();
                ?>

                <article class="article_m">
                    <span class="date"><?=date('d-m-Y', strtotime($post->post_date));?></span>

                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                        <?php the_tags('<span class="t_name_m">','</span>, <span class="t_name_m">','</span>');?>
                    </span>
                    <div class="name_m_a" onclick="location.href='<?=$post->guid;?>'"><?=$post->post_title?></div>
                    <a href="" class="img_m_a"><?=get_the_post_thumbnail($post->ID);?></a>
                    <div class="text_m_a">
                        <?=get_extended( $post->post_content )['main']; ?>
                    </div>
                    <div class="read_more_m_a" onclick="location.href='<?=$post->guid;?>'">Читать подробнее</div>
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
            <?php endwhile; ?>



            <section class="pages_control">
                <div class="load_more">Загрузить еще</div>
                <?php my_pagenavi($recent); ?>
            </section>
        </div>
    </section>
    <aside>
        <div class="aside_wrapper">
    <?php if ( is_active_sidebar( 'main_sidebar' ) ) : ?>
            <?php dynamic_sidebar( 'main_sidebar' ); ?>
    <?php endif; ?>

    <div class="madeIn">Сайт разработан в <a href="">бренд-бюро</a></div>
    </div>
    </aside>
    <? /*get_sidebar();*/?>
</main>

<?php get_footer(); ?>
