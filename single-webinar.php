<?php get_header();?>
<main>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Нaчaлo cтaндaртнoгo циклa ?>

        <div class="name_i_w_p" id="name_i_w_p"><?php the_title(); ?></div>
        <div class="w_img_f" id="w_img_f" style="background: url(<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>) center no-repeat"></div>
        <div class="w_speaker" id="w_speaker">
            <?php
            $speaker =json_decode(get_post_meta($post->ID,'speaker',true));
            //prn($speaker);
            foreach ($speaker as $s):?>
                <div class="w_all_sp w_sp1">
                    <div class="w_s_img" style="background:url(<?=wp_get_attachment_url( get_post_thumbnail_id($s) );?>) center no-repeat")"></div>
                <span class="w_s_name"><?=get_post($s)->post_title;?></span>
                </div>
            <?php
            endforeach;
            ?>


        </div>
        <div class="wrapper_w_d">
            <div class="web_description">
                <span class="d_name">Вебинар</span>
                <?= the_content(); ?>
                <!--Вставить название вебинара и ссылку на него -->
                <!--Сделал пока по своему, если что поменяешь-->
                <div class="w_soc_share likely likely-small" id="w_soc_share" data-url="" data-title="">
                    <div class="w_soc_1 webinarLikely w_soc_twit twitter ">Твитнуть</div>
                    <div class="w_soc_2 webinarLikely w_soc_fb facebook ">Поделиться</div>
                    <div class="w_soc_3 webinarLikely w_soc_g gplus ">Плюсануть</div>
                    <div class="w_soc_4 webinarLikely w_soc_vk vkontakte ">Поделиться</div>
                </div>
            </div>
            <div class="det_description">
                <span class="d_name">Детали</span>
                <?php
                $data = get_post_meta($post->ID,'date_webinar',true);
                $data = explode('-',$data);

                ?>
                <p class="time_w">Вебинар стартует <?=$data[2];?> <?=name_mon($data[1]);?>, в <?=get_post_meta($post->ID,'time',true)?>, длительность вебинара составит примерно <?=get_post_meta($post->ID,'duration',true)?> часа, с <?=get_post_meta($post->ID,'break',true)?>&#45;минутным кофебрейком.</p>
                <div class="cost_w">Участие в вебинаре абсолютно бесплатное</div>
                <div class="check_in" id="scroll_to_form">Записаться на вебинар</div>
                <p class="check_in_d">Нажмите "Записаться на вебинар" и введите свой адрес электронной почты. Вам придёт ссылка для участия.</p>
            </div>
        </div>


<?php endwhile; // Кoнeц циклa ?>
    <div class="line_i_w_1"></div>
    <div class="box_c_i_i_w" id="box_c_i_i_w">
        <div class="name_c_i">Записаться на вебинар</div>
        <form action="">
            <label for="webinar_n_sn" id="f_w_n_sn" >Имя и фамилия</label>
            <input type="text" id="webinar_n_sn" name="webinar_n_sn">
            <label for="webinar_email" id="f_w_e">Адрес электронной почты</label>
            <input type="text" id="webinar_email" name="webinar_email">
            <button id="w_send_button" webinar="<?php the_title(); ?>">Отправить заявку</button>
            <div class="w_error">Пожалуйста, введите корректный адрес почты</div>
        </form>
    </div>
    <div class="line_i_w_2"></div>
    <div class="after_c_i_i_w">
        После того как вы оставите заявку, ми пришлем вам письмо с подтверждением. За час до начала вебинара вы получите еще одно письмо с напоминанием и ссылкой для участия.
    </div>
</main>
<?php get_footer();?>
