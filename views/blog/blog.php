<?php
//prn($post);
foreach ($post as $p):
    ?>
    <article class="article_m">
        <span class="date"><?=$p->post_date;?></span>
        <?php $tag = wp_get_post_tags($p->ID);?>
                    <span class="tags">
                        <span class="ts_m">Теги:</span>
                        <?php foreach($tag as $t):?>
                            <span class="t_name_m"><?=$t->name;?></span>,
                        <?php endforeach;?>
                    </span>
        <a href="<?=$p->guid;?>"><div class="name_m_a"><?=$p->post_title?></div></a>
        <div class="text_m_a">
            <?=$p->post_content;?>
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
    <?php
endforeach;
