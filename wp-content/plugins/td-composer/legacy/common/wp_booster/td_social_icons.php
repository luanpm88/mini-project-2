<?php

class td_social_icons {
    static $td_social_icons_array = array(
        'behance' => 'Behance',
        'blogger' => 'Blogger',
        'clouthub' => 'CloutHub',
        'dailymotion' => 'Dailymotion',
        'delicious' => 'Delicious',
        'deviantart' => 'Deviantart',
        'digg' => 'Digg',
        'discord' => 'Discord',
        'dribbble' => 'Dribbble',
        'ebay' => 'Ebay',
        'evernote' => 'Evernote',
        'facebook' => 'Facebook',
        'flickr' => 'Flickr',
        'flipboard' => 'Flipboard',
        'forrst' => 'Forrst',
        'gab' => 'Gab',
        'gettr' => 'GETTR',
        'github' => 'GitHub',
        'grooveshark' => 'Grooveshark',
        'instagram' => 'Instagram',
        'kakao' => 'Kakao',
        'koo' => 'Koo',
        'lastfm' => 'Lastfm',
        'linkedin' => 'Linkedin',
        'mail-1' => 'Mail',
        'medium' => 'Medium',
        'stumbleupon' => 'Mix',
        'myspace' => 'Myspace',
        'naver' => 'Naver',
        'parler' => 'Parler',
        'path' => 'Path',
        'patreon' => 'Patreon',
        'paypal' => 'Paypal',
        'pinterest' => 'Pinterest',
        'reddit' => 'Reddit',
        'rumble' => 'Rumble',
        'rss' => 'RSS',
        'share' => 'Share',
        'skype' => 'Skype',
        'soundcloud' => 'Soundcloud',
        'spotify' => 'Spotify',
        'stackoverflow' => 'Stackoverflow',
        'steam' => 'Steam',
        'strava' => 'Strava',
        'telegram' => 'Telegram',
        'tiktok' => 'TikTok',
        'tumblr' => 'Tumblr',
        'twitch' => 'Twitch',
        'twitter' => 'Twitter',
        'vimeo' => 'Vimeo',
        'vk' => 'VKontakte',
        'website' => 'Website',
        'whatsapp' => 'WhatsApp',
        'windows' => 'Windows',
        'wordpress' => 'WordPress',
        'yahoo' => 'Yahoo',
        'yandex' => 'Yandex',
        'youtube' => 'Youtube',
        'xing' => 'Xing'
    );




    static function get_icon($url, $icon_id, $open_in_new_window = false, $show_icon_id = false) {
        if ($open_in_new_window !== false) {
            $td_a_target = ' target="_blank"';
        } else {
            $td_a_target = '';
        }

		// append mailto: the email only if we have an @ and we don't have the mailto: already in place
	    if (
		    $icon_id == 'mail-1'
		    and strpos($url, '@') !== false
		        and strpos(strtolower($url), 'mailto:') === false
	    ) {
		    $url = 'mailto:' . $url;
	    }

        $td_social_rel = td_util::get_option('tds_rel_type');
        if (!empty($td_social_rel)) {
            $td_social_rel = ' rel="' . $td_social_rel . '"';
        }

        //if the $show_icon_id parameter is set to true also add the social network name
        if($show_icon_id === true){
            return '
            <span class="td-social-icon-wrap">
                <a' . $td_a_target . $td_social_rel .  ' href="' . $url . '" title="' . self::$td_social_icons_array[$icon_id] . '">
                    <i class="td-icon-font td-icon-' . $icon_id . '"></i>
                    <span class="td-social-name">' . self::$td_social_icons_array[$icon_id] . '</span>
                </a>
            </span>';
        }

        return '
        <span class="td-social-icon-wrap">
            <a' . $td_a_target . $td_social_rel . ' href="' . $url . '" title="' . self::$td_social_icons_array[$icon_id] . '">
                <i class="td-icon-font td-icon-' . $icon_id . '"></i>
                <span style="display: none">' . self::$td_social_icons_array[$icon_id] . '</span>
            </a>
        </span>';
    }

}
