<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_icon_box3 extends td_style {

    public $icon_style;
    private $unique_block_class;
    private $unique_style_class;

    private $atts = array();
    private $index_style;

    function __construct( $atts, $unique_block_class = '', $index_style = '') {
        $this->atts = $atts;
        $this->unique_block_class = $unique_block_class;
        $this->index_style = $index_style;
    }

    private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;
        $unique_block_class = $this->unique_block_class;

        $raw_css =
			"<style>

                /* @style_general_icon_box3 */
                .tds_icon_box3_wrap .tdm-title-icon-wrap {
                  position: relative;
                  display: table;
                }
                .tds_icon_box3_wrap.tdm-content-horiz-center .tdm-title-icon-wrap {
                  margin-left: auto;
                  margin-right: auto;
                }
                .tds_icon_box3_wrap.tdm-content-horiz-right .tdm-title-icon-wrap {
                  margin-left: auto;
                }
                .tds_icon_box3_wrap .tds-icon {
                  position: absolute;
                  top: 0;
                  left: 0;
                  color: #dcf3f8;
                }
                .tds_icon_box3_wrap .icon_box_url_wrap {
                  display: block;
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                }

                
                
                
                /* @icon_vertical_space */
				.$unique_style_class .tds-icon {
				    top: @icon_vertical_space !important;
				}
				
				/* @icon_horizontal_space */
				.$unique_style_class .tds-icon {
				   left: @icon_horizontal_space !important;
				}
				
				/* @title_bottom_space */
				.$unique_style_class .tds-title {
				    margin-bottom: @title_bottom_space;
				}
				/* @description_bottom_space */
				.$unique_style_class .tdm-descr {
				    margin-bottom: @description_bottom_space;
				}
				
				/* @icon_box_description_color */
				.$unique_style_class .tdm-descr {
				    color: @icon_box_description_color;			  
				}
				
				/* @icon_box_hover_description_color */
				.$unique_block_class:hover .tdm-descr {
				    color: @icon_box_hover_description_color;			  
				}



				/* @f_descr */
				.$unique_block_class .tdm-descr {
					@f_descr
				}

			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
	}

    /**
     * Callback pe media
     *
     * @param $res_ctx td_res_context
     */
    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_icon_box3', 1 );

        /*-- ICON -- */
        // icon vertical space
        $res_ctx->load_settings_raw( 'icon_vertical_space', $res_ctx->get_style_att( 'icon_vertical_space', __CLASS__ ) . 'px' );

        // icon horizontal space
        $res_ctx->load_settings_raw( 'icon_horizontal_space', $res_ctx->get_style_att( 'icon_horizontal_space', __CLASS__ ) . 'px' );



        /*-- TITLE -- */
        // title bottom space
        $res_ctx->load_settings_raw( 'title_bottom_space', $res_ctx->get_style_att( 'title_bottom_space', __CLASS__ ) . 'px' );



        /*-- DESCRIPTION -- */
        // description bottom space
        $res_ctx->load_settings_raw( 'description_bottom_space', $res_ctx->get_style_att( 'description_bottom_space', __CLASS__ ) . 'px' );

        // description color
        $res_ctx->load_settings_raw( 'icon_box_description_color', $res_ctx->get_style_att( 'icon_box_description_color', __CLASS__ ) );

        // description hover color
        $res_ctx->load_settings_raw( 'icon_box_hover_description_color', $res_ctx->get_style_att( 'icon_box_hover_description_color', __CLASS__ ) );



        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_descr', __CLASS__ );

    }

    function render( $index_style = '' ) {
        if ( ! empty( $index_style ) ) {
            $this->index_style = $index_style;
        }

        $this->unique_style_class = td_global::td_generate_unique_id();

        $buffy = $this->get_style($this->get_css());

        $buffy .= '<div class="' . self::get_group_style( __CLASS__ ) . ' ' . self::get_class_style(__CLASS__) . ' ' . 'td-fix-index' . ' ' . $this->unique_style_class . '">';

            $buffy .= '<div class="tdm-title-icon-wrap">';
                // Icon
                $tds_icon = $this->get_shortcode_att('tds_icon');
                if ( empty( $tds_icon ) ) {
                    $tds_icon = td_util::get_option( 'tds_icon', 'tds_icon1');
                }
                $this->icon_style = new $tds_icon( $this->atts, $this->unique_block_class );
                $buffy .= $this->icon_style->render();

                // Title
                $tds_title = $this->get_shortcode_att('tds_title');
                if ( empty( $tds_title ) ) {
                    $tds_title = td_util::get_option( 'tds_title', 'tds_title1');
                }
                $tds_title_instance = new $tds_title( $this->atts, $this->unique_block_class );
                $buffy .= $tds_title_instance->render();
            $buffy .= '</div>';

            // Description
            $description = td_util::get_custom_field_value_from_string( rawurldecode( base64_decode( strip_tags( $this->get_shortcode_att('description') ) ) ) );
            $buffy .= '<p class="tdm-descr td-fix-index">' . $description . '</p>';

            //url on icon box
            $icon_box_url = td_util::get_custom_field_value_from_string( $this->get_style_att( 'icon_box_url' ) );
            if ( !empty( $icon_box_url ) ) {
                // with link
                $target_blank = '';

                /**
                 * Has Analytics tracking flag
                 */
                $has_analytics_events = false;

                /**
                 * Google Analytics tracking settings
                 */
                $data_ga_event_cat = '';
                $data_ga_event_action = '';
                $data_ga_event_label = '';

                // don't add tracking options in td composer
                if ( !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() ) {
                    $ga_event_category = $this->get_shortcode_att('ga_event_category');
                    if ( ! empty( $ga_event_category ) ) {
                        $data_ga_event_cat = ' data-ga-event-cat="' . $ga_event_category . '" ';
                        $has_analytics_events = true;
                    }

                    $ga_event_action = $this->get_shortcode_att('ga_event_action');
                    if ( ! empty( $ga_event_action ) ) {
                        $data_ga_event_action = ' data-ga-event-action="' . $ga_event_action . '" ';
                        $has_analytics_events = true;
                    }

                    $ga_event_label = $this->get_shortcode_att('ga_event_label');
                    if ( ! empty( $ga_event_label ) ) {
                        $data_ga_event_label = ' data-ga-event-label="' . $ga_event_label . '" ';
                        $has_analytics_events = true;
                    }
                }

                /**
                 * FB Pixel tracking settings
                 */
                $data_fb_event_name = '';
                $data_fb_event_cotent_name = '';

                // don't add tracking options in td composer
                if ( !tdc_state::is_live_editor_ajax() && !tdc_state::is_live_editor_iframe() ) {
                    $fb_event_name = $this->get_shortcode_att('fb_pixel_event_name');
                    if ( ! empty( $fb_event_name ) ) {
                        $data_fb_event_name = ' data-fb-event-name="' . $fb_event_name . '" ';
                        $has_analytics_events = true;
                    }
                    $fb_event_content_name = $this->get_shortcode_att('fb_pixel_event_content_name');
                    if ( ! empty( $fb_event_content_name ) ) {
                        $data_fb_event_cotent_name = ' data-fb-event-content-name="' . $fb_event_content_name . '" ';
                        $has_analytics_events = true;
                    }
                }

                $open_in_new_window = $this->get_style_att( 'open_in_new_window' );
                if  ( !empty( $open_in_new_window ) ) {
                    $target_blank = 'target="_blank"';
                }
                $buffy .= '<a href="' . $icon_box_url . '" aria-label="icon_box" class="icon_box_url_wrap" ' . $target_blank . $data_ga_event_cat . $data_ga_event_action . $data_ga_event_label . $data_fb_event_name . $data_fb_event_cotent_name . '> </a>';

                if( $has_analytics_events ) {
                    td_resources_load::render_script( TDC_SCRIPTS_URL . '/tdAnalytics.js' . TDC_SCRIPTS_VER, 'tdAnalytics-js', '', 'footer' );
                }
            }
            // Button
            $button_text = $this->get_shortcode_att('button_text');
            // hide button if no URL
            $hide_button_no_url = $this->get_shortcode_att( 'button_hide_no_url' );
            $button_url = td_util::get_custom_field_value_from_string($this->get_shortcode_att('button_url'));
            $button_url = td_util::get_cloud_tpl_var_value_from_string( $button_url );

            $button_hide = '';
            if ( $hide_button_no_url == 'yes' && $button_url == '') {
                $button_hide = 'hide';
            }

            if ( !empty( $button_text ) && $button_hide !== 'hide' ) {

                // Get button_style_id
                $tds_button = $this->get_shortcode_att('tds_button');
                if ( empty( $tds_button ) ) {
                    $tds_button = td_util::get_option( 'tds_button', 'tds_button1');
                }
                $tds_button_instance = new $tds_button( $this->atts );
                $buffy .= $tds_button_instance->render();
            }

        $buffy .= '</div>';

		return $buffy;
	}

    function get_style_att( $att_name ) {
        return $this->get_att( $att_name ,__CLASS__, $this->index_style );
    }

    function get_atts() {
        return $this->atts;
    }
}
