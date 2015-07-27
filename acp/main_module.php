<?php

/*
 * phpBB Extension - Adverts
 * Copyright (C) 2015 Matthew Vanderende <matthew@vanderende.ca>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace bizbink\adverts\acp;

class main_module {

    var $u_action;

    function main($id, $mode) {
        global $db, $user, $auth, $template, $cache, $request;
        global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

        $user->add_lang('acp/common');
        $this->tpl_name = 'adverts_body';
        $this->page_title = $user->lang('ACP_BIZBINK_ADVERTS_TITLE');
        add_form_key('bizbink/adverts');

        if ($request->is_set_post('submit')) {
            if (!check_form_key('bizbink/adverts')) {
                trigger_error('FORM_INVALID');
            }

            // HEADER ADVERT
            $config->set('bizbink_adverts_header_advert_type', $request->variable('bizbink_adverts_header_advert_type', ''));
            $config->set('bizbink_adverts_header_advert_display', $request->variable('bizbink_adverts_header_advert_display', ''));
            $config->set('bizbink_adverts_header_advert_guest_only', $request->variable('bizbink_adverts_header_advert_guest_only', ''));
            $config->set('bizbink_adverts_header_advert_adsense_client', $request->variable('bizbink_adverts_header_advert_adsense_client', ''));
            $config->set('bizbink_adverts_header_advert_adsense_slot', $request->variable('bizbink_adverts_header_advert_adsense_slot', ''));
            $config->set('bizbink_adverts_header_advert_image_link', $request->variable('bizbink_adverts_header_advert_image_link', ''));
            $config->set('bizbink_adverts_header_advert_image_location', $request->variable('bizbink_adverts_header_advert_image_location', ''));
            $config->set('bizbink_adverts_header_advert_image_title', $request->variable('bizbink_adverts_header_advert_image_title', ''));
            $config->set('bizbink_adverts_header_advert_image_alt', $request->variable('bizbink_adverts_header_advert_image_alt', ''));
            $config->set('bizbink_adverts_header_advert_image_width', $request->variable('bizbink_adverts_header_advert_image_width', ''));
            $config->set('bizbink_adverts_header_advert_image_height', $request->variable('bizbink_adverts_header_advert_image_height', ''));

            // FORUMLIST ADVERT
            $config->set('bizbink_adverts_forumlist_advert_type', $request->variable('bizbink_adverts_forumlist_advert_type', ''));
            $config->set('bizbink_adverts_forumlist_advert_display', $request->variable('bizbink_adverts_forumlist_advert_display', ''));
            $config->set('bizbink_adverts_forumlist_advert_guest_only', $request->variable('bizbink_adverts_forumlist_advert_guest_only', ''));
            $config->set('bizbink_adverts_forumlist_advert_adsense_client', $request->variable('bizbink_adverts_forumlist_advert_adsense_client', ''));
            $config->set('bizbink_adverts_forumlist_advert_adsense_slot', $request->variable('bizbink_adverts_forumlist_advert_adsense_slot', ''));
            $config->set('bizbink_adverts_forumlist_advert_image_link', $request->variable('bizbink_adverts_forumlist_advert_image_link', ''));
            $config->set('bizbink_adverts_forumlist_advert_image_location', $request->variable('bizbink_adverts_forumlist_advert_image_location', ''));
            $config->set('bizbink_adverts_forumlist_advert_image_title', $request->variable('bizbink_adverts_forumlist_advert_image_title', ''));
            $config->set('bizbink_adverts_forumlist_advert_image_alt', $request->variable('bizbink_adverts_forumlist_advert_image_alt', ''));
            $config->set('bizbink_adverts_forumlist_advert_image_width', $request->variable('bizbink_adverts_forumlist_advert_image_width', ''));
            $config->set('bizbink_adverts_forumlist_advert_image_height', $request->variable('bizbink_adverts_forumlist_advert_image_height', ''));

            // VIEWTOPIC ADVERT
            $config->set('bizbink_adverts_viewtopic_advert_type', $request->variable('bizbink_adverts_viewtopic_advert_type', ''));
            $config->set('bizbink_adverts_viewtopic_advert_display', $request->variable('bizbink_adverts_viewtopic_advert_display', ''));
            $config->set('bizbink_adverts_viewtopic_advert_guest_only', $request->variable('bizbink_adverts_viewtopic_advert_guest_only', ''));
            $config->set('bizbink_adverts_viewtopic_advert_adsense_client', $request->variable('bizbink_adverts_viewtopic_advert_adsense_client', ''));
            $config->set('bizbink_adverts_viewtopic_advert_adsense_slot', $request->variable('bizbink_adverts_viewtopic_advert_adsense_slot', ''));
            $config->set('bizbink_adverts_viewtopic_advert_image_link', $request->variable('bizbink_adverts_viewtopic_advert_image_link', ''));
            $config->set('bizbink_adverts_viewtopic_advert_image_location', $request->variable('bizbink_adverts_viewtopic_advert_image_location', ''));
            $config->set('bizbink_adverts_viewtopic_advert_image_title', $request->variable('bizbink_adverts_viewtopic_advert_image_title', ''));
            $config->set('bizbink_adverts_viewtopic_advert_image_alt', $request->variable('bizbink_adverts_viewtopic_advert_image_alt', ''));
            $config->set('bizbink_adverts_viewtopic_advert_image_width', $request->variable('bizbink_adverts_viewtopic_advert_image_width', ''));
            $config->set('bizbink_adverts_viewtopic_advert_image_height', $request->variable('bizbink_adverts_viewtopic_advert_image_height', ''));

            // CUSTOM CSS
            $config->set('bizbink_adverts_custom_css', $request->variable('bizbink_adverts_custom_css', ''));

            trigger_error($user->lang('ACP_BIZBINK_ADVERTS_SETTING_SAVED') . adm_back_link($this->u_action));
        }

        $template->assign_vars(array(
            'U_ACTION' => $this->u_action,
            // HEADER ADVERT
            'BIZBINK_ADVERTS_HEADER_ADVERT_TYPE' => $config['bizbink_adverts_header_advert_type'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_DISPLAY' => $config['bizbink_adverts_header_advert_display'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_GUEST_ONLY' => $config['bizbink_adverts_header_advert_guest_only'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_ADSENSE_CLIENT' => $config['bizbink_adverts_header_advert_adsense_client'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_ADSENSE_SLOT' => $config['bizbink_adverts_header_advert_adsense_slot'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_LINK' => $config['bizbink_adverts_header_advert_image_link'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_LOCATION' => $config['bizbink_adverts_header_advert_image_location'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_TITLE' => $config['bizbink_adverts_header_advert_image_title'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_ALT' => $config['bizbink_adverts_header_advert_image_alt'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_WIDTH' => $config['bizbink_adverts_header_advert_image_width'],
            'BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_HEIGHT' => $config['bizbink_adverts_header_advert_image_height'],
            // FORUMLIST ADVERT
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_TYPE' => $config['bizbink_adverts_forumlist_advert_type'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_DISPLAY' => $config['bizbink_adverts_forumlist_advert_display'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_GUEST_ONLY' => $config['bizbink_adverts_forumlist_advert_guest_only'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_ADSENSE_CLIENT' => $config['bizbink_adverts_forumlist_advert_adsense_client'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_ADSENSE_SLOT' => $config['bizbink_adverts_forumlist_advert_adsense_slot'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_LINK' => $config['bizbink_adverts_forumlist_advert_image_link'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_LOCATION' => $config['bizbink_adverts_forumlist_advert_image_location'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_TITLE' => $config['bizbink_adverts_forumlist_advert_image_title'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_ALT' => $config['bizbink_adverts_forumlist_advert_image_alt'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_WIDTH' => $config['bizbink_adverts_forumlist_advert_image_width'],
            'BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_HEIGHT' => $config['bizbink_adverts_forumlist_advert_image_height'],
            // FORUMLIST ADVERT
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_TYPE' => $config['bizbink_adverts_viewtopic_advert_type'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_DISPLAY' => $config['bizbink_adverts_viewtopic_advert_display'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_GUEST_ONLY' => $config['bizbink_adverts_viewtopic_advert_guest_only'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_ADSENSE_CLIENT' => $config['bizbink_adverts_viewtopic_advert_adsense_client'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_ADSENSE_SLOT' => $config['bizbink_adverts_viewtopic_advert_adsense_slot'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_LINK' => $config['bizbink_adverts_viewtopic_advert_image_link'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_LOCATION' => $config['bizbink_adverts_viewtopic_advert_image_location'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_TITLE' => $config['bizbink_adverts_viewtopic_advert_image_title'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_ALT' => $config['bizbink_adverts_viewtopic_advert_image_alt'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_WIDTH' => $config['bizbink_adverts_viewtopic_advert_image_width'],
            'BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_HEIGHT' => $config['bizbink_adverts_viewtopic_advert_image_height'],
            // CUSTOM CSS
            'BIZBINK_ADVERTS_CUSTOM_CSS' => $config['bizbink_adverts_custom_css'],
        ));
    }

}
