<?php
//get current logd in user data
global $current_user;
//check if admin allow registration
$users_can_register = get_option('users_can_register');
//if admin permits registration
$users_can_register_tab = '';
if ($users_can_register == 1) {
    //add the Register tab to the modal window if `Anyone can register` chec
    $users_can_register_tab = ' <span></span><a id="register-link-mob">' . __td('Join', TD_THEME_NAME) . '</a>';
}
echo '
    <div class="td-guest-wrap">
        <div class="td-menu-login"><a id="login-link-mob">' . __td('Sign in', TD_THEME_NAME) . '</a>' . $users_can_register_tab . '</div>
    </div>
';

td_resources_load::render_script( TDC_SCRIPTS_URL . '/tdLoginMobile.js' . TDC_SCRIPTS_VER, 'tdLoginMobile-js', '', 'footer' );