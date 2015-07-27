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

namespace bizbink\adverts\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration {

    //public function effectively_installed() {
    //    return isset($this->config['acme_demo_goodbye']);
    //}

    static public function depends_on() {
        return array('\phpbb\db\migration\data\v310\alpha2');
    }

    public function update_data() {
        return array(
            // HEADER ADVERT
            array('config.add', array('bizbink_adverts_header_advert_type', 'adsense')),
            array('config.add', array('bizbink_adverts_header_advert_display', '')),
            array('config.add', array('bizbink_adverts_header_advert_guest_only', '')),
            array('config.add', array('bizbink_adverts_header_advert_adsense_client', '')),
            array('config.add', array('bizbink_adverts_header_advert_adsense_slot', '')),
            array('config.add', array('bizbink_adverts_header_advert_image_link', '')),
            array('config.add', array('bizbink_adverts_header_advert_image_location', '')),
            array('config.add', array('bizbink_adverts_header_advert_image_title', '')),
            array('config.add', array('bizbink_adverts_header_advert_image_alt', '')),
            array('config.add', array('bizbink_adverts_header_advert_image_width', '')),
            array('config.add', array('bizbink_adverts_header_advert_image_height', '')),
            // FORUMLIST ADVERT
            array('config.add', array('bizbink_adverts_forumlist_advert_type', 'adsense')),
            array('config.add', array('bizbink_adverts_forumlist_advert_display', '')),
            array('config.add', array('bizbink_adverts_forumlist_advert_guest_only', '')),
            array('config.add', array('bizbink_adverts_forumlist_advert_adsense_client', '')),
            array('config.add', array('bizbink_adverts_forumlist_advert_adsense_slot', '')),
            array('config.add', array('bizbink_adverts_forumlist_advert_image_link', '')),
            array('config.add', array('bizbink_adverts_forumlist_advert_image_location', '')),
            array('config.add', array('bizbink_adverts_forumlist_advert_image_title', '')),
            array('config.add', array('bizbink_adverts_forumlist_advert_image_alt', '')),
            array('config.add', array('bizbink_adverts_forumlist_advert_image_width', '')),
            array('config.add', array('bizbink_adverts_forumlist_advert_image_height', '')),
            // VIEWTOPIC ADVERT
            array('config.add', array('bizbink_adverts_viewtopic_advert_type', 'adsense')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_display', '')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_guest_only', '')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_adsense_client', '')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_adsense_slot', '')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_image_link', '')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_image_location', '')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_image_title', '')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_image_alt', '')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_image_width', '')),
            array('config.add', array('bizbink_adverts_viewtopic_advert_image_height', '')),
            // CUSTOM CSS
            array('config.add', array('bizbink_adverts_custom_css', '')),
            array('module.add', array(
                    'acp',
                    'ACP_CAT_DOT_MODS',
                    'ACP_BIZBINK_ADVERTS_TITLE'
                )),
            array('module.add', array(
                    'acp',
                    'ACP_BIZBINK_ADVERTS_TITLE',
                    array(
                        'module_basename' => '\bizbink\adverts\acp\main_module',
                        'modes' => array('settings'),
                    ),
                )),
        );
    }

}
