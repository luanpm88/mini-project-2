<?php

class td_module_flex_1 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render( $shortcode_class = '' ) {
        ob_start();

        $hide_image = $this->get_shortcode_att('hide_image');
        $image_size = $this->get_shortcode_att('image_size');
        $show_favourites = $this->get_shortcode_att('show_favourites');
        $category_position = $this->get_shortcode_att('modules_category');
        $btn_title = $this->get_shortcode_att('btn_title');
        $target_blank = $this->get_shortcode_att('open_in_new_window');
        $title_length = $this->get_shortcode_att('mc1_tl');
        $title_tag = $this->get_shortcode_att('mc1_title_tag');
        $author_photo = $this->get_shortcode_att('author_photo');
        $excerpt_length = $this->get_shortcode_att('mc1_el');
        $excerpt_position = $this->get_shortcode_att('excerpt_middle');
        $modified_date = $this->get_shortcode_att('show_modified_date');
        $time_ago = $this->get_shortcode_att('time_ago');
        $time_ago_add_txt = $this->get_shortcode_att('time_ago_add_txt');
        $time_ago_txt_pos = $this->get_shortcode_att('time_ago_txt_pos');
        $hide_audio = $this->get_shortcode_att('hide_audio');

        $extra_cat = '';
        $hide_author_date = '';

        $hide_cat = '';
        $hide_label = '';
        $hide_author = '';
        $hide_date = '';
        $hide_rev = '';
        $hide_com = '';
        $hide_excerpt = '';
        $hide_btn = '';
        if ( !empty($shortcode_class)) {
            switch ($shortcode_class ) {
                case 'td_flex_block_4':
                case 'td_flex_block_3':
                    $hide_cat = $this->get_shortcode_att('show_cat1');
                    $hide_label = $this->get_shortcode_att('modules_extra_cat1'); //this includes label position
                    $hide_author = $this->get_shortcode_att('show_author1');
                    $hide_date = $this->get_shortcode_att('show_date1');
                    $hide_rev = $this->get_shortcode_att('show_review1');
                    $hide_com = $this->get_shortcode_att('show_com1');
                    $hide_excerpt = $this->get_shortcode_att('show_excerpt1');
                    $hide_btn = 'hide';
                    break;
                case 'td_flex_block_1':
                    $hide_cat = $this->get_shortcode_att('show_cat');
                    $hide_label = $this->get_shortcode_att('modules_extra_cat'); //this includes label position
                    $hide_author = $this->get_shortcode_att('show_author');
                    $hide_date = $this->get_shortcode_att('show_date');
                    $hide_rev = $this->get_shortcode_att('show_review');
                    $hide_com = $this->get_shortcode_att('show_com');
                    $hide_excerpt = $this->get_shortcode_att('show_excerpt');
                    $hide_btn = $this->get_shortcode_att('show_btn');
                    break;
            }

            // when to hide
            if( $hide_cat == 'none') {
                $hide_cat = 'hide';
            }
            if( $hide_author == 'none') {
                $hide_author = 'hide';
            }
            if( $hide_date == 'none') {
                $hide_date = 'hide';
            }
            if( $hide_rev == 'none') {
                $hide_rev = 'hide';
            }
            if( $hide_com == 'none') {
                $hide_com = 'hide';
            }
            if( $hide_excerpt == 'none') {
                $hide_excerpt = 'hide';
            }
            if( $hide_btn == 'none') {
                $hide_btn = 'hide';
            }

            $is_custom_label = false;
            if ( $hide_label != 'hide' ) {
                $td_post_theme_settings = td_util::get_post_meta_array($this->post->ID, 'td_post_theme_settings');
                $td_custom_cat_name_url = '#';
                if ( !empty($td_post_theme_settings['td_custom_cat_name']) ) {
                    $is_custom_label = true;

                    //we have a custom category selected
                    $td_custom_cat_name = $td_post_theme_settings['td_custom_cat_name'];
                    if (!empty($td_post_theme_settings['td_custom_cat_name_url'])) {
                        $td_custom_cat_name_url = $td_post_theme_settings['td_custom_cat_name_url'];
                    }
                    $extra_cat = '<a href="' . $td_custom_cat_name_url . '" class="td-post-category td-post-extra-category">'  . $td_custom_cat_name . '</a>';
                }
            }

            if( $hide_author == 'hide' && $hide_date == 'hide' && ( $hide_rev == 'hide' || $this->get_review() == '' ) && $hide_com == 'hide' && $author_photo == '' && ( !$is_custom_label || $hide_label == 'above' ) ) {
                $hide_author_date = 'hide';
            }
        }


        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }
        if (empty($btn_title)) {
            $btn_title = 'Read more';
        }
        if ( $target_blank === 'yes' ) {
            $target_blank = 'target="_blank"';
        }

        $excerpt = '<div class="td-excerpt">';
            $excerpt .= $this->get_excerpt($excerpt_length);
        $excerpt .= '</div>';


        $additional_classes_array = array('td-cpt-'. $this->post->post_type);
        $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );

        ?>

        <div class="td_module_flex <?php echo $this->get_module_classes($additional_classes_array);?>">
            <div class="td-module-container td-category-pos-<?php echo esc_attr($category_position) ?>">
                <?php if( $hide_image == '' ) { ?>
                    <div class="td-image-container">
                        <?php if ($category_position == 'image' && $hide_cat != 'hide') { echo $this->get_category(); }?>
                        <?php echo $this->get_image($image_size, true);?>
                        <?php echo $this->get_video_duration(); ?>
                        <?php if ( $show_favourites !== '' ){ echo $this->get_favorite_badge(); }?>
                    </div>
                <?php } ?>

                <div class="td-module-meta-info">
                    <?php if ($hide_label == 'above') { echo $extra_cat; }?>
                    <?php if ($category_position == 'above' && $hide_cat != 'hide') { echo $this->get_category(); }?>

                    <?php echo $this->get_title($title_length, $title_tag);?>

                    <?php if ($excerpt_position == 'yes' && $hide_excerpt != 'hide') { echo $excerpt; } ?>

                    <?php if( ( $category_position == '' &&  $hide_cat != 'hide' ) || $hide_author_date != 'hide' ) { ?>
                        <div class="td-editor-date">
                            <?php if ($hide_label == '') { echo $extra_cat; }?>
                            <?php if ($category_position == '' && $hide_cat != 'hide') { echo $this->get_category(); }?>

                            <?php if( $hide_author_date != 'hide' ) { ?>
                                <span class="td-author-date">
                                    <?php if( $author_photo != '' ) { echo $this->get_author_photo(); } ?>
                                    <?php if( $hide_author != 'hide' ) { echo $this->get_author(true); } ?>
                                    <?php if( $hide_date != 'hide' ) { echo $this->get_date($modified_date, true, $time_ago, $time_ago_add_txt, $time_ago_txt_pos); } ?>
                                    <?php if( $hide_rev != 'hide' ) { echo $this->get_review(); } ?>
                                    <?php  if( $hide_com != 'hide' ) { echo $this->get_comments(); } ?>
                                </span>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ( $excerpt_position == '' && $hide_excerpt != 'hide' ) { echo $excerpt; } ?>

                    <?php if( $hide_audio == '' ) {
                        echo $this->get_audio_embed();
                    } ?>

                    <?php if( $hide_btn != 'hide' ) { ?>
                    <div class="td-read-more">
                        <a href="<?php echo $this->href;?>" title="<?php echo __td($btn_title, TD_THEME_NAME);?>" <?php echo $target_blank;?> ><?php echo __td($btn_title, TD_THEME_NAME);?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}
