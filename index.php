
<?php get_header();?>

<section class="news_f_k parallax-window" data-parallax="scroll" data-image-src="<?=get_template_directory_uri()?>/images/news_f_k.png" id="news_f_k">
    <span class="f_k_solid f_k_op">Новости Fox&amp;Kids</span>
    <span class="f_k_thin f_k_op">Все новости детской академии в <span id="f_k_city">Оренбурге</span></span>
    <div class="f_k_a_d f_k_op" id="arrow_d"></div>
</section>

<main>

    <section class="articles">
        <div class="wrapper">
            <?php do_shortcode('[printBlog]');?>
            <!--<article class="article_m">
                <span class="date">23.10.15</span>
                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                    <span class="t_name_m">Новости</span>,
                    <span class="t_name_m">События</span>,
                    <span class="t_name_m">Питание школьника</span>,
                    <span class="t_name_m">Советы родителям</span>
                    </span>
                <div class="name_m_a">Питание школьника: Продукты для ума</div>
                <div class="text_m_a">
                    Готовимся к школе - это не только собирать портфель, но и пересмотреть рацион питания своего ученика. Совсем скоро ему потребуется много умственных и физических сил, чтобы пережить долгий учебный год.
                </div>
                <div class="read_more_m_a">Читать подробнее</div>
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
            <article class="article_m">
                <span class="date">5.10.15</span>
                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                    <span class="t_name_m">Новости</span>,
                    <span class="t_name_m">События</span>,
                    <span class="t_name_m">Для самых маленьких</span>,
                    <span class="t_name_m">Советы родителям</span>,
                    <span class="t_name_m">Теги могут идти и в две строки</span>,
                    <span class="t_name_m">Но лучше с ними не усердствовать</span>
                    </span>
                <div class="name_m_a">Уроки вежливости для самых маленьких</div>
                <a href="" class="img_m_a"><img src="<?/*=get_template_directory_uri()*/?>/images/article_previews/img_1.png" alt=""></a>
                <div class="text_m_a">
                    Малыши берут пример с взрослых и буквально впитывают все, что слышат и видят. Воспользуйтесь этим, чтобы познакомить ребенка с вежливостью и хорошими манерами! &laquo;Волшебные слова&raquo; Научить малыша &laquo;волшебным словам&raquo; &#8212; это пожалуй, один из самых...
                </div>
                <div class="read_more_m_a">Читать подробнее</div>
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
            <article class="article_m">
                <span class="date">23.10.15</span>
                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                    <span class="t_name_m">Новости</span>,
                    <span class="t_name_m">События</span>,
                    <span class="t_name_m">Питание школьника</span>,
                    <span class="t_name_m">Советы родителям</span>
                    </span>
                <div class="name_m_a">Питание школьника: продукты для ума</div>
                <div class="text_m_a">
                    Готовимся к школе - это не только собирать портфель, но и пересмотреть рацион питания своего ученика. Совсем скоро ему потребуется много умственных и физических сил, чтобы пережить долгий учебный год.
                </div>
                <div class="read_more_m_a">Читать подробнее</div>
                <div class="share_m_a">
                    <span class="share_m_a_name">Рассказать друзьям</span>
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
            <article class="article_m">
                <span class="date">05.10.15</span>
                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                    <span class="t_name_m">Новости</span>,
                    <span class="t_name_m">События</span>,
                    <span class="t_name_m">Для самых маленьких</span>,
                    <span class="t_name_m">Советы родителям</span>,
                    <span class="t_name_m">Теги могут идти и в две строки</span>,
                    <span class="t_name_m">Но лучше с ними не усердствовать</span>
                    </span>
                <div class="name_m_a">Уроки вежливости для самых маленьких</div>
                <a href="" class="img_m_a"><img src="<?/*=get_template_directory_uri()*/?>/images/article_previews/img_1.png" alt=""></a>
                <div class="text_m_a">
                    Малыши берут пример с взрослых и буквально впитывают все, что слышат и видят. Воспользуйтесь этим, чтобы познакомить ребенка с вежливостью и хорошими манерами! &laquo;Волшебные слова&raquo; Научить малыша &laquo;волшебным словам&raquo; &#8212; это пожалуй, один из самых...
                </div>
                <div class="read_more_m_a">Читать подробнее</div>
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
            <article class="article_m">
                <span class="date">23.10.15</span>
                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                    <span class="t_name_m">Новости</span>,
                    <span class="t_name_m">События</span>,
                    <span class="t_name_m">Питание школьника</span>,
                    <span class="t_name_m">Советы родителям</span>
                    </span>
                <div class="name_m_a">Питание школьника: Продукты для ума</div>
                <div class="text_m_a">
                    Готовимся к школе - это не только собирать портфель, но и пересмотреть рацион питания своего ученика. Совсем скоро ему потребуется много умственных и физических сил, чтобы пережить долгий учебный год.
                </div>
                <div class="read_more_m_a">Читать подробнее</div>
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
            <article class="article_m">
                <span class="date">5.10.15</span>
                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                    <span class="t_name_m">Новости</span>,
                    <span class="t_name_m">События</span>,
                    <span class="t_name_m">Для самых маленьких</span>,
                    <span class="t_name_m">Советы родителям</span>,
                    <span class="t_name_m">Теги могут идти и в две строки</span>,
                    <span class="t_name_m">Но лучше с ними не усердствовать</span>
                    </span>
                <div class="name_m_a">Уроки вежливости для самых маленьких</div>
                <a href="" class="img_m_a"><img src="<?/*=get_template_directory_uri()*/?>/images/article_previews/img_1.png" alt=""></a>
                <div class="text_m_a">
                    Малыши берут пример с взрослых и буквально впитывают все, что слышат и видят. Воспользуйтесь этим, чтобы познакомить ребенка с вежливостью и хорошими манерами! &laquo;Волшебные слова&raquo; Научить малыша &laquo;волшебным словам&raquo; &#8212; это пожалуй, один из самых...
                </div>
                <div class="read_more_m_a">Читать подробнее</div>
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
            <article class="article_m">
                <span class="date">23.10.15</span>
                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                    <span class="t_name_m">Новости</span>,
                    <span class="t_name_m">События</span>,
                    <span class="t_name_m">Питание школьника</span>,
                    <span class="t_name_m">Советы родителям</span>
                    </span>
                <div class="name_m_a">Питание школьника: продукты для ума</div>
                <div class="text_m_a">
                    Готовимся к школе - это не только собирать портфель, но и пересмотреть рацион питания своего ученика. Совсем скоро ему потребуется много умственных и физических сил, чтобы пережить долгий учебный год.
                </div>
                <div class="read_more_m_a">Читать подробнее</div>
                <div class="share_m_a">
                    <span class="share_m_a_name">Рассказать друзьям</span>
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
            <article class="article_m">
                <span class="date">05.10.15</span>
                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                    <span class="t_name_m">Новости</span>,
                    <span class="t_name_m">События</span>,
                    <span class="t_name_m">Для самых маленьких</span>,
                    <span class="t_name_m">Советы родителям</span>,
                    <span class="t_name_m">Теги могут идти и в две строки</span>,
                    <span class="t_name_m">Но лучше с ними не усердствовать</span>
                    </span>
                <div class="name_m_a">Уроки вежливости для самых маленьких</div>
                <a href="" class="img_m_a"><img src="<?/*=get_template_directory_uri()*/?>/images/article_previews/img_1.png" alt=""></a>
                <div class="text_m_a">
                    Малыши берут пример с взрослых и буквально впитывают все, что слышат и видят. Воспользуйтесь этим, чтобы познакомить ребенка с вежливостью и хорошими манерами! &laquo;Волшебные слова&raquo; Научить малыша &laquo;волшебным словам&raquo; &#8212; это пожалуй, один из самых...
                </div>
                <div class="read_more_m_a">Читать подробнее</div>
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
            </article>-->
            <section class="pages_control">
                <div class="load_more">Загрузить еще</div>
                <div class="pag_numbers">
                    <span class="p_num active">1</span>
                    <span class="p_num">2</span>
                    <span class="p_num">3</span>
                    <span class="p_num">4</span>
                    <span class="p_num p_num_mob">5</span>
                    <span class="p_num p_num_mob">6</span>
                    <span class="p_num p_num_mob">7</span>
                    <span class="p_num p_num_mob">8</span>
                    <span class="p_num p_num_mob">9</span>
                    <span class="p_num p_num_mob">10</span>
                    <span class="p_num">...</span>
                    <span class="p_num">12</span>
                </div>
            </section>
        </div>
    </section>
    <? get_sidebar();?>
</main>

<?php get_footer(); ?>
