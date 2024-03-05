<?php
/**
 * this is the default block template
 * Class td_block_header_10
 */
class td_block_template_10 extends td_block_template {



    /**
     * renders the CSS for each block, each template may require a different css generated by the theme
     * @return string CSS the rendered css and <style> block
     */
    function get_css() {


        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class =  $this->get_unique_block_class();

        // the css that will be compiled by the block, <style> - will be removed by the compiler
        $raw_css = "
        <style>
            
            /* @style_general_template_10 */
            .td_block_template_10.widget > ul > li {
                margin-left: 0 !important;
            }
            .td_block_template_10 .td-block-title {
                font-size: 17px;
                font-weight: 500;
                margin-top: -10px;
                margin-bottom: 24px;
                line-height: 37px;
                padding: 0;
                position: relative;
                text-align: left;
            }
            .td_block_template_10 .td-block-title:before {
                content: '';
                width: 100%;
                height: 3px;
                position: absolute;
                top: 100%;
                left: 0;
                background-color: var(--td_header_color, #f5f5f5);
            }
            .td_block_template_10 .td-block-title > * {
                color: var(--td_text_header_color, #000);
            }
            .td_block_template_10 .td-subcat-filter {
                line-height: 37px;
                display: table;
            }
            .td_block_template_10 .td-subcat-dropdown {
                line-height: 1;
                position: static;
            }
            .td_block_template_10 .td-subcat-dropdown .td-subcat-more {
                margin-bottom: 0 !important;
            }
            .td_block_template_10 .td-subcat-dropdown ul:after {
                height: 3px !important;
            }
            .td_block_template_10 .td-related-title {
                margin-top: 0 !important;
            }
            .td_block_template_10 .td-related-title a {
                margin-right: 20px;
            }
            @media (max-width: 767px) {
                .td_block_template_10 .td-related-title a {
                    font-size: 15px;
                }
            }
            .td_block_template_10 .td-related-title .td-cur-simple-item {
                color: var(--td_theme_color, #4db2ec);
            }
            
            
            /* @header_text_color */
            .$unique_block_class .td-block-title > * {
                color: @header_text_color !important;
            }

            /* @border_color */
            .$unique_block_class .td-block-title:before {
                background-color: @border_color !important;
            }

            /* @accent_text_color */
            .$unique_block_class .td_module_wrap:hover .entry-title a,
            .$unique_block_class .td-pulldown-filter-link:hover,
            .$unique_block_class .td-subcat-item a:hover,
            .$unique_block_class .td-cur-simple-item,
            .$unique_block_class .td_quote_on_blocks,
            .$unique_block_class .td-opacity-cat .td-post-category:hover,
            .$unique_block_class .td-opacity-read .td-read-more a:hover,
            .$unique_block_class .td-opacity-author .td-post-author-name a:hover,
            .$unique_block_class .td-instagram-user a,
            .$unique_block_class .td-subcat-dropdown:hover .td-subcat-more span,
            .$unique_block_class .td-subcat-dropdown:hover .td-subcat-more i {
                color: @accent_text_color !important;
            }

            .$unique_block_class .td-next-prev-wrap a:hover,
            .$unique_block_class .td-load-more-wrap a:hover {
                background-color: @accent_text_color !important;
                border-color: @accent_text_color !important;
            }

            .$unique_block_class .td-read-more a,
            .$unique_block_class .td-weather-information:before,
            .$unique_block_class .td-weather-week:before,
            .$unique_block_class .td-exchange-header:before,
            .td-footer-wrapper .$unique_block_class .td-post-category,
            .$unique_block_class .td-post-category:hover,
            .$unique_block_class .td-subcat-dropdown ul:after {
                background-color: @accent_text_color !important;
            }
        </style>
    ";

        $td_css_compiler = new td_css_compiler(self::get_common_css() . $raw_css );

        /*-- GENERAL -- */
        $td_css_compiler->load_setting_raw( 'style_general_template_10', 1 );

        // check if we have pulldown categories for css
        $td_pull_down_items = $this->get_td_pull_down_items();
        if (!empty($td_pull_down_items)) {
            $td_css_compiler->load_setting_raw('style_general_pulldown', 1);
            $td_css_compiler->load_setting_raw('style_general_pulldown_2', 1);
        }

        $td_css_compiler->load_setting_raw('header_text_color', $this->get_att('header_text_color'));
        $td_css_compiler->load_setting_raw('border_color', $this->get_att('border_color'));
        $td_css_compiler->load_setting_raw('accent_text_color', $this->get_att('accent_text_color'));

        $compiled_style = $td_css_compiler->compile_css();


        return $compiled_style;
    }


    /**
     * renders the block title
     * @return string HTML
     */
    function get_block_title() {

        $custom_title = $this->get_att('custom_title');
        $custom_url = $this->get_att('custom_url');
        $title_tag = 'h4';

        // title_tag used only on Title shortcode
        $block_title_tag = $this->get_att('title_tag');
        if(!empty($block_title_tag)) {
            $title_tag = $block_title_tag ;
        }

        if (empty($custom_title)) {
            $td_pull_down_items = $this->get_td_pull_down_items();
            if (empty($td_pull_down_items)) {
                //no title selected and we don't have pulldown items
                return '';
            }
            // we don't have a title selected BUT we have pull down items! we cannot render pulldown items without a block title
            $custom_title = 'Block title';
        }


        // there is a custom title
        $buffy = '';
        $buffy .= '<' . $title_tag . ' class="td-block-title">';
        if (!empty($custom_url)) {
            $buffy .= '<a href="' . esc_url($custom_url) . '" class="td-pulldown-size">' . esc_html($custom_title) . '</a>';
        } else {
            $buffy .= '<span class="td-pulldown-size">' . esc_html($custom_title) . '</span>';
        }
        $buffy .= '</' . $title_tag . '>';
        return $buffy;
    }


    /**
     * renders the filter of the block
     * @return string
     */
    function get_pull_down_filter() {
        $buffy = '';

        $td_pull_down_items = $this->get_td_pull_down_items();
        if (empty($td_pull_down_items)) {
            return '';
        }

        //generate unique id for this pull down filter control
        $pull_down_wrapper_id = "td_pulldown_" . $this->get_block_uid();

        // wrapper
        $buffy .= '<div class="td-pulldown-syle-2 td-subcat-filter" id="' . $pull_down_wrapper_id . '">';

        // subcategory list
        $buffy .= '<ul class="td-subcat-list" id="' . $pull_down_wrapper_id . '_list">';
        foreach ($td_pull_down_items as $item) {
            $buffy .= '<li class="td-subcat-item"><a class="td-subcat-link" id="' . td_global::td_generate_unique_id() . '" data-td_filter_value="' . $item['id'] . '" data-td_block_id="' . $this->get_block_uid() . '" href="#">' . $item['name'] . '</a></li>';
        }
        $buffy .= '</ul>';


        // subcategory dropdown list
        $buffy .= '<div class="td-subcat-dropdown">';
        $buffy .= '<div class="td-subcat-more" aria-haspopup="true"><span>' . __td('More', TD_THEME_NAME) . '</span><i class="td-icon-read-down"></i></div>';

        // the dropdown list
        $buffy .= '<ul class="td-pulldown-filter-list">';



        $buffy .= '</ul>';

        $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }
}
