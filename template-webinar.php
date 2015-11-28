<?php
/*
    Template Name: Шаблон вебинаров
*/
get_header(); ?>
    <section class="web_list_img parallax-window" data-parallax="scroll" data-image-src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>">
        <!--<div class="w_l_c_o web_list_name_b">Вебинары Fox&amp;Kids</div>
        <div class="w_l_c_o web_list_name_t">Все о воспитании детей</div>-->
        <?=$post->post_content; ?>
        <div class="w_l_c_o web_list_arrow_d" id="arrow_d"></div>
    </section>
<?php
$mypost = array( 'post_type' => 'webinar', );
$loop = new WP_Query( $mypost );
//prn($loop);
// Start the loop.
 ?>
    <main class="page-webinar">
<?php
$k = 1;
while($loop->have_posts()) : $loop->the_post();
    $speaker =json_decode(get_post_meta($post->ID,'speaker',true));
    $data = get_post_meta($post->ID,'date_webinar',true);
    if ($k == 1){
        ?>
        <div class="web_preview web_preview_with_bg" style="background:url(<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>) #0099cc;">
            <div class="web_p_name"><?=$post->post_title;?></div>
            <div class="web_p_speaker_name">
                <?php
                foreach ($speaker as $s):
                    echo get_post($s)->post_title.'<br>';
                endforeach;
                ?>
            </div>
            <div class="web_p_button" onclick="location.href='<?=$post->guid;?>'">Записаться</div>
            <div class="web_p_date"><?=date('d.m.y',strtotime($data));?></div>
        </div>
        <?php


    }
    if($k == 2){
        ?>
        <div class="web_preview w_p_small" style="background:url(<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>);">
            <div class="web_p_name"><?=$post->post_title;?></div>
            <div class="web_p_speaker_name">
                <?php
                foreach ($speaker as $s):
                    echo get_post($s)->post_title.'<br>';
                endforeach;
                ?>
            </div>
            <div class="web_p_button" onclick="location.href='<?=$post->guid;?>'">Записаться</div>
            <div class="web_p_date"><?=date('d.m.y',strtotime($data));?></div>
        </div>
        <?php

    }
    if($k == 3){
        ?>
        <div class="web_preview w_p_small web_preview_with_bg" style="background:url(<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>);">
            <div class="web_p_name"><?=$post->post_title;?></div>
            <div class="web_p_speaker_name">
                <?php
                foreach ($speaker as $s):
                    echo get_post($s)->post_title.'<br>';
                endforeach;
                ?>
            </div>
            <div class="web_p_button" onclick="location.href='<?=$post->guid;?>'" >Записаться</div>
            <div class="web_p_date"><?=date('d.m.y',strtotime($data));?></div>
        </div>
        <?php
    }
    if($k == 3){
        $k = 1;
    }
    else{
        $k++;
    }

    // End the loop.
endwhile;

?>
    </main>
<?php get_footer(); ?>