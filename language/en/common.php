<?php

/**
 *
 * @package phpBB Extension - Acme Demo
 * @copyright (c) 2013 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
if (!defined('IN_PHPBB')) {
    exit;
}

if (empty($lang) || !is_array($lang)) {
    $lang = array();
}

$lang = array_merge($lang, array(
    'ACP_BIZBINK_ADVERTS_TITLE' => 'Ads  Module',
    'ACP_BIZBINK_ADVERTS' => 'Settings',
    'ACP_BIZBINK_ADVERTS_ADVERT_TYPE' => 'Advert type:',
    'ACP_BIZBINK_ADVERTS_ADVERT_DISPLAY' => 'Display:',
    'ACP_BIZBINK_ADVERTS_ADVERT_GUEST_ONLY' => 'Guest-Only:',
    'ACP_BIZBINK_ADVERTS_ADVERT_ADSENSE_CLIENT' => 'Adsense Client ID:',
    'ACP_BIZBINK_ADVERTS_ADVERT_ADSENSE_SLOT' => 'Adsense Slot ID:',
    'ACP_BIZBINK_ADVERTS_ADVERT_IMAGE_LINK' => 'Image link:',
    'ACP_BIZBINK_ADVERTS_ADVERT_IMAGE_TITLE' => 'Image title:',
    'ACP_BIZBINK_ADVERTS_ADVERT_IMAGE_LOCATION' => 'Image location:',
    'ACP_BIZBINK_ADVERTS_ADVERT_IMAGE_ALT' => 'Image alternative:',
    'ACP_BIZBINK_ADVERTS_ADVERT_IMAGE_WIDTH' => 'Image width:',
    'ACP_BIZBINK_ADVERTS_ADVERT_IMAGE_HEIGHT' => 'Image height:',
    'ACP_BIZBINK_ADVERTS_CUSTOM_CSS' => 'Custom CSS:',
    'ACP_BIZBINK_ADVERTS_SETTING_SAVED' => 'Settings have been saved successfully!',
        ));
