<?php
class td_block_ad_box extends td_block {

    private $atts = array();

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @ad_general_css */
				.$unique_block_class.td-a-rec {
					text-align: center;
				}
				.$unique_block_class.td-a-rec:not(.td-a-rec-no-translate) {
				    transform: translateZ(0);
				}
				.$unique_block_class .td-element-style {
					z-index: -1;
				}
            
                /* @spot_hide_placeholder */
                .$unique_block_class .td-spot-id-spot_img_hidden {
                    display: none;
                }
                .$unique_block_class .td-adspot-title {
                    display: block;
                }
                
                /* @spot_img_all_hide_on_tl */
                @media (min-width: 1019px) and (max-width: 1140px) {
                    .$unique_block_class .td_spot_img_all {
                        display: none;
                    }
                    .$unique_block_class .td-adspot-title {
                        display: block;
                    }
                }
                /* @spot_img_ph_hide_on_tl */
                @media (min-width: 1019px) and (max-width: 1140px) {
                    .$unique_block_class .td-spot-id-spot_img_hidden {
                        display: none;
                    }
                }
                
                /* @spot_img_all_hide_on_tp */
                @media (min-width: 768px) and (max-width: 1018px) {
                    .$unique_block_class .td_spot_img_all {
                        display: none;
                    }
                    .$unique_block_class .td-adspot-title {
                        display: block;
                    }
				}
                /* @spot_img_ph_hide_on_tp */
                @media (min-width: 768px) and (max-width: 1018px) {
                    .$unique_block_class .td-spot-id-spot_img_hidden {
                        display: none;
                    }
				}
				
                /* @spot_img_all_hide_on_mob */
                @media (max-width: 767px) {
                    .$unique_block_class .td_spot_img_all {
                        display: none;
                    }
                    .$unique_block_class .td-adspot-title {
                        display: block;
                    }
				}
                /* @spot_img_ph_hide_on_mob */
                @media (max-width: 767px) {
                    .$unique_block_class .td-spot-id-spot_img_hidden {
                        display: none;
                    }
				}
				
				
				/* @spot_img_all_hide */
                @media (min-width: 1141px) {
                    .$unique_block_class .td_spot_img_all {
                        display: none;
                    }
                }
				/* @spot_img_ph_show_on_all */
                @media (min-width: 1141px) {
                    .$unique_block_class .td-spot-id-spot_img_hidden {
                        display: block;
                    }
                }
                
				/* @spot_img_tl_hide */
                @media (min-width: 1019px) and (max-width: 1140px) {
                    .$unique_block_class .td_spot_img_all,
                    .$unique_block_class .td_spot_img_tl,
                    .$unique_block_class .td-adspot-title {
                        display: none;
                    }
                }
				/* @spot_img_ph_show_on_tl */
                @media (min-width: 1019px) and (max-width: 1140px) {
                    .$unique_block_class .td-spot-id-spot_img_hidden {
                        display: block;
                    }
                }
                
                /* @spot_img_tp_hide */
                @media (min-width: 768px) and (max-width: 1018px) {
                    .$unique_block_class .td_spot_img_all,
                    .$unique_block_class .td_spot_img_tp,
                    .$unique_block_class .td-adspot-title {
                        display: none;
                    }
				}
                /* @spot_img_ph_show_on_tp */
                @media (min-width: 768px) and (max-width: 1018px) {
                    .$unique_block_class .td-spot-id-spot_img_hidden {
                        display: block;
                    }
				}
				
                /* @spot_img_mob_hide */
                @media (max-width: 767px) {
                    .$unique_block_class .td_spot_img_all,
                    .$unique_block_class .td_spot_img_mob,
                    .$unique_block_class .td-adspot-title {
                        display: none;
                    }
				}
                /* @spot_img_ph_show_on_mob */
                @media (max-width: 767px) {
                    .$unique_block_class .td-spot-id-spot_img_hidden {
                        display: block;
                    }
				}
				
				/* @spot_img_width */
				.$unique_block_class.td-a-rec-img img {
				    max-width: @spot_img_width;
				    width: 100%;
				}
				
				/* @spot_img_horiz_left */
				.$unique_block_class.td-a-rec-img {
				    text-align: left;
				}
				@media (max-width: 767px) {
				    .$unique_block_class.td-a-rec-img {
				        text-align: center;
				    }
                }
				.$unique_block_class.td-a-rec-img img {
                    margin: 0 auto 0 0;
                }
				/* @spot_img_horiz_right */
				.$unique_block_class.td-a-rec-img {
				    text-align: right;
				}
				@media (max-width: 767px) {
				    .$unique_block_class.td-a-rec-img {
				        text-align: center;
				    }
                }
				.$unique_block_class.td-a-rec-img img {
                    margin: 0 0 0 auto;
                }
            

