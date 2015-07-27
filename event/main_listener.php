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

namespace bizbink\adverts\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class main_listener implements EventSubscriberInterface {

    static public function getSubscribedEvents() {
        return array(
            'core.user_setup' => 'load_language_on_setup',
            'core.page_header' => array(
                array('add_advert_header', 15),
                array('add_advert_forumlist', 10),
                array('add_advert_viewtopic', 5),
                array('add_custom_css', 0),
            ),
        );
    }

    /* @var \phpbb\template\template */

    protected $template;

    /* @var \phpbb\config\config */
    protected $config;

    /* @var \phpbb\user */
    protected $user;

    /**
     * Constructor
     *
     * @param \phpbb\template\template  $template   Template object
     * @param \phpbb\config\config      $config     Template object
     * @param \phpbb\config\user        $user       User object
     */
    public function __construct(\phpbb\template\template $template, \phpbb\config\config $config, \phpbb\user $user) {
        $this->template = $template;
        $this->config = $config;
        $this->user = $user;
    }

    public function load_language_on_setup($event) {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = array(
            'ext_name' => 'bizbink/adverts',
            'lang_set' => 'common',
        );
        $event['lang_set_ext'] = $lang_set_ext;
    }

    public function add_advert_header($event) {
        $tpl_vars = array();
        if ($this->config['bizbink_adverts_header_advert_display']) {
            if ($this->config['bizbink_adverts_header_advert_guest_only'] == "on" && !$this->user->data['is_registered']) {
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_TYPE'] = $this->config['bizbink_adverts_header_advert_type'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_ADSENSE_CLIENT'] = $this->config['bizbink_adverts_header_advert_adsense_client'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_SLOT'] = $this->config['bizbink_adverts_header_advert_adsense_slot'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_LINK'] = $this->config['bizbink_adverts_header_advert_image_link'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_LOCATION'] = $this->config['bizbink_adverts_header_advert_image_location'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_TITLE'] = $this->config['bizbink_adverts_header_advert_image_title'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_ALT'] = $this->config['bizbink_adverts_header_advert_image_alt'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_WIDTH'] = $this->config['bizbink_adverts_header_advert_image_width'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_HEIGHT'] = $this->config['bizbink_adverts_header_advert_image_height'];
            }

            if (!$this->config['bizbink_adverts_header_advert_guest_only'] == "on") {
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_TYPE'] = $this->config['bizbink_adverts_header_advert_type'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_ADSENSE_CLIENT'] = $this->config['bizbink_adverts_header_advert_adsense_client'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_SLOT'] = $this->config['bizbink_adverts_header_advert_adsense_slot'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_LINK'] = $this->config['bizbink_adverts_header_advert_image_link'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_LOCATION'] = $this->config['bizbink_adverts_header_advert_image_location'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_TITLE'] = $this->config['bizbink_adverts_header_advert_image_title'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_ALT'] = $this->config['bizbink_adverts_header_advert_image_alt'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_WIDTH'] = $this->config['bizbink_adverts_header_advert_image_width'];
                $tpl_vars['BIZBINK_ADVERTS_HEADER_ADVERT_IMAGE_HEIGHT'] = $this->config['bizbink_adverts_header_advert_image_height'];
            }
        }

