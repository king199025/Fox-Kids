<?php

get_header(); ?>

<?php
    $tags = get_tags(array('slug' => single_tag_title('', false)));
    $args = array(
        'tag' => $tags[0]->slug,
        'posts_per_page' => 8,
        'paged' => $_GET['page'],
    );
    $recent = new WP_Query($args);
?>
    <main class="home-container">

        <section class="articles">
            <div class="wrapper">
                <?php
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
                            <?= $post->post_content; ?>
                        </div>
                        <div class="read_more_m_a" onclick="location.href='<?=$post->guid;?>'">Читать подробнее</div>
                        <div class="share_m_a">
                            <span class="share_m_a_name">Рассказать друзьям:</span>
                            <div class="vk_m_a">
                                <a href="http://vk.com/share.php?url=<?= get_permalink(get_the_ID()); ?>" target="_blank">
                                    <div class="s_icon"></div>
                                    <div class="s_number"><?php getVkSharesCount(get_permalink(get_the_ID())) ?></div>
                                </a>
                            </div>
                            <div class="fb_m_a">
                                <a href="http://www.facebook.com/sharer.php?u=<?= get_permalink(get_the_ID()); ?>" target="_blank">
                                    <div class="s_icon"></div>
                                    <div class="s_number"><?php getFbSharesCount(get_permalink(get_the_ID())) ?></div>
                                </a>
                            </div>
                            <div class="od_m_a">
                                <a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?= get_permalink(get_the_ID()); ?>" target="_blank">
                                    <div class="s_icon"></div>
                                    <div class="s_number"><?php getOkSharesCount(get_permalink(get_the_ID())) ?></div>
                                </a>
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

<?php

//get_sidebar();
get_footer();