                /* @ad_title_color */
				.$unique_block_class .td-adspot-title {
					color: @ad_title_color;
				}
				


				/* @f_title */
				.$unique_block_class .td-adspot-title {
					@f_title
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        // auto hide all devices ad when another specific device ad exists
        if( $res_ctx->get_shortcode_att('spot_img_all') != '' ) {
            $res_ctx->load_settings_raw( 'spot_hide_placeholder', 1 );
        }
        if( $res_ctx->get_shortcode_att('spot_img_tl') != '' ) {
            $res_ctx->load_settings_raw( 'spot_img_all_hide_on_tl', 1 );

            if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) {
                $res_ctx->load_settings_raw( 'spot_img_ph_hide_on_tl', 1 );
            }
        }
        if( $res_ctx->get_shortcode_att('spot_img_tp') != '' ) {
            $res_ctx->load_settings_raw( 'spot_img_all_hide_on_tp', 1 );

            if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) {
                $res_ctx->load_settings_raw( 'spot_img_ph_hide_on_tp', 1 );
            }
        }
        if( $res_ctx->get_shortcode_att('spot_img_mob') != '' ) {
            $res_ctx->load_settings_raw( 'spot_img_all_hide_on_mob', 1 );

            if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) {
                $res_ctx->load_settings_raw( 'spot_img_ph_hide_on_mob', 1 );
            }
        }

        // hide img ad on desktop
        if( $res_ctx->get_shortcode_att('spot_img_all_hide') != '' ) {
            $res_ctx->load_settings_raw( 'spot_img_all_hide', 1 );

            if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) {
                $res_ctx->load_settings_raw( 'spot_img_ph_show_on_all', 1 );
            }
        }
        // hide img ad on tablet landscape
        if( $res_ctx->get_shortcode_att('spot_img_tl_hide') != '' ) {
            $res_ctx->load_settings_raw( 'spot_img_tl_hide', 1 );

            if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) {
                $res_ctx->load_settings_raw( 'spot_img_ph_show_on_tl', 1 );
            }
        }
        // hide img ad on tablet portrait
        if( $res_ctx->get_shortcode_att('spot_img_tp_hide') != '' ) {
            $res_ctx->load_settings_raw( 'spot_img_tp_hide', 1 );

            if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) {
                $res_ctx->load_settings_raw( 'spot_img_ph_show_on_tp', 1 );
            }
        }
        // hide img ad on mobile
        if( $res_ctx->get_shortcode_att('spot_img_mob_hide') != '' ) {
            $res_ctx->load_settings_raw( 'spot_img_mob_hide', 1 );

            if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) {
                $res_ctx->load_settings_raw( 'spot_img_ph_show_on_mob', 1 );
            }
        }

        // img ad width
        $spot_img_width = $res_ctx->get_shortcode_att('spot_img_width');
        $res_ctx->load_settings_raw( 'spot_img_width', $spot_img_width );
        if( $spot_img_width != '' && is_numeric( $spot_img_width ) ) {
            $res_ctx->load_settings_raw( 'spot_img_width', $spot_img_width . 'px' );
        }

        // img ad horizontal align
        $spot_img_horiz = $res_ctx->get_shortcode_att('spot_img_horiz');
        if( $spot_img_horiz == 'content-horiz-left' ) {
            $res_ctx->load_settings_raw( 'spot_img_horiz_left', 1 );
        } else if ( $spot_img_horiz == 'content-horiz-right' ) {
            $res_ctx->load_settings_raw( 'spot_img_horiz_right', 1 );
        }


        // ad title color
        $res_ctx->load_settings_raw( 'ad_title_color', $res_ctx->get_shortcode_att('ad_title_color') );


        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_title' );

        // general style
        $res_ctx->load_settings_raw( 'ad_general_css', 1 );

    }


    /**
     * Disable loop block features. This block does not use a loop and it dosn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }


    function render($atts, $content = null) {
        parent::render($atts);

        $this->atts = shortcode_atts(
            array(
                'spot_id' => '', //header / sidebar etc
                'spot_hide' => '',
                'spot_hide_plan_id' => '',
                'spot_img_all' => '',
                'spot_img_tl' => '',
                'spot_img_tp' => '',
                'spot_img_mob' => '',
                'spot_url' => '',
                'spot_url_rel' => '',
                'spot_url_window' => '',
                'spot_img_all_height_attribute' => '',
                'spot_img_all_width_attribute' => '',
                'spot_img_tp_height_attribute' => '',
                'spot_img_tp_width_attribute' => '',
                'spot_img_tl_height_attribute' => '',
                'spot_img_tl_width_attribute' => '',
                'spot_img_mob_height_attribute' => '',
                'spot_img_mob_width_attribute' => '',
                'spot_img_alt_attribute' => '',
                'spot_img_all_hide' => '',
                'spot_img_tl_hide' => '',
                'spot_img_tp_hide' => '',
                'spot_img_mob_hide' => '',
                'spot_img_width' => '',
                'spot_img_horiz' => '',
                'spot_code' => '',
                'align' => '', //align left or right in inline content,
                'spot_title' => '',
                'custom_title' => '',
                'el_class' => '',
            ), $atts);

        $spot_id           = $this->atts['spot_id'];
        $spot_hide         = $this->atts['spot_hide'];
        $spot_hide_plan_id = $this->atts['spot_hide_plan_id'];
        $spot_code         = rawurldecode( base64_decode( strip_tags( $this->atts['spot_code'] ) ) );
        $custom_title      = $this->atts['custom_title'];
        $spot_title        = $this->atts['spot_title'];

        // currently logged in user
        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;
        $is_current_user_admin = current_user_can('administrator') || current_user_can('editor');

        // hide spot for admins/editors
        $spot_hide_for_admins_bool = false;
        $spot_hide_for_subscribed_bool = false;

        if( defined( 'TD_SUBSCRIPTION' ) && method_exists( 'tds_util', 'is_user_subscribed_to_plan' ) && $spot_hide_plan_id != '' ) {
            $spot_hide_plan_id = explode(',', $spot_hide_plan_id);

            foreach ( $spot_hide_plan_id as $plan_id ) {
                if( tds_util::is_user_subscribed_to_plan( $current_user_id, $plan_id ) ) {
                    $spot_hide_for_subscribed_bool = true;
                    break;
                }
            }
        }
        
        if( !$spot_hide_for_subscribed_bool && $is_current_user_admin && $spot_hide != '' ) {
            $spot_hide_for_admins_bool = true;
        }

        // rec title
        $rec_title = '';
        if(!empty($custom_title)) {
            $rec_title .= '<div class="td-block-title-wrap">';
            $rec_title .= $this->get_block_title();
            $rec_title .= $this->get_pull_down_filter();
            $rec_title .= '</div>';
        }

        if(!empty($spot_title)) {

            //we need to decode the square bracket case
            if ( strpos( $spot_title, 'td_encval' ) === 0 ) {
                $spot_title = str_replace('td_encval', '', $spot_title);
                $spot_title = base64_decode( $spot_title );
            }

            $rec_title .= '<span class="td-adspot-title">' . $spot_title . '</span>';
        }


        // custom ad images array
        $spot_imgs = array();
        $spot_img_all = $this->atts['spot_img_all'];
        $spot_img_tl = $this->atts['spot_img_tl'];
        $spot_img_tp = $this->atts['spot_img_tp'];
        $spot_img_mob = $this->atts['spot_img_mob'];

        if( $spot_img_all != '' ) {
            $spot_imgs['spot_img_all'] = $spot_img_all;
        }
        if( $spot_img_tl != '' ) {
            $spot_imgs['spot_img_tl'] = $spot_img_tl;
        }
        if( $spot_img_tp != '' ) {
            $spot_imgs['spot_img_tp'] = $spot_img_tp;
        }
        if( $spot_img_mob != '' ) {
            $spot_imgs['spot_img_mob'] = $spot_img_mob;
        }

        // custom ad images url
        $spot_url = $this->atts['spot_url'];

        // custom ad images url open in new window
        $spot_url_new_window = '';
        if( $this->atts['spot_url_window'] != '' ) {
            $spot_url_new_window = ' target="blank" ';
        }
        // custom ad images url rel
        $spot_url_rel = '';
        if( $this->atts['spot_url_rel'] != '' ) {
            $spot_url_rel = ' rel="' . $this->atts['spot_url_rel'] . '" ';
        }

        // custom ad images <img> alt attribute
	    $spot_img_alt_attribute = ' alt="spot_img"';
        if( $this->atts['spot_img_alt_attribute'] != '' ) {
	        $spot_img_alt_attribute = ' alt="' . esc_attr( $this->atts['spot_img_alt_attribute'] ) . '" ';
        }


        // For tagDiv composer add a placeholder element
        if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax()) {
            if( empty($spot_imgs) ) {
                $ad_array = td_util::get_td_ads($spot_id);

                // return if the ad for a specific spot id is empty
                if ( $spot_id === 'footer_top' && empty($ad_array[$spot_id]['ad_code']) ) {
                    return;
                }

                // 'td_block_wrap' is to identify a tagDiv composer element at binding
                // 'tdc-placeholder-title' is to style de placeholder
                // block_uid is necessary to have a unique html template returned to the composer (without it the html change event doesn't trigger, and because of this the loader image is still preset)

                if( $spot_code != '' ) {
                    $spot_id_class = 'custom_ad_code';
                } else {
                    $spot_id_class = $spot_id;
                }

                return $this->get_placeholder_block($spot_id_class, $rec_title);
            }
        }

        if( empty($spot_imgs) ) {
            if( $spot_code == '' ) {
                if (empty($spot_id)) {
                    return;
                }

                $ad_array = td_util::get_td_ads($spot_id);

                // return if the ad for a specific spot id is empty
                if (empty($ad_array[$spot_id]['ad_code'])) {
                    return;
                }
            }
        }


        $buffy = '';

        if( $spot_hide_for_subscribed_bool && !( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) ) {
            return $buffy;
        }

        if( !empty($spot_imgs)  ) {
            $buffy .= '<div class="' . $this->get_wrapper_class() . ' td-a-rec td-a-rec-id-custom-spot td-a-rec-img ' . $this->get_ad_css_class($atts) . '">';
            //get the block css
            $buffy .= $this->get_block_css();

                $buffy .= '<div style="display: inline-block">';
                    if( $spot_hide_for_admins_bool ) {
                        return $this->get_placeholder_block('custom_ad_img', $rec_title);
                    }

                    $buffy .= $rec_title;

                    if ( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
                        $buffy .= '<div class="td-spot-id-spot_img_hidden"><div class="tdc-placeholder-title"></div></div>';
                    }

                    foreach ($spot_imgs as $key => $spot_img) {

                        // <img> width attribute
                        $width_attribute = '';
                        if( $this->atts[$key . '_width_attribute'] != '' ) {
                            $width_attribute = ' width="' . esc_attr($this->atts[$key . '_width_attribute']) . '" ';
                        }

                        // <img> height attribute
                        $height_attribute = '';
                        if( $this->atts[$key . '_height_attribute'] != '' ) {
                            $height_attribute = ' height="' . esc_attr($this->atts[$key . '_height_attribute']) . '" ';
                        }

                        $buffy .= '<a href="' . $spot_url . '"' . $spot_url_new_window . $spot_url_rel .  ' class="td_' . $key . '">';
                            $buffy .= '<img src="' . wp_get_attachment_url($spot_img) . '" ' . $spot_img_alt_attribute . $width_attribute . $height_attribute .  ' />';
                        $buffy .= '</a>';
                    }
                $buffy .= '</div>';
            $buffy .= '</div>';
        } else if( $spot_code != '' ) {
            if( $spot_hide_for_admins_bool ) {
                return $this->get_placeholder_block('custom_ad_code', $rec_title);
            }

            $buffy .= '<div class="td-block td-a-rec td-a-rec-id-custom-spot ' . $this->get_ad_css_class( $atts ) . '">';
                //get the block css
                $buffy .= $this->get_block_css();

                $buffy .= $rec_title;

                $buffy .= do_shortcode( stripslashes( $spot_code ) );
            $buffy .= '</div>';
        } else if (!empty($ad_array[$spot_id]['current_ad_type'])) {
            if( $spot_hide_for_admins_bool || ( !empty( $ad_array[$spot_id]['disable_for_admins'] ) && $ad_array[$spot_id]['disable_for_admins'] == 'yes' && $is_current_user_admin ) ) {
                return $this->get_placeholder_block($spot_id, $rec_title);
            }

            switch ($ad_array[$spot_id]['current_ad_type']) {

                case 'other':
                    //render the normal ads
                    $buffy .= $this->render_ads($ad_array[$spot_id], $atts);
                    break;

                case 'google':
                    //render the magic google ads :)
                    $buffy .= $this->render_google_ads($ad_array[$spot_id], $atts);
                    break;
            }
        }


        //print_r($ad_array);

        return $buffy;
    }




    /**
     * This function renders and returns a google ad.
     * @param $ad_array - uses an ad array of the form:
    - current_ad_type - google or other
    - ad_code - the full ad code as entered by the user
    - disable_m - disable on monitor
    - disable_tp - disable on tablet p
    - disable_p - disable on phones
    - g_data_ad_client - the google ad client id (ca-pub-etc)
    - g_data_ad_slot - the google ad slot id
     * 'm_w' => '',  // big monitor - width
    'm_h' => '',  // big monitor - height
    'tp_w' => '', // tablet_portrait width
    'tp_h' => '', // tablet_portrait height
    'p_w' => '',  // phone width
    'p_h' => ''   // phone height
     * @param $atts array of atts
     * @return string HTML the full rendered ad
     */
    // tagDiv google responsive renderer
    // copyright 2014 tagDiv
    function render_google_ads($ad_array, $atts) {


        $this->atts = shortcode_atts(
            array(
                'spot_id' => '', //header / sidebar etc
                'align' => '', //align left or right in inline content
                'spot_title' => '',
                'custom_title' => '',
                'el_class' => '',
            ), $atts);

        $spot_id        = $this->atts['spot_id'];
        $align          = $this->atts['align'];
        $custom_title   = $this->atts['custom_title'];
        $spot_title     = $this->atts['spot_title'];
        $el_class       = $this->atts['el_class'];

        // rec title
        $rec_title = '';
        if(!empty($custom_title)) {
            $rec_title .= '<div class="td-block-title-wrap">';
            $rec_title .= $this->get_block_title();
            $rec_title .= $this->get_pull_down_filter();
            $rec_title .= '</div>';
        }
        if(!empty($spot_title)) {
            $rec_title .= '<span class="td-adspot-title">' . $spot_title . '</span>';
        }


        //echo ($p_w);

        //print_r($ad_array);

        $default_ad_sizes = array (
            'header' => array (
                'm_w' => '728',  // big monitor - width
                'm_h' => '90',  // big monitor - height

                'tl_w' => '468', // tablet_landscape width
                'tl_h' => '60', // tablet_landscape height

                'tp_w' => '468', // tablet_portrait width
                'tp_h' => '60', // tablet_portrait height

                'p_w' => '320',  // phone width
                'p_h' => '50'   // phone height
            ),
            'sidebar' => array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '200', // tablet_portrait width
                'tp_h' => '200', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),


            'content_inline' => array (
                'm_w' => '468',  // big monitor - width
                'm_h' => '60',  // big monitor - height

                'tl_w' => '468', // tablet_landscape width
                'tl_h' => '60', // tablet_landscape height

                'tp_w' => '468', // tablet_portrait width
                'tp_h' => '60', // tablet_portrait height

                'p_w' => '320',  // phone width
                'p_h' => '50'   // phone height
            ),

            'content_top' => array (
                'm_w' => '468',  // big monitor - width
                'm_h' => '60',  // big monitor - height

                'tl_w' => '468', // tablet_landscape width
                'tl_h' => '60', // tablet_landscape height

                'tp_w' => '468', // tablet_portrait width
                'tp_h' => '60', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'content_bottom' => array (
                'm_w' => '468',  // big monitor - width
                'm_h' => '60',  // big monitor - height

                'tl_w' => '468', // tablet_landscape width
                'tl_h' => '60', // tablet_landscape height

                'tp_w' => '468', // tablet_portrait width
                'tp_h' => '60', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'post_style_1' => array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '200', // tablet_portrait width
                'tp_h' => '200', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'post_style_11' => array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '320', // tablet_portrait width
                'tp_h' => '50', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'post_style_12' => array (
                'm_w' => '728',  // big monitor - width
                'm_h' => '90',  // big monitor - height

                'tl_w' => '728', // tablet_landscape width
                'tl_h' => '90', // tablet_landscape height

                'tp_w' => '728', // tablet_portrait width
                'tp_h' => '90', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'smart_list_6' => array (
                'm_w' => '468',  // big monitor - width
                'm_h' => '60',  // big monitor - height

                'tl_w' => '468', // tablet_landscape width
                'tl_h' => '60', // tablet_landscape height

                'tp_w' => '300', // tablet_portrait width
                'tp_h' => '250', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'smart_list_7' => array (
                'm_w' => '468',  // big monitor - width
                'm_h' => '60',  // big monitor - height

                'tl_w' => '468', // tablet_landscape width
                'tl_h' => '60', // tablet_landscape height

                'tp_w' => '300', // tablet_portrait width
                'tp_h' => '250', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'smart_list_8' => array (
                'm_w' => '468',  // big monitor - width
                'm_h' => '60',  // big monitor - height

                'tl_w' => '468', // tablet_landscape width
                'tl_h' => '60', // tablet_landscape height

                'tp_w' => '300', // tablet_portrait width
                'tp_h' => '250', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'footer_top' => array (
                'm_w' => '728',  // big monitor - width
                'm_h' => '90',  // big monitor - height

                'tl_w' => '728', // tablet_landscape width
                'tl_h' => '90', // tablet_landscape height

                'tp_w' => '728', // tablet_portrait width
                'tp_h' => '90', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'custom_ad_1' => array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '200', // tablet_portrait width
                'tp_h' => '200', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'custom_ad_2' => array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '200', // tablet_portrait width
                'tp_h' => '200', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'custom_ad_3' => array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '200', // tablet_portrait width
                'tp_h' => '200', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'custom_ad_4' => array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '200', // tablet_portrait width
                'tp_h' => '200', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            ),

            'custom_ad_5' => array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '200', // tablet_portrait width
                'tp_h' => '200', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            )
        );


        if ($align == 'left') {
            $default_ad_sizes['content_inline'] = array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '200', // tablet_portrait width
                'tp_h' => '200', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            );
        }
        elseif ($align == 'right') {
            $default_ad_sizes['content_inline'] = array (
                'm_w' => '300',  // big monitor - width
                'm_h' => '250',  // big monitor - height

                'tl_w' => '300', // tablet_landscape width
                'tl_h' => '250', // tablet_landscape height

                'tp_w' => '200', // tablet_portrait width
                'tp_h' => '200', // tablet_portrait height

                'p_w' => '300',  // phone width
                'p_h' => '250'   // phone height
            );
        }







        //overwrite the default values if we have some

        //monitor big ad
        if (!empty($ad_array['m_size'])) {
            $ad_size_parts = explode(' x ', $ad_array['m_size']);
            $default_ad_sizes[$spot_id]['m_w'] = $ad_size_parts[0];
            $default_ad_sizes[$spot_id]['m_h'] = $ad_size_parts[1];
        }


        //tablet landscape
        if (!empty($ad_array['tl_size'])) {
            $ad_size_parts = explode(' x ', $ad_array['tl_size']);
            $default_ad_sizes[$spot_id]['tl_w'] = $ad_size_parts[0];
            $default_ad_sizes[$spot_id]['tl_h'] = $ad_size_parts[1];
        }


        //tablet portrait
        if (!empty($ad_array['tp_size'])) {
            $ad_size_parts = explode(' x ', $ad_array['tp_size']);
            $default_ad_sizes[$spot_id]['tp_w'] = $ad_size_parts[0];
            $default_ad_sizes[$spot_id]['tp_h'] = $ad_size_parts[1];
        }


        //phone
        if (!empty($ad_array['p_size'])) {
            $ad_size_parts = explode(' x ', $ad_array['p_size']);
            $default_ad_sizes[$spot_id]['p_w'] = $ad_size_parts[0];
            $default_ad_sizes[$spot_id]['p_h'] = $ad_size_parts[1];
        }





        //init the disable variables
        if (!empty($ad_array['disable_m']) and $ad_array['disable_m'] == 'yes') {
            $default_ad_sizes[$spot_id]['disable_m'] = true;
        } else {
            $default_ad_sizes[$spot_id]['disable_m'] = false;
        }

        if (!empty($ad_array['disable_tl']) and $ad_array['disable_tl'] == 'yes') {
            $default_ad_sizes[$spot_id]['disable_tl'] = true;
        } else {
            $default_ad_sizes[$spot_id]['disable_tl'] = false;
        }

        if (!empty($ad_array['disable_tp']) and $ad_array['disable_tp'] == 'yes') {
            $default_ad_sizes[$spot_id]['disable_tp'] = true;
        } else {
            $default_ad_sizes[$spot_id]['disable_tp'] = false;
        }

        if (!empty($ad_array['disable_p']) and $ad_array['disable_p'] == 'yes') {
            $default_ad_sizes[$spot_id]['disable_p'] = true;
        } else {
            $default_ad_sizes[$spot_id]['disable_p'] = false;
        }




        $buffy = "\n <!-- A generated by theme --> \n\n";

        //google async script
        $buffy .= '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>';




        $buffy .= '<div class="td-g-rec td-g-rec-id-' . $spot_id . $align . ' ' . $this->get_ad_css_class($atts) . ' ' . $el_class . '">' . "\n";

        //get the block js
        $buffy .= $this->get_block_css();

        $buffy .= '<script type="text/javascript">' . "\n";


        //fix for adsense custom ad size settings not loading right when having the speedbooster active
        $buffy .= 'var td_screen_width = window.innerWidth;' . "\n";



        if ($default_ad_sizes[$spot_id]['disable_m'] == false and !empty($default_ad_sizes[$spot_id]['m_w']) and !empty($default_ad_sizes[$spot_id]['m_h'])) {
            $buffy .= 'window.addEventListener("load", function(){            
	            var placeAdEl = document.getElementById("td-ad-placeholder");
			    if ( null !== placeAdEl && td_screen_width >= 1140 ) {
			        
			        /* large monitors */
			        var adEl = document.createElement("ins");
		            placeAdEl.replaceWith(adEl);	
		            adEl.setAttribute("class", "adsbygoogle");
		            adEl.setAttribute("style", "display:inline-block;width:' . $default_ad_sizes[$spot_id]['m_w'] . 'px;height:' . $default_ad_sizes[$spot_id]['m_h'] . 'px");	            		                
		            adEl.setAttribute("data-ad-client", "' .  $ad_array['g_data_ad_client'] . '");
		            adEl.setAttribute("data-ad-slot", "' .  $ad_array['g_data_ad_slot'] . '");	            
			        (adsbygoogle = window.adsbygoogle || []).push({});
			    }
			});';
        }


        if ($default_ad_sizes[$spot_id]['disable_tl'] == false and !empty($default_ad_sizes[$spot_id]['tl_w']) and !empty($default_ad_sizes[$spot_id]['tl_h'])) {
	        $buffy .= 'window.addEventListener("load", function(){            
	            var placeAdEl = document.getElementById("td-ad-placeholder");
			    if ( null !== placeAdEl && td_screen_width >= 1019  && td_screen_width < 1140 ) {
			    
			        /* landscape tablets */
			        var adEl = document.createElement("ins");
		            placeAdEl.replaceWith(adEl);	
		            adEl.setAttribute("class", "adsbygoogle");
		            adEl.setAttribute("style", "display:inline-block;width:' . $default_ad_sizes[$spot_id]['tl_w'] . 'px;height:' . $default_ad_sizes[$spot_id]['tl_h'] . 'px");	            		                
		            adEl.setAttribute("data-ad-client", "' .  $ad_array['g_data_ad_client'] . '");
		            adEl.setAttribute("data-ad-slot", "' .  $ad_array['g_data_ad_slot'] . '");	            
			        (adsbygoogle = window.adsbygoogle || []).push({});
			    }
			});';
        }


        if ($default_ad_sizes[$spot_id]['disable_tp'] == false and !empty($default_ad_sizes[$spot_id]['tp_w']) and !empty($default_ad_sizes[$spot_id]['tp_h'])) {
	        $buffy .= 'window.addEventListener("load", function(){            
	            var placeAdEl = document.getElementById("td-ad-placeholder");
			    if ( null !== placeAdEl && td_screen_width >= 768  && td_screen_width < 1019 ) {
			    
			        /* portrait tablets */
			        var adEl = document.createElement("ins");
		            placeAdEl.replaceWith(adEl);	
		            adEl.setAttribute("class", "adsbygoogle");
		            adEl.setAttribute("style", "display:inline-block;width:' . $default_ad_sizes[$spot_id]['tp_w'] . 'px;height:' . $default_ad_sizes[$spot_id]['tp_h'] . 'px");	            		                
		            adEl.setAttribute("data-ad-client", "' .  $ad_array['g_data_ad_client'] . '");
		            adEl.setAttribute("data-ad-slot", "' .  $ad_array['g_data_ad_slot'] . '");	            
			        (adsbygoogle = window.adsbygoogle || []).push({});
			    }
			});';
        }

        if ($default_ad_sizes[$spot_id]['disable_p'] == false and !empty($default_ad_sizes[$spot_id]['p_w']) and !empty($default_ad_sizes[$spot_id]['p_h'])) {
	        $buffy .= 'window.addEventListener("load", function(){            
	            var placeAdEl = document.getElementById("td-ad-placeholder");
			    if ( null !== placeAdEl && td_screen_width < 768 ) {
			    
			        /* Phones */
			        var adEl = document.createElement("ins");
		            placeAdEl.replaceWith(adEl);	
		            adEl.setAttribute("class", "adsbygoogle");
		            adEl.setAttribute("style", "display:inline-block;width:' . $default_ad_sizes[$spot_id]['p_w'] . 'px;height:' . $default_ad_sizes[$spot_id]['p_h'] . 'px");	            		                
		            adEl.setAttribute("data-ad-client", "' .  $ad_array['g_data_ad_client'] . '");
		            adEl.setAttribute("data-ad-slot", "' .  $ad_array['g_data_ad_slot'] . '");	            
			        (adsbygoogle = window.adsbygoogle || []).push({});
			    }
			});';
        }

        $buffy .= '</script>' . "\n";

        $buffy .= $rec_title;
        $buffy .= '<noscript id="td-ad-placeholder"></noscript>';

        $buffy .= '</div>' . "\n";
        $buffy .= "\n <!-- end A --> \n\n";
        return $buffy;
    }



    /**
     * This function renders and returns a normal ad.
     * @param $ad_array - uses an ad array of the form:
    - current_ad_type - google or other
    - ad_code - the full ad code as entered by the user
    - disable_m - disable on monitor
    - disable_tp - disable on tablet p
    - disable_p - disable on phones
    - g_data_ad_client - the google ad client id (ca-pub-etc)
    - g_data_ad_slot - the google ad slot id
     *
     * @return string HTML the full rendered ad
     */
    function render_ads($ad_array, $atts) {

        $this->atts = shortcode_atts(
            array(
                'spot_id' => '', //header / sidebar etc
                'align' => '', //align left or right in inline content
                'spot_title' => '',
                'custom_title' => '',
                'el_class' => '',
            ), $atts);

        $spot_id        = $this->atts['spot_id'];
        $align          = $this->atts['align'];
        $custom_title   = $this->atts['custom_title'];
        $spot_title     = $this->atts['spot_title'];
        $el_class       = $this->atts['el_class'];

        // rec title
        $rec_title = '';
        if(!empty($custom_title)) {
            $rec_title .= '<div class="td-block-title-wrap">';
            $rec_title .= $this->get_block_title();
            $rec_title .= $this->get_pull_down_filter();
            $rec_title .= '</div>';
        }
        if(!empty($spot_title)) {
            $rec_title .= '<span class="td-adspot-title">' . $spot_title . '</span>';
        }


        $buffy = '';

        $buffy .= '<div class="td-a-rec td-a-rec-id-' . $spot_id . $align . ' '
            . ((!empty($ad_array['disable_m'])) ? ' td-rec-hide-on-m' : '')
            . ((!empty($ad_array['disable_tl'])) ? ' td-rec-hide-on-tl' : '')
            . ((!empty($ad_array['disable_tp'])) ? ' td-rec-hide-on-tp' : '')
            . ((!empty($ad_array['disable_p'])) ? ' td-rec-hide-on-p' : '')
            . ' ' . $this->get_ad_css_class( $atts ) . '">';

        //get the block css
        $buffy .= $this->get_block_css();

        $buffy .= $rec_title;

        $buffy .= do_shortcode(stripslashes($ad_array['ad_code']));
        $buffy .= '</div>';


        //print_r($ad_array);
        return $buffy;
    }





    /**
     * Custom function to get the classes for the ad_box. We can't use the main one due to adblock detecting our standard classes as ads
     * parse the css att and get the vc_custom class
     * @param $atts
     *
     * @return string
     */
    private function get_ad_css_class($atts) {

        $block_classes  = array();




        // get the design tab css classes
        if (!empty($atts['css'])) {
            $css_classes_array = $this->parse_css_att($atts['css']);
            if ( $css_classes_array !== false ) {
                $block_classes = $css_classes_array;
            }
        }



        // get the custom el_class
        if (!empty($atts['el_class'])) {
            $el_class_array = explode(' ', $atts['el_class']);
            $block_classes = array_merge (
                $block_classes,
                $el_class_array
            );
        }

        $block_classes[] = $this->block_uid;

        $block_template_id = $this->get_att('block_template_id');

        if (empty($block_template_id)) {
            $block_classes[] = td_options::get('tds_global_block_template', 'td_block_template_1');
        } else {
            $block_classes[] = $block_template_id;
        }


        //remove duplicates
        $block_classes = array_unique($block_classes);



        return implode(' ', $block_classes);
    }


    function get_placeholder_block($spot_id_class, $rec_title) {
        $block_template_id = $this->get_att('block_template_id');

        if (empty($block_template_id)) {
            $block_template_id = td_options::get('tds_global_block_template', 'td_block_template_1');
        }

        $ad_classes = $block_template_id . ' td-spot-id-' . $spot_id_class . ' ' . $this->block_uid . ' '. $this->get_wrapper_class();

        return  '<div class="' . $ad_classes . '">' . $this->get_block_css() . $rec_title . '<div class="tdc-placeholder-title"></div></div>';
    }

}