        $this->template->assign_vars($tpl_vars);
    }

    public function add_advert_forumlist($event) {
        $tpl_vars = array();
        if ($this->config['bizbink_adverts_forumlist_advert_display']) {
            if ($this->config['bizbink_adverts_forumlist_advert_guest_only'] == "on" && !$this->user->data['is_registered']) {
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_TYPE'] = $this->config['bizbink_adverts_forumlist_advert_type'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_ADSENSE_CLIENT'] = $this->config['bizbink_adverts_forumlist_advert_adsense_client'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_SLOT'] = $this->config['bizbink_adverts_forumlist_advert_adsense_slot'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_LINK'] = $this->config['bizbink_adverts_forumlist_advert_image_link'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_LOCATION'] = $this->config['bizbink_adverts_forumlist_advert_image_location'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_TITLE'] = $this->config['bizbink_adverts_forumlist_advert_image_title'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_ALT'] = $this->config['bizbink_adverts_forumlist_advert_image_alt'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_WIDTH'] = $this->config['bizbink_adverts_forumlist_advert_image_width'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_HEIGHT'] = $this->config['bizbink_adverts_forumlist_advert_image_height'];
            }

            if (!$this->config['bizbink_adverts_forumlist_advert_guest_only'] == "on") {
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_TYPE'] = $this->config['bizbink_adverts_forumlist_advert_type'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_ADSENSE_CLIENT'] = $this->config['bizbink_adverts_forumlist_advert_adsense_client'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_SLOT'] = $this->config['bizbink_adverts_forumlist_advert_adsense_slot'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_LINK'] = $this->config['bizbink_adverts_forumlist_advert_image_link'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_LOCATION'] = $this->config['bizbink_adverts_forumlist_advert_image_location'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_TITLE'] = $this->config['bizbink_adverts_forumlist_advert_image_title'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_ALT'] = $this->config['bizbink_adverts_forumlist_advert_image_alt'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_WIDTH'] = $this->config['bizbink_adverts_forumlist_advert_image_width'];
                $tpl_vars['BIZBINK_ADVERTS_FORUMLIST_ADVERT_IMAGE_HEIGHT'] = $this->config['bizbink_adverts_viewtopic_advert_image_height'];
            }
        }

        $this->template->assign_vars($tpl_vars);
    }

    public function add_advert_viewtopic($event) {
        $tpl_vars = array();
        if ($this->config['bizbink_adverts_viewtopic_advert_display']) {
            if ($this->config['bizbink_adverts_viewtopic_advert_guest_only'] == "on" && !$this->user->data['is_registered']) {
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_TYPE'] = $this->config['bizbink_adverts_viewtopic_advert_type'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_ADSENSE_CLIENT'] = $this->config['bizbink_adverts_viewtopic_advert_adsense_client'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_SLOT'] = $this->config['bizbink_adverts_viewtopic_advert_adsense_slot'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_LINK'] = $this->config['bizbink_adverts_viewtopic_advert_image_link'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_LOCATION'] = $this->config['bizbink_adverts_viewtopic_advert_image_location'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_TITLE'] = $this->config['bizbink_adverts_viewtopic_advert_image_title'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_ALT'] = $this->config['bizbink_adverts_viewtopic_advert_image_alt'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_WIDTH'] = $this->config['bizbink_adverts_viewtopic_advert_image_width'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_HEIGHT'] = $this->config['bizbink_adverts_viewtopic_advert_image_height'];
            }

            if (!$this->config['bizbink_adverts_viewtopic_advert_guest_only'] == "on") {
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_TYPE'] = $this->config['bizbink_adverts_viewtopic_advert_type'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_ADSENSE_CLIENT'] = $this->config['bizbink_adverts_viewtopic_advert_adsense_client'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_SLOT'] = $this->config['bizbink_adverts_viewtopic_advert_adsense_slot'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_LINK'] = $this->config['bizbink_adverts_viewtopic_advert_image_link'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_LOCATION'] = $this->config['bizbink_adverts_viewtopic_advert_image_location'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_TITLE'] = $this->config['bizbink_adverts_viewtopic_advert_image_title'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_ALT'] = $this->config['bizbink_adverts_viewtopic_advert_image_alt'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_WIDTH'] = $this->config['bizbink_adverts_viewtopic_advert_image_width'];
                $tpl_vars['BIZBINK_ADVERTS_VIEWTOPIC_ADVERT_IMAGE_HEIGHT'] = $this->config['bizbink_adverts_viewtopic_advert_image_height'];
            }
        }

        $this->template->assign_vars($tpl_vars);
    }

    public function add_custom_css($event) {
        $this->template->assign_vars(array(
            'BIZBINK_ADVERTS_CUSTOM_CSS' => $this->config['bizbink_adverts_custom_css']
        ));
    }

}
